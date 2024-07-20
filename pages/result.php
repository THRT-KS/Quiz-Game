<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../public/img/iconweb.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <title>Game Quiz - ผลลัพธ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/result.css">
    <?php include '../assets/navbar-result.php'; ?>

</head>

<body>
    <div class="container mt-5">
    <?php

$token = $_GET['token'] ?? null;

if ($token) {
    $filePath = "results/$token.json";

    if (file_exists($filePath)) {
        $result = json_decode(file_get_contents($filePath), true);

        $ceScore = $result['ceScore'];
        $itScore = $result['itScore'];
        $leScore = $result['leScore'];

        $maxScore = max($ceScore, $itScore, $leScore);

        echo '<div class="row">';
        echo '<div class="col-md-8">';

        if ($ceScore == $maxScore) {
            include '../pages/resultce.php';
         
        }
             elseif ($itScore == $maxScore) {
                include '../pages/resultit.php';
             }
                 elseif ($leScore == $maxScore) 
                {
                    include '../pages/resultle.php';
                }
             else {
                echo '<div class="alert alert-danger text-center">ไม่พบผลลัพธ์สำหรับ token ที่ระบุ</div>';
            }
        } else {
            echo '<div class="alert alert-warning text-center">ไม่มี token ที่ระบุ</div>';
        }
    }
        ?>
    </div>




    <script>
        // เพิ่ม event listener สำหรับ 'popstate' เพื่อจัดการกับการกดปุ่ม back หรือ forward ใน browser
        window.addEventListener('popstate', function(event) {
            // ทำ AJAX call เพื่อล้าง session โดยเรียกไฟล์ 'clear_session.php'
            var xhr = new XMLHttpRequest();
            xhr.open('GET', './clear_session.php', true);
            xhr.send();

            // หลังจากล้าง session แล้ว นำทางผู้ใช้กลับไปยังหน้าแรก
            window.location.href = '/';
        });

        // ผลักดัน state ว่างเปล่าเข้าไปในประวัติการนำทาง เพื่อให้ popstate event ทำงานได้อย่างถูกต้อง
        // เมื่อผู้ใช้กดปุ่ม back
        history.pushState({}, '');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>