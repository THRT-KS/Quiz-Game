<?php


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
                         <h5 class="card-title" style="color: #458ce9;">เทคโนโลยีสารสนเทศและวิทยาการข้อมูล</h5>
                            <p class="card-text">การวิเคราะห์และจัดการข้อมูลขนาดใหญ่</p>
                            <p class="card-text">การพัฒนาระบบสารสนเทศและฐานข้อมูล</p>
                            <p class="card-text">การใช้เทคโนโลยี AI และ Machine Learning</p>
                            <p class="card-text">เทคโนโลยีสารสนเทศและวิทยาการข้อมูลเป็นสาขาที่เน้นการจัดการและวิเคราะห์ข้อมูลเพื่อสร้างความได้เปรียบทางธุรกิจ คุณจะได้เรียนรู้การใช้เทคโนโลยีสมัยใหม่เพื่อแปลงข้อมูลให้เป็นข้อมูลเชิงลึกที่มีคุณค่า</p>
                            <p class="card-text">คุณเหมาะกับสาขานี้เพราะคุณมีความสามารถในการคิดวิเคราะห์เชิงตัวเลข และสนใจในการใช้เทคโนโลยีเพื่อแก้ปัญหาทางธุรกิจ</p>';
                echo '<div class="skills">';
                echo '<div class="best-match" style="font-size: 16px">เทคโนโลยีสารสนเทศและวิทยาการข้อมูล ' . $leScore .  '%</div>';
                echo '<img src="../public/img/CITE.svg" alt="Profile">';
                echo '</div>';
                echo '<div class="progress mt-2">';
                echo '<div class="progress-bar" role="progressbar" style="width: ' . $leScore . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>';
                echo '</div>';
    
                if ($ceScore > $itScore) {
                    // Display IT section first
                    echo '<div class="skills">
                            <div class="best-match" style="font-size: 16px">วิศวกรรมคอมพิวเตอร์ ' . $ceScore . '%</div>
                            <img src="../public/img/CITE.svg" alt="Profile">
                          </div>
                          <div class="progress mt-2">
                            <div class="progress-bar" role="progressbar" style="width: ' . $ceScore . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>';
    
                    // Display Logistics Engineering section next
                    echo '<div class="skills">
                            <div class="best-match" style="font-size: 16px">เทคโนโลยีสารสนเทศและวิทยาการข้อมูล ' . $itScore .  '%</div>
                            <img src="../public/img/CITE.svg" alt="Profile">
                          </div>
                          <div class="progress mt-2">
                            <div class="progress-bar" role="progressbar" style="width: ' . $itScore . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>';
                } else {
                    // Display Logistics Engineering section first
                    echo '<div class="skills">
                            <div class="best-match" style="font-size: 16px">เทคโนโลยีสารสนเทศและวิทยาการข้อมูล ' . $itScore .  '%</div>
                            <img src="../public/img/CITE.svg" alt="Profile">
                          </div>
                          <div class="progress mt-2">
                            <div class="progress-bar" role="progressbar" style="width: ' . $itScore . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>';
    
                    // Display IT section next
                    echo '<div class="skills">
                            <div class="best-match" style="font-size: 16px">วิศวกรรมคอมพิวเตอร์ ' . $ceScore . '%</div>
                            <img src="../public/img/CITE.svg" alt="Profile">
                          </div>
                          <div class="progress mt-2">
                            <div class="progress-bar" role="progressbar" style="width: ' . $ceScore . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>';
                }
                ?>