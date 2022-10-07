<?php
include('../db.php');
?>

<?php

$page = $_GET['page'];
$sid = $_GET['id'];

$sql = "DELETE FROM `menu` WHERE `id` = $sid  ";

$run = mysqli_query($conn, $sql);

if ($run) {

?>
    <script>
        alert('Data deleted Successfully');
        window.open('menu.php?page=<?php echo $page; ?>', '_self');
    </script>

<?php

} else {
?>
    <script>
        alert('Error! Try again later');
        window.open('menu.php?page=<?php echo $page; ?>', '_self');
    </script>

<?php
}



?>