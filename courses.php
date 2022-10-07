<?php
session_start();
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
        <h2>Courses</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section =======-->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          
          <?php
          for ($i = 1; $i <= 50; $i++) {

            $sql = "SELECT courses.id , courses.name AS name1 , courses.description, courses.pricing, courses.image AS image1, courses.view,(SELECT name FROM trainer WHERE id = courses.trainer_id)  AS name2, trainer.image AS image2 FROM courses , trainer WHERE (courses.id = $i AND trainer.id = $i) && courses.status = 1";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

              while ($row = $result->fetch_assoc()) {

          ?>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mb-4 mt-md-0 ">

                  <div class="course-item">
                    <img src="<?php echo "images/".$row['image1']; ?>" style="width:100%; height:50%;" alt="...">
                    <div class="course-content">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4><?php echo $row['name1']; ?></h4>
                        <p class="price"><?php echo $row['pricing']; ?></p>
                      </div>


                      <h3><a href="course-details.php?id=<?php echo $row['id']; ?>"><?php echo $row['name1']; ?></a></h3>
                      
                      <p><?php echo $row['description']; ?></p>
                      <div class="trainer d-flex justify-content-between align-items-center">
                        <div class="trainer-profile d-flex align-items-center">
                          <img src="<?php echo "images/" . $row['image2']; ?>" class="img-fluid" alt="">
                          <span><?php echo $row['name2']; ?></span>
                        </div>
                        <div class="trainer-rank d-flex align-items-center">
                          <i class="bx bx-user"></i>&nbsp;<?php echo $row['view']; ?>
                          &nbsp;&nbsp;
                          <i class="bx bx-heart"></i>&nbsp;00
                        </div>
                      </div>
                    </div>


                  </div>

                </div>

          <?php
              }
            }
          }
          ?>
          <br /><br />
        </div>
      </div>
    </section>

    <!-- End Course Item-->

    <!--

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Content</h4>
                  <p class="price">$180</p>
                </div>

                <h3><a href="course-details.php">Copywriting</a></h3>
                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
                    <span>Brandon</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;20
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;85
                  </div>
                </div>
              </div>
            </div>
          </div>                   
      </div>-->
    <!-- End Course Item-->

    <!-- End Courses Section -->


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