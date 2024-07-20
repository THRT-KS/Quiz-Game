<?php
session_start();

if (!isset($_SESSION['game_started']) || $_SESSION['game_started'] !== true || !isset($_SESSION['name']) || empty($_SESSION['name'])) {
    header('Location: ../');
    exit();
}
if (isset($_POST['q1'])) {
    if ($_POST['q1'] == 'ce') {
        $_SESSION['ceScore']+=10;
    } elseif ($_POST['q1'] == 'it') {
        $_SESSION['itScore']+=10;
    } else {
        $_SESSION['leScore']+=10;
    }
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
            transition: opacity 2s ease-in;
        }

        .fade-in.visible {
            opacity: 1;
        }
    </style>
</head>



<body class="fade-in">
    <div class="container mt-5">
        <div class="progress" style="height: 25px;">
            <div class="progress-bar" role="progressbar" style="width: 15%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">
                <h1 style="font-size: large;">15%</h1>
            </div>
        </div>
    </div>
    <div class="custom-container">
        <div class="question-box2" >
            คำถามที่ 2: เมื่อคอมพิวเตอร์ของคุณติดไวรัส <br>คุณจะทำยังไง?
        </div>
        <form action="question3" method="post" id="questionForm">
            <div class="flex flex-wrap justify-center" style="font-size: 20px;">
                <div class="option" onclick="submitAnswer('it')">
                    <input type="radio" name="q2" id="q2a" value="it" class="hidden">
                    <label for="q2a">หยิบสมาร์ทโฟนมาค้นหาวิธีแก้ไข</label>
                </div>
                <div class="option" onclick="submitAnswer('ce')">
                    <input type="radio" name="q2" id="q2b" value="ce" class="hidden">
                    <label for="q2b">โทรหาช่างคอมพิวเตอร์ </label>
                </div>
                <div class="option" onclick="submitAnswer('it')">
                    <input type="radio" name="q2" id="q2c" value="it" class="hidden">
                    <label for="q2c">ลองรีสตาร์ทเครื่องดู</label>
                </div>
                <div class="option" onclick="submitAnswer('le')">
                    <input type="radio" name="q2" id="q2d" value="le" class="hidden">
                    <label for="q2d">นั่งรอให้มันหายเอง</label>
                </div>
            </div>
        </form>
    </div>

    <script>
        // ฟังก์ชันสำหรับการทำ fade-in
        document.addEventListener("DOMContentLoaded", function() {
            document.body.classList.add('visible');
        });

        function submitAnswer(value) {
            document.querySelector('input[name="q2"][value="' + value + '"]').checked = true;
            document.getElementById('questionForm').submit();
        }
    </script>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>