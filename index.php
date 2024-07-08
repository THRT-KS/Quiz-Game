<?php
session_start();
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./public/img/iconweb.png">
    <title>Project Game Quiz</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/button.css">
</head>
<?php include './assets/navbar.php' ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 style="font-size: 7rem;">ค้นหาคอร์ส และ <br>อาชีพที่เหมาะกับคุณ</h1>
                <p style="font-size: 1.5rem;"><b>รู้หรือไม่?</b> การทำงานในสายงานที่เหมาะสมช่วย<br>ให้คุณก้าวหน้าได้อย่างรวดเร็ว</p>
                <button class="btn cube cube-hover" type="button" onclick="startGame()">
                    <div class="bg-top">
                        <div class="bg-inner"></div>
                    </div>
                    <div class="bg-right">
                        <div class="bg-inner"></div>
                    </div>
                    <div class="bg">
                        <div class="bg-inner"></div>
                    </div>
                    
                    <a href="./pages/personal" style="text-decoration: none;">
                        <div class="text">เริ่มเล่นเกม</div>
                    </a>
                </button>
            </div>
        </div>
    </div>

    <script>
        function startGame() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', './pages/start_game.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('start=true');
        }
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
