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

                if ($maxScore == $ceScore) {
                    echo '
                    <p class="text-success" style="font-size: 2rem; text-align: center;">🎉คุณเหมาะกับสาขาวิชาวิศวกรรมคอมพิวเตอร์!🎉</p>
                    <div id="ceCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../public/img/CITE/ce1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../public/img/CITE/ce2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../public/img/CITE/ce3.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#ceCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#ceCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>';
                    echo '</div>';
                    echo '<div class="col-md-4">';
                    echo '
                    <div class="card custom-card">
                        <div class="card-body">
                            <h5 class="card-title">วิศวกรรมคอมพิวเตอร์</h5>
                            <p class="card-text">การพัฒนาและออกแบบซอฟต์แวร์</p>
                            <p class="card-text">การเขียนโปรแกรมและสร้างแอปพลิเคชัน</p>
                            <p class="card-text">การวิจัยและพัฒนาเทคโนโลยีใหม่ ๆ</p>
                            <p class="card-text">วิศวกรรมคอมพิวเตอร์เป็นสาขาที่เน้นการออกแบบและพัฒนาเทคโนโลยีซอฟต์แวร์และฮาร์ดแวร์ ซึ่งจะช่วยให้คุณสามารถสร้างนวัตกรรมใหม่ ๆ ที่สามารถนำมาใช้ได้ในหลากหลายอุตสาหกรรม</p>
                            <p class="card-text">คุณเหมาะกับวิศวกรรมคอมพิวเตอร์เพราะคุณมีทักษะการคิดวิเคราะห์และแก้ไขปัญหาที่ดี รวมถึงความสามารถในการทำงานร่วมกับเทคโนโลยีต่าง ๆ</p>
                            <div class="skills">
                                <div class="best-match"style="font-size: 16px">วิศวกรรมคอมพิวเตอร์ ' . $ceScore .  '%</div>
                                <img src="../public/img/CITE.svg" alt="Profile">
                            </div>
                            <div class="progress mt-2">
                                <div class="progress-bar" role="progressbar" style="width: ' . $ceScore  . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                              <div class="skills">
                              <div class="best-match" style="font-size: 16px">เทคโนโลยีสารสนเทศและวิทยาการข้อมูล ' . $itScore . '%</div>
                                <img src="../public/img/CITE.svg" alt="Profile">
                            </div>
                            <div class="progress mt-2">
                                <div class="progress-bar" role="progressbar" style="width: ' . $itScore . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                              <div class="skills">
                                <div class="best-match"style="font-size: 16px">วิศวกรรมโลจิสติกส์ ' . $leScore .  '%</div>
                                <img src="../public/img/CITE.svg" alt="Profile">
                            </div>
                            <div class="progress mt-2">
                                <div class="progress-bar" role="progressbar" style="width: ' . $leScore . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                        </div>
                    </div>';
                } elseif ($maxScore == $itScore) {
                    echo '
                      <p class="text-success" style="font-size: 2rem; text-align: center;">🎉คุณเหมาะกับสาขาวิชาเทคโนโลยีสารสนเทศและวิทยาการข้อมูล!🎉</p>
                    <div id="ceCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../public/img/CITE/it1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../public/img/CITE/it2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../public/img/CITE/it3.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#ceCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#ceCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>';
                    echo '</div>';
                    echo '<div class="col-md-4">';
                    echo '
                    <div class="card custom-card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #458ce9;">เทคโนโลยีสารสนเทศและวิทยาการข้อมูล</h5>
                            <p class="card-text">การวิเคราะห์และจัดการข้อมูลขนาดใหญ่</p>
                            <p class="card-text">การพัฒนาระบบสารสนเทศและฐานข้อมูล</p>
                            <p class="card-text">การใช้เทคโนโลยี AI และ Machine Learning</p>
                            <p class="card-text">เทคโนโลยีสารสนเทศและวิทยาการข้อมูลเป็นสาขาที่เน้นการจัดการและวิเคราะห์ข้อมูลเพื่อสร้างความได้เปรียบทางธุรกิจ คุณจะได้เรียนรู้การใช้เทคโนโลยีสมัยใหม่เพื่อแปลงข้อมูลให้เป็นข้อมูลเชิงลึกที่มีคุณค่า</p>
                            <p class="card-text">คุณเหมาะกับสาขานี้เพราะคุณมีความสามารถในการคิดวิเคราะห์เชิงตัวเลข และสนใจในการใช้เทคโนโลยีเพื่อแก้ปัญหาทางธุรกิจ</p>
                             <div class="skills">
                                <div class="best-match style="font-size: 16px">วิศวกรรมคอมพิวเตอร์ ' . $ceScore .  '%</div>
                                <img src="../public/img/CITE.svg" alt="Profile">
                            </div>
                            <div class="progress mt-2">
                                <div class="progress-bar" role="progressbar" style="width: ' . $ceScore  . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                              <div class="skills">
                              <div class="best-match style="font-size: 16px">เทคโนโลยีสารสนเทศและวิทยาการข้อมูล ' . $itScore . '%</div>
                                <img src="../public/img/CITE.svg" alt="Profile">
                            </div>
                            <div class="progress mt-2">
                                <div class="progress-bar" role="progressbar" style="width: ' . $itScore . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                              <div class="skills">
                                <div class="best-match style="font-size: 16px">วิศวกรรมโลจิสติกส์ ' . $leScore .  '%</div>
                                <img src="../public/img/CITE.svg" alt="Profile">
                            </div>
                            <div class="progress mt-2">
                                <div class="progress-bar" role="progressbar" style="width: ' . $leScore . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                        </div>
                    </div>';
                } else {
                    echo '
                     <p class="text-success" style="font-size: 2rem; text-align: center;">🎉คุณเหมาะกับสาขาวิชาวิศวกรรมโลจิสติกส์!🎉</p>
                    <div id="ceCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../public/img/CITE/le1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../public/img/CITE/le2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../public/img/CITE/le3.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#ceCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#ceCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>';
                    echo '</div>';
                    echo '<div class="col-md-4">';
                    echo '
                        <div class="card custom-card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #dee945;">วิศวกรรมโลจิสติกส์</h5>
                            <p class="card-text">การออกแบบและจัดการห่วงโซ่อุปทาน</p>
                            <p class="card-text">การวางแผนและควบคุมการขนส่ง</p>
                            <p class="card-text">การใช้เทคโนโลยีในการจัดการคลังสินค้า</p>
                            <p class="card-text">วิศวกรรมโลจิสติกส์เป็นสาขาที่เน้นการออกแบบและพัฒนาระบบการจัดการการขนส่งและการกระจายสินค้าอย่างมีประสิทธิภาพ คุณจะได้เรียนรู้การใช้เทคโนโลยีและการวิเคราะห์ข้อมูลเพื่อเพิ่มประสิทธิภาพในกระบวนการโลจิสติกส์</p>
                            <p class="card-text">คุณเหมาะกับวิศวกรรมโลจิสติกส์เพราะคุณมีทักษะการวางแผนและการจัดการที่ดี รวมถึงความสามารถในการคิดเชิงระบบและแก้ปัญหาที่ซับซ้อน</p>
                             <div class="skills">
                                <div class="best-match style="font-size: 16px col">วิศวกรรมคอมพิวเตอร์ ' . $ceScore .  '%</div>
                                <img src="../public/img/CITE.svg" alt="Profile">
                            </div>
                            <div class="progress mt-2">
                                <div class="progress-bar" role="progressbar" style="width: ' . $ceScore  . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                              <div class="skills">
                              <div class="best-match style="font-size: 16px">เทคโนโลยีสารสนเทศและวิทยาการข้อมูล ' . $itScore . '%</div>
                                <img src="../public/img/CITE.svg" alt="Profile">
                            </div>
                            <div class="progress mt-2">
                                <div class="progress-bar" role="progressbar" style="width: ' . $itScore . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                              <div class="skills">
                                <div class="best-match style="font-size: 12px">วิศวกรรมโลจิสติกส์ ' . $leScore .  '%</div>
                                <img src="../public/img/CITE.svg" alt="Profile">
                            </div>
                            <div class="progress mt-2">
                                <div class="progress-bar" role="progressbar" style="width: ' . $leScore . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                        </div>
                    </div>';
                }
            } else {
                echo '<div class="alert alert-danger text-center">ไม่พบผลลัพธ์สำหรับ token ที่ระบุ</div>';
            }
        } else {
            echo '<div class="alert alert-warning text-center">ไม่มี token ที่ระบุ</div>';
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