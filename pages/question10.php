<?php
session_start();
if (!isset($_SESSION['game_started']) || $_SESSION['game_started'] !== true || !isset($_SESSION['name']) || empty($_SESSION['name'])) {
    header('Location: ../');
    exit();
}

if (!isset($_SESSION['ceScore'])) $_SESSION['ceScore'] = 0;
if (!isset($_SESSION['itScore'])) $_SESSION['itScore'] = 0;
if (!isset($_SESSION['leScore'])) $_SESSION['leScore'] = 0;


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
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/styleQ.css">
    <?php include '../assets/navbar.php' ?>
    <style>
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
            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                <h1 style="font-size: large;">100%</h1>
            </div>
        </div>
    </div>
    <div class="custom-container">
        <div class="question-box10">
            คำถามที่ 10: คุณคิดว่าอนาคตของการขนส่งจะเป็นยังไง?
        </div>
        <form action="process.php" method="post" id="questionForm">
            <input type="hidden" name="allAnswers" id="allAnswers">
            <input type="hidden" name="allScores" id="allScores">
            <div class="flex flex-wrap justify-center" style="font-size: 20px;">
                <div class="option" onclick="submitAnswer('it')">
                    <input type="radio" name="q10" id="q10b" value="it" class="hidden">
                    <label for="q10b">การส่งของผ่านระบบออนไลน์ทันที</label>
                </div>
                <div class="option" onclick="submitAnswer('ce')">
                    <input type="radio" name="q10" id="q10a" value="ce" class="hidden">
                    <label for="q10a">การใช้พลังงานสะอาดในการขนส่ง</label>
                </div>
                <div class="option" onclick="submitAnswer('le')">
                    <input type="radio" name="q10" id="q10c" value="le" class="hidden">
                    <label for="q10c">การใช้โดรนส่งของทุกวัน</label>
                </div>
                <div class="option" onclick="submitAnswer('le')">
                    <input type="radio" name="q10" id="q10d" value="le" class="hidden">
                    <label for="q10d">ระบบขนส่งที่ไร้คนขับ</label>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.classList.add('visible');

            // โหลดคำตอบและคะแนนจาก localStorage
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

            document.querySelectorAll('.option').forEach(option => {
                option.onclick = null;
            });

            let answers = JSON.parse(localStorage.getItem('answers')) || {};
            answers['question10'] = value;
            localStorage.setItem('answers', JSON.stringify(answers));

            let scores = JSON.parse(localStorage.getItem('scores')) || {
                ceScore: 0,
                itScore: 0,
                leScore: 0
            };
            // ไม่ต้องคำนวณคะแนนที่นี่
            localStorage.setItem('scores', JSON.stringify(scores));

            console.log("All answers:", answers);
            console.log("Current scores:", scores);

            document.querySelector('input[name="q10"][value="' + value + '"]').checked = true;

            // ตรวจสอบว่า element มีอยู่จริงก่อนที่จะกำหนดค่า
            let allAnswersElement = document.getElementById('allAnswers');
            let allScoresElement = document.getElementById('allScores');

            if (allAnswersElement) {
                allAnswersElement.value = JSON.stringify(answers);
            } else {
                console.error("Element with id 'allAnswers' not found");
            }

            if (allScoresElement) {
                allScoresElement.value = JSON.stringify(scores);
            } else {
                console.error("Element with id 'allScores' not found");
            }

            document.getElementById('questionForm').submit();
        }
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>