<?php
session_start();
if (!isset($_SESSION['game_started']) || $_SESSION['game_started'] !== true || !isset($_SESSION['name']) || empty($_SESSION['name'])) {
    header('Location: ../');
    exit();
}

if (!isset($_SESSION['ceScore'])) $_SESSION['ceScore'] = 0;
if (!isset($_SESSION['itScore'])) $_SESSION['itScore'] = 0;
if (!isset($_SESSION['leScore'])) $_SESSION['leScore'] = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answer = $_POST['q3'];

    switch ($answer) {
        case 'ce':
            $_SESSION['ceScore'] += 10;
            break;
        case 'it':
            $_SESSION['itScore'] += 10;
            break;
        case 'le':
            $_SESSION['leScore'] += 10;
            break;
    }

    // Redirect to the next question
    header('Location: question4.php');
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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/styleQ.css">
    <?php include '../assets/navbar.php' ?>
    <style>
        /* เพิ่มสไตล์สำหรับ fade */
        .fade-in {
            opacity: 0;
            transition: opacity 1s ease-in;
        }

        .fade-in.visible {
            opacity: 1;
        }
    </style>
</head>



<body class="fade-in">
    <div class="container mt-5">
        <div class="progress" style="height: 25px;">
            <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">
                <h1 style="font-size: large;">30%</h1>
            </div>
        </div>
    </div>
    <div class="custom-container">
        <div class="question-box3">
            คำถามที่ 3: คุณคิดว่าอาชีพในอนาคตของคุณ <br>คืออะไร?
        </div>
        <form action="question3" method="post" id="questionForm">
            <div class="flex flex-wrap justify-center"style="font-size: 20px;">
                <div class="option" onclick="submitAnswer('ce')">
                    <input type="radio" name="q3" id="q3b" value="ce" class="hidden">
                    <label for="q3b">โปรแกรมเมอร์ที่สามารถโค้ดได้ในฝัน</label>
                </div>
                <div class="option" onclick="submitAnswer('le')">
                    <input type="radio" name="q3" id="q3c" value="le" class="hidden">
                    <label for="q3c">ผู้จัดการโลจิสติกส์ที่ส่งของได้เร็วสุด</label>
                </div>
                <div class="option" onclick="submitAnswer('it')">
                    <input type="radio" name="q3" id="q3a" value="it" class="hidden">
                    <label for="q3a">ผู้เชี่ยวชาญด้านไอทีที่แก้ปัญหาทุกอย่าง</label>
                </div>
                <div class="option" onclick="submitAnswer('it')">
                    <input type="radio" name="q3" id="q3d" value="it" class="hidden">
                    <label for="q3d">นักวิเคราะห์ข้อมูลที่สามารถมองเห็นอนาคต</label>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.classList.add('visible');

            // แสดงคำตอบและคะแนนที่จัดเก็บไว้ใน localStorage เมื่อหน้าโหลด
            let answers = JSON.parse(localStorage.getItem('answers')) || {};
            let scores = JSON.parse(localStorage.getItem('scores')) || {
                ceScore: 0,
                itScore: 0,
                leScore: 0
            };
            console.log("All answers:", answers);
            console.log("Current scores:", scores);
        });

        function submitAnswer(value) {
            if (!value) return;

            // ปิดใช้งานการคลิกซ้ำ
            document.querySelectorAll('.option').forEach(option => {
                option.onclick = null;
            });

            console.log("Selected answer:", value);

            let answers = JSON.parse(localStorage.getItem('answers')) || {};
            answers['question3'] = value;
            localStorage.setItem('answers', JSON.stringify(answers));

            let scores = JSON.parse(localStorage.getItem('scores')) || {
                ceScore: 0,
                itScore: 0,
                leScore: 0
            };
            switch (value) {
                case 'ce':
                    scores.ceScore += 10;
                    break;
                case 'it':
                    scores.itScore += 10;
                    break;
                case 'le':
                    scores.leScore += 10;
                    break;
            }
            localStorage.setItem('scores', JSON.stringify(scores));

            console.log("All answers:", answers);
            console.log("Current scores:", scores);

            document.querySelector('input[name="q3"][value="' + value + '"]').checked = true;
            document.getElementById('questionForm').submit();
        }
    </script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>