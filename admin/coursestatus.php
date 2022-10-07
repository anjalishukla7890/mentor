<?php

include('../db.php');

$course_id = $_GET['id'];

$status = !$_GET['status'];

$sql = "UPDATE `courses` SET `status`='$status' WHERE  `id`='" . $course_id . "' ";

$run = mysqli_query($conn, $sql);

if (!empty($run)) :
    echo 'success';
else :
    echo 'error';
endif;
