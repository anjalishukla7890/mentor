<?php 
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php include('header.php') ?>

<body>

  <!-- ======= Header ======= -->
  <?php include('menu.php') ?>
  <!-- End Header -->

  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Trainers</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <?php 
          for ($i = 1; $i <= 50; $i++) {
            $sql="SELECT `name`,`image`, `designation`, `about`, `twitter_link`, `facebook_link`, `instagram_link`,  `linkedin_link` FROM `trainer` WHERE `id`= $i AND `status`=1";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

              while ($row = $result->fetch_assoc()) {

            ?>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="<?php echo "images/".$row['image']; ?>" class="img-fluid" alt="">
              <div class="member-content">
                <h4><?php echo $row['name']; ?> </h4>
                <span> <?php echo $row['designation']; ?> </span>
                <p>
                <?php echo $row['about']; ?> 
                </p>
                <div class="social">
                  <a href="<?php echo $row['twitter_link']; ?>"><i class="bi bi-twitter"></i></a>
                  <a href="<?php echo $row['facebook_link']; ?>"><i class="bi bi-facebook"></i></a>
                  <a href="<?php echo $row['instagram_link']; ?>"><i class="bi bi-instagram"></i></a>
                  <a href="<?php echo $row['linkedin_link']; ?>"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <?php
         } }}
         ?>

          <!--

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Sarah Jhinson</h4>
                <span>Marketing</span>
                <p>
                  Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>William Anderson</h4>
                <span>Content</span>
                <p>
                  Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div> -->

        </div>
      </div>
    </section><!-- End Trainers Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('footer.php') ?>
    <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php include('script.php') ?>

</body>

</html>