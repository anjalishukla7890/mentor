 <?php
   include('db.php');
   ?>

 <?php

   if (isset($_POST['submit'])) {

      $email = $_POST['email'];
      $current_url = $_POST['current_url'];

      $sql = "INSERT INTO `subscriber` ( `email`) VALUES ( '" . $email . "')";

      $run = mysqli_query($conn, $sql);

      if ($run) {
   ?>
   
       <script>
          alert('Thanks! Your email has been sent successfully, We will contact you as soon as possible');
          window.open("<?= $current_url ?>#footer", '_self');
       </script>

    <?php

      } else {
      ?>
     
       <script>
          alert('Error! Please try again later');
          window.open("<?= $current_url ?>#footer", '_self');
       </script>


 <?php
      }
   }
   ?>