<?php

include('../db.php');

$trainer_id = $_GET['id'];

$status = !$_GET['status'];

$sql = "UPDATE `trainer` SET `status`='$status' WHERE  `id`='" . $trainer_id . "' ";

$run = mysqli_query($conn, $sql);

if (!empty($run)) :
    echo 'success';
else :
    echo 'error';
endif;
