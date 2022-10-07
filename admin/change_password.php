<?php
include('../db.php');
session_start();

if ($_SESSION['id']) {

  echo "";
} else {
  header('location: index.php');
}


if (isset($_POST['change'])) {

  $id = $_POST['id'];
  $current_password = $_POST['password'];
  $new_password = $_POST['newpassword'];
  $renew_password = $_POST['renewpassword'];

  $sql = "SELECT * FROM `admin` WHERE `password`='" . $current_password . "'";

  $query = mysqli_query($conn, $sql);

  $run = mysqli_num_rows($query);

  if ($run) {

    if ($new_password == $renew_password) {

      $sql = "UPDATE `admin` SET `password`='" . $renew_password . "' WHERE  `id`='" . $id . "'";
      $query = mysqli_query($conn, $sql);

?>
      <script>
        alert('Password Updated Successfully');
        window.open('users-profile.php', '_self');
      </script>

    <?php

    } else {

    ?>
      <script>
        alert('New Password Not Matched');
        window.open('users-profile.php', '_self');
      </script>

    <?php
    }
  } else {

    ?>
    <script>
      alert('Current Password Not Matched');
      window.open('users-profile.php', '_self');
    </script>

<?php
  }
}
?>