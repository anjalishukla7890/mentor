<?php

include('../db.php');
session_start();

if ($_SESSION['id']) {

  echo "";
} else {
  header('location: index.php');
}


session_destroy();
 header('location:index.php');

?>