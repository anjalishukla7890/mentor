<?php
include('../db.php');


if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $trainer_id = $_POST['tid'];
    $name = $_POST['name'];
    $description = $_POST["description"];
    $pricing = $_POST['pricing'];
    $availableseats = $_POST['availableseats'];
    $view = $_POST['view'];
    $popular = $_POST['popular'];
    $createdate = $_POST['createdate'];
    $updatedate = $_POST['updatedate'];
    $imagename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmpname, "../images/$imagename");


    $sql = "INSERT INTO `courses`(`id`, `trainer_id`, `name`, `description`, `pricing`, `image`, `available_seats`, `view`, `status`, `popular`, `create_date`, `update_date`) VALUES ('$id',' $trainer_id','$name','$description','$pricing','$imagename','$availableseats',' $view',false,'$popular','$createdate','$updatedate') ";

    $run = mysqli_query($conn, $sql);


    if ($run) {

?>
        <script>
            alert('Data Inserted Successfully');
            window.open('courses.php', '_self');
        </script>

    <?php
    } else {
    ?>
        <script>
            alert('Error! Try again later');
            window.open('courses.php', '_self');
        </script>

<?php
    }
}

?>