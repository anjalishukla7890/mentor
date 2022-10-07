<?php

include('../db.php');

$menu_id = $_GET['id'];

$status = !$_GET['status'];

$sql = "UPDATE `menu` SET `status`='$status' WHERE  `id`='" . $menu_id . "' ";

$run = mysqli_query($conn, $sql);

if (!empty($run)) :
    echo 'success';
else :
    echo 'error';
endif;
