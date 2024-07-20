<?php



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
        <p class="card-text">คุณเหมาะกับวิศวกรรมคอมพิวเตอร์เพราะคุณมีทักษะการคิดวิเคราะห์และแก้ไขปัญหาที่ดี รวมถึงความสามารถในการทำงานร่วมกับเทคโนโลยีต่าง ๆ</p>';
echo '<div class="skills">';
echo '<div class="best-match" style="font-size: 16px">วิศวกรรมคอมพิวเตอร์ ' . $ceScore .  '%</div>';
echo '<img src="../public/img/CITE.svg" alt="Profile">';
echo '</div>';
echo '<div class="progress mt-2">';
echo '<div class="progress-bar" role="progressbar" style="width: ' . $ceScore . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>';
echo '</div>';

if ($itScore > $leScore) {
    // Display IT section first
    echo '<div class="skills">
            <div class="best-match" style="font-size: 16px">เทคโนโลยีสารสนเทศและวิทยาการข้อมูล ' . $itScore . '%</div>
            <img src="../public/img/CITE.svg" alt="Profile">
          </div>
          <div class="progress mt-2">
            <div class="progress-bar" role="progressbar" style="width: ' . $itScore . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
          </div>';

    // Display Logistics Engineering section next
    echo '<div class="skills">
            <div class="best-match" style="font-size: 16px">วิศวกรรมโลจิสติกส์ ' . $leScore .  '%</div>
            <img src="../public/img/CITE.svg" alt="Profile">
          </div>
          <div class="progress mt-2">
            <div class="progress-bar" role="progressbar" style="width: ' . $leScore . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
          </div>';
} else {
    // Display Logistics Engineering section first
    echo '<div class="skills">
            <div class="best-match" style="font-size: 16px">วิศวกรรมโลจิสติกส์ ' . $leScore .  '%</div>
            <img src="../public/img/CITE.svg" alt="Profile">
          </div>
          <div class="progress mt-2">
            <div class="progress-bar" role="progressbar" style="width: ' . $leScore . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
          </div>';

    // Display IT section next
    echo '<div class="skills">
            <div class="best-match" style="font-size: 16px">เทคโนโลยีสารสนเทศและวิทยาการข้อมูล ' . $itScore . '%</div>
            <img src="../public/img/CITE.svg" alt="Profile">
          </div>
          <div class="progress mt-2">
            <div class="progress-bar" role="progressbar" style="width: ' . $itScore . '%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
          </div>';
}
?>