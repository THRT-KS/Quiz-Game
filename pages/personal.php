<?php
session_start();
if (!isset($_SESSION['game_started']) || $_SESSION['game_started'] !== true) {
    header('Location: ../');
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../public/img/iconweb.png">
    <title>Project Game Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/personal.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <?php include '../assets/navbar.php' ?>
    <style>
        /* เพิ่มสไตล์สำหรับ fade */
        .fade-in {
            opacity: 0;
            transition: opacity 0.5s ease-in;
        }

        .fade-in.visible {
            opacity: 1;
        }
    </style>

</head>

<body class="fade-in">
<div class="container">
    <div class="form-container mt-5">
        <h2 class="mb-4 text-center">กรอกข้อมูล</h2>
        <form id="personalForm" action="../api/save_personal_info.php" method="POST">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                </div>
                <div class="col-md-6">
                    <label for="lastname" class="form-label">นามสกุล</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="">
                </div>
                <div class="col-md-6">
                    <label for="school" class="form-label">ชื่อโรงเรียน</label>
                    <input type="text" class="form-control" id="school" name="school" placeholder="">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">อีเมลล์</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="">
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required />
                </div>
                <div class="col-12">
                    <label class="form-label">ระดับการศึกษา</label>
                    <div class="d-flex flex-wrap gap-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="education" id="m5" value="ม.5">
                            <label class="form-check-label" for="m5">ม.5</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="education" id="m6" value="ม.6">
                            <label class="form-check-label" for="m6">ม.6</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="education" id="ปวช" value="ปวช.">
                            <label class="form-check-label" for="ปวช">ปวช.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="education" id="ปวส" value="ปวส.">
                            <label class="form-check-label" for="ปวส">ปวส.</label>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="consentCheckbox">
                        <label class="form-check-label" for="consentCheckbox">
                            ให้ความยินยอมเพื่อเก็บข้อมูลของคุณเพื่อใช้ในการพวิเคาะห์ข้อมูลเท่านั้น
                        </label>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-custom btn-lg" id="submitButton" disabled>เริ่มเลย</button>
                </div>
            </div>
        </form>
    </div>
</div>

    <script>
        // เมื่อหน้าเว็บโหลดเสร็จสมบูรณ์
        document.addEventListener("DOMContentLoaded", function() {
            // รับค่าปุ่ม submit
            const submitButton = document.getElementById('submitButton');
            // รับค่า input ที่มี class เป็น form-control
            const inputs = document.querySelectorAll('.form-control');
            // รับค่า radio button ที่มี name เป็น education
            const radios = document.querySelectorAll('input[name="education"]');
            // รับค่า checkbox ของการให้ความยินยอม
            const consentCheckbox = document.getElementById('consentCheckbox');

            // ฟังก์ชันตรวจสอบฟอร์ม
            function checkForm() {
                // ตรวจสอบว่า input ทุกอันถูกกรอกข้อมูลแล้วหรือไม่
                const allInputsFilled = Array.from(inputs).every(input => input.value.trim() !== '');
                // ตรวจสอบว่ามี radio button ถูกเลือกอย่างน้อยหนึ่งอันหรือไม่
                const radioSelected = Array.from(radios).some(radio => radio.checked);
                // ตรวจสอบว่า checkbox ถูกเลือกหรือไม่
                const consentGiven = consentCheckbox.checked;

                // ปิดการใช้งานปุ่ม submit หากเงื่อนไขไม่ครบ
                submitButton.disabled = !(allInputsFilled && radioSelected && consentGiven);
            }

            // เพิ่ม event listener ให้กับ input, radio, และ checkbox เพื่อตรวจสอบฟอร์มเมื่อมีการเปลี่ยนแปลง
            inputs.forEach(input => input.addEventListener('input', checkForm));
            radios.forEach(radio => radio.addEventListener('change', checkForm));
            consentCheckbox.addEventListener('change', checkForm);

            // เมื่อฟอร์มถูกส่ง
            document.getElementById('personalForm').addEventListener('submit', function(e) {
                e.preventDefault(); // ป้องกันการส่งฟอร์มแบบปกติ

                // สร้าง FormData จากฟอร์ม
                const formData = new FormData(this);

                // ส่งข้อมูลไปยัง API โดยใช้ fetch
                fetch('../api/save_personal_info.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        // หากสำเร็จ ไปยังหน้าถัดไป
                        if (data.status === 'success') {
                            window.location.href = './question1';
                        } else {
                            // แสดงข้อผิดพลาด
                            alert('Error: ' + data.message);
                        }
                    })
                    .catch(error => {
                        // จัดการกับข้อผิดพลาด
                        console.error('Error:', error);
                    });
            });
        });
    </script>
    <script>
        // เมื่อหน้าเว็บโหลดเสร็จสมบูรณ์
        document.addEventListener("DOMContentLoaded", function() {
            // เพิ่ม class visible ให้กับ body
            document.body.classList.add('visible');
        });

        // ฟังก์ชันสำหรับส่งคำตอบ
        function submitAnswer(value) {
            // เลือก radio button ที่มีค่าตรงกับ value และทำการ submit ฟอร์ม
            document.querySelector('input[name="q1"][value="' + value + '"]').checked = true;
            document.getElementById('questionForm').submit();
        }
    </script>
</body>

</html>

</html>