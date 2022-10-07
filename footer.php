<?php
include('db.php');
?>

<footer id="footer" class="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <?php

        $sql = "SELECT `name`,`email`, `phone_no`, `address`,`company_name` FROM `admin` WHERE 1 ";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

          while ($row = $result->fetch_assoc()) {

        ?>

            <div class="col-lg-3 col-md-6 footer-contact">
              <h3><?php echo $row['company_name']; ?></h3>
              <p>
                <?php echo $row['address']; ?> <br><br>
                <strong>Phone:</strong> <?php echo $row['phone_no']; ?><br>
                <strong>Email:</strong> <?php echo $row['email']; ?><br>
              </p>
            </div>



            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="about.php">About us</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Our Services</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="course-details.php?id=1">Web Design</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="course-details.php?id=2">Web Development</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="course-details.php?id=8">Product Management</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="course-details.php?id=3">Marketing</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="course-details.php?id=13">Fashion Designing </a></li>
              </ul>
            </div>


            <!-------form section ----->



            <div class="col-lg-4 col-md-6 footer-newsletter">
              <h4>Join Our Newsletter</h4>
              <p>Subscribe us with your email to get the latest updates.</p>

              <?php
              // Program to display URL of current page.
              if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                $link = "https";
              else $link = "http";

              // Here append the common URL characters.
              $link .= "://";

              // Append the host(domain name, ip) to the URL.
              $link .= $_SERVER['HTTP_HOST'];

              // Append the requested resource location to the URL
              $link .= $_SERVER['REQUEST_URI'];

              ?>

              <form action="form.php" method="post">

                <input type="email" name="email"><input type="submit" name="submit" value="Subscribe">
                <input type="hidden" value="<?= $link ?>" name="current_url">
              </form>

            </div>


      </div>
    </div>
  </div>

  <div class="container d-md-flex py-4">

    <div class="me-md-auto text-center text-md-start">
      <div class="copyright">
        &copy; Copyright <strong><span><?php echo $row['company_name']; ?> </span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/"><?php echo $row['name']; ?>(<?php echo $row['company_name']; ?>)</a>
      </div>
    </div>
<?php
          }
        }
?>



<?php
$sql = "SELECT `twitter_link`, `facebook_link`, `instagram_link`, `skype_link`, `linkedin_link` FROM `admin` WHERE 1 ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while ($row = $result->fetch_assoc()) {

?>
    <div class="social-links text-center text-md-right pt-3 pt-md-0">
      <a href="<?php echo $row['twitter_link']; ?>" class="twitter"><i class="bx bxl-twitter"></i></a>
      <a href="<?php echo $row['facebook_link']; ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="<?php echo $row['instagram_link']; ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a href="<?php echo $row['skype_link']; ?>" class="google-plus"><i class="bx bxl-skype"></i></a>
      <a href="<?php echo $row['linkedin_link']; ?>" class="linkedin"><i class="bx bxl-linkedin"></i></a>
    </div>

<?php
  }
}
?>

  </div>
</footer>