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

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Events</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">
        <div class="row">


        <?php
          for ($i = 1; $i <= 100; $i++) {
            $sql = "SELECT title , description , image, date_from, time_from FROM events WHERE id = $i AND status=1";
           

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

              while ($row = $result->fetch_assoc()) {

            ?>  
          <div class="col-md-6 d-flex align-items-stretch" > 
            <div class="card">
              <div class="card-img">
                <img src="<?php echo "images/".$row['image']; ?>"  alt="...">
              </div>
              <div class="card-body" >
                <h5 class="card-title"><a href=""><?php echo $row['title']; ?></a></h5>
                <p class="fst-italic text-center"><?php echo $row['date_from']; ?> &nbsp; <?php echo $row['time_from']; ?></p>
                <p class="card-text"><?php echo $row['description']; ?></p>
              </div>
            </div>
          </div>

          <?php

          }}}
          
          ?>
          <!--
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/events-2.jpg" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Marketing Strategies</a></h5>
                <p class="fst-italic text-center">Sunday, November 15th at 7:00 pm</p>
                <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>
              </div>
            </div>

          </div> -->
        </div>
      </div>
    </section><!-- End Events Section -->

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