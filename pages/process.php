<?php
session_start();

function generateToken() {
    return bin2hex(random_bytes(16));
}

// ตรวจสอบว่ามีค่า 'ceScore' ใน $_SESSION หรือไม่ ถ้ามีให้ใช้ค่านั้น ถ้าไม่มีให้เริ่มต้นที่ 0
$ceScore = isset($_SESSION['ceScore']) ? $_SESSION['ceScore'] : 0;
// ตรวจสอบว่ามีค่า 'itScore' ใน $_SESSION หรือไม่ ถ้ามีให้ใช้ค่านั้น ถ้าไม่มีให้เริ่มต้นที่ 0
$itScore = isset($_SESSION['itScore']) ? $_SESSION['itScore'] : 0;
// ตรวจสอบว่ามีค่า 'leScore' ใน $_SESSION หรือไม่ ถ้ามีให้ใช้ค่านั้น ถ้าไม่มีให้เริ่มต้นที่ 0
$leScore = isset($_SESSION['leScore']) ? $_SESSION['leScore'] : 0;

// สร้าง token
$token = generateToken();

// ตรวจสอบและสร้างโฟลเดอร์ results หากยังไม่มี
if (!file_exists('results')) {
    mkdir('results', 0777, true);
}

// เก็บผลลัพธ์ในไฟล์ (สามารถใช้ฐานข้อมูลแทน)
$filePath = "results/$token.json";
file_put_contents($filePath, json_encode([
    'ceScore' => $ceScore,
    'itScore' => $itScore,
    'leScore' => $leScore
]));

// ตรวจสอบว่าไฟล์ถูกสร้างขึ้นหรือไม่
if (file_exists($filePath)) {
    // เคลียร์ข้อมูล session
    session_unset();
    session_write_close();
    // รีไดเรกไปยังหน้าผลลัพธ์
    header("Location: result?token=$token");
    exit();
} else {
    echo "Failed to create result file.";
}
?>
