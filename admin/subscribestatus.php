<?php

include('../db.php');

$course_id = $_GET['id'];

$verify_email = !$_GET['verify_email'];

$sql = "UPDATE `subscriber` SET `verify_email`='$verify_email' WHERE  `id`='" . $course_id . "' ";

$run = mysqli_query($conn, $sql);

if (!empty($run)) :
    echo 'success';
else :
    echo 'error';
endif;
