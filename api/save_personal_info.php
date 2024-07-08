<?php
session_start(); // เริ่มต้น session เพื่อใช้งานตัวแปร session
require '../Database/connect.php'; // รวมไฟล์เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่ามีการส่งข้อมูลมาโดยใช้เมธอด POST หรือไม่
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่าจากฟอร์ม
    $name = $_POST['name'];
    $lastname = $_POST['lastname']; // เพิ่มรับค่า lastname
    $school = $_POST['school'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $education = $_POST['education'];

    try {
        // ตรวจสอบว่ามีข้อมูลอีเมลนี้ในฐานข้อมูลแล้วหรือไม่
        $checkSql = "SELECT COUNT(*) FROM student_information WHERE email = :email";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bindParam(':email', $email); // ผูกค่าอีเมลกับพารามิเตอร์
        $checkStmt->execute();
        $recordExists = $checkStmt->fetchColumn() > 0; // ตรวจสอบว่าพบข้อมูลหรือไม่

        // ถ้าพบข้อมูลให้ทำการอัปเดต ถ้าไม่พบให้เพิ่มข้อมูลใหม่
        if ($recordExists) {
            $sql = "UPDATE student_information SET name = :name, lastname = :lastname, school = :school, phone = :phone, education_level = :education WHERE email = :email";
        } else {
            $sql = "INSERT INTO student_information (name, lastname, school, email, phone, education_level) VALUES (:name, :lastname, :school, :email, :phone, :education)";
        }

        // ประมวลผลคำสั่ง SQL
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastname', $lastname); // ผูกค่า lastname กับพารามิเตอร์
        $stmt->bindParam(':school', $school);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':education', $education);
        $stmt->execute();

        // ตั้งค่าตัวแปร session สำหรับใช้งานในหน้าอื่น
        $_SESSION['game_started'] = true;
        $_SESSION['name'] = $name;
        $_SESSION['lastname'] = $lastname; // เพิ่ม lastname ใน session
        $_SESSION['school'] = $school;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['education'] = $education;

        // ส่งค่ากลับเป็น JSON แสดงสถานะการทำงาน
        echo json_encode(["status" => "success", "action" => $recordExists ? "updated" : "inserted"]);
    } catch (PDOException $e) {
        // จัดการกับข้อผิดพลาดและส่งข้อความกลับเป็น JSON
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
}
?>