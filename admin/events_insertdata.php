<?php
include('../db.php');
?>

<?php
if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $title = $_POST['name'];
    $description = $_POST["description"];
    $joining_fees = $_POST['joining_fees'];
    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];
    $time_from = $_POST['time_from'];
    $time_to = $_POST['time_to'];
    $createdate = $_POST['createdate'];
    $updatedate = $_POST['updatedate'];
    $imagename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmpname, "../images/$imagename");
    
    $sql = "INSERT INTO `events`(`id`, `title`, `description`, `image`, `joining_fees`, `date_from`, `date_to`, `time_from`, `time_to`, `status`, `create_date`, `update_date`) VALUES ('$id',' $title','$description','$imagename','$joining_fees',' $date_from','$date_to ','$time_from','$time_to',false,'$createdate','$updatedate') ";

    $run = mysqli_query($conn, $sql);

    if ($run) {

?>
        <script>
            alert('Data Inserted Successfully');
            window.open('events.php', '_self');
        </script>

    <?php
    } else {
    ?>
        <script>
            alert('Error! Try again later');
            window.open('events.php', '_self');
        </script>

<?php
    }
}

?>