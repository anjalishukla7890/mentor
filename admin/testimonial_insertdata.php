<?php
include('../db.php');
?>

<?php
if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $description = $_POST['description'];
    $imagename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmpname, "../images/$imagename");


    $sql = "INSERT INTO `testimonial`(`id`, `name`, `image`, `designation`, `description`) VALUES ('$id','$name','$imagename','$designation','$description') ";

    $run = mysqli_query($conn, $sql);


    if ($run) {

?>
        <script>
            alert('Data Inserted Successfully');
            window.open('testimonial.php', '_self');
        </script>

    <?php
    } else {
    ?>
        <script>
            alert('Error! Try again later');
            window.open('testimonial.php', '_self');
        </script>

<?php
    }
}

?>