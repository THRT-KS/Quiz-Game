<?php
session_start();

function generateToken() {
    return bin2hex(random_bytes(16));
}

// รับคำตอบและคะแนนจาก question10.php
$allAnswers = json_decode($_POST['allAnswers'], true);
$scores = json_decode($_POST['allScores'], true);

// ถ้า $allAnswers เป็น null หรือไม่ใช่ array ให้กำหนดเป็น array ว่าง
if (!is_array($allAnswers)) {
    $allAnswers = [];
}

// ถ้า $scores เป็น null หรือไม่ใช่ array ให้กำหนดเป็น array ว่าง
if (!is_array($scores)) {
    $scores = ['ceScore' => 0, 'itScore' => 0, 'leScore' => 0];
}

// คำนวณคะแนนสำหรับคำถามที่ 10
$lastAnswer = $allAnswers['question10'] ?? '';
switch ($lastAnswer) {
    case 'ce':
        $scores['ceScore'] += 10;
        break;
    case 'it':
        $scores['itScore'] += 10;
        break;
    case 'le':
        $scores['leScore'] += 10;
        break;
}

// อัปเดตคะแนนใน session
$_SESSION['ceScore'] = $scores['ceScore'];
$_SESSION['itScore'] = $scores['itScore'];
$_SESSION['leScore'] = $scores['leScore'];

// เพิ่มคำตอบทั้งหมดลงใน session
$_SESSION['answers'] = $allAnswers;

// สร้าง token
$token = generateToken();

// ตรวจสอบและสร้างโฟลเดอร์ results หากยังไม่มี
if (!file_exists('results')) {
    mkdir('results', 0777, true);
}

// เก็บผลลัพธ์ในไฟล์
$filePath = "results/$token.json";
file_put_contents($filePath, json_encode([
    'ceScore' => $scores['ceScore'],
    'itScore' => $scores['itScore'],
    'leScore' => $scores['leScore'],
    'answers' => $allAnswers
]));

// ตรวจสอบว่าไฟล์ถูกสร้างขึ้นหรือไม่
if (file_exists($filePath)) {
    // เคลียร์ข้อมูล session
    session_unset();
    session_destroy();
    
    // รีไดเรกไปยังหน้าผลลัพธ์
    echo "<script>localStorage.clear(); window.location.href='result.php?token=$token';</script>";
    exit();
} else {
    echo "Failed to create result file.";
}
?>