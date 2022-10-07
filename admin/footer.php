<?php
include('../db.php');


?>

<footer id="footer" class="footer">

  <?php

  $sql = "SELECT * FROM `admin`";

  $query = mysqli_query($conn, $sql);
  $run = mysqli_num_rows($query);
  if ($run >= 1) {
    while ($data = mysqli_fetch_assoc($query)) {

  ?>
      <div class="copyright">
        &copy; Copyright <strong><span><?php echo $data['company_name']; ?></span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        Designed by <a href="https://bootstrapmade.com/"><?php echo $data['name']; ?></a>
      </div>

  <?php
    }
  }

  ?>
</footer>