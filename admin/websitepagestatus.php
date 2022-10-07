<?php

include('../db.php');

$webpage_id = $_GET['id'];

$status = !$_GET['status'];

$sql = "UPDATE `websitepages` SET `status`='$status' WHERE  `id`='" . $webpage_id . "' ";

$run = mysqli_query($conn, $sql);

if (!empty($run)) :
    echo 'success';
else :
    echo 'error';
endif;
