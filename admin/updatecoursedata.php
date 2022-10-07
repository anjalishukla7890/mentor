<?php
include('../db.php');


if (isset($_POST['submit'])) {

    $page = $_POST['page'];

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

    $image = "";
    if (!empty($_FILES['image']['name'])) {

        $imagename = $_FILES['image']['name'];
        $tmpname = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmpname, "../images/$imagename");

        $image = ", `image`='" . $imagename . "'";
    }

    $sql = "UPDATE `courses` SET `trainer_id`='".$trainer_id."',`name`='". $name."',`description`='".$description."',`pricing`='".$pricing."',`available_seats`='".$availableseats."',`view`='".$view."',`popular`='".$popular."',`create_date`='".$createdate."',`update_date`='".$updatedate."' $image WHERE  `id`='". $id."' ";

    $run = mysqli_query($conn, $sql);
    

    if ($run) {

?>
        <script>
            alert('Data Updated Successfully');
            window.open('courses.php?page=<?php echo $page; ?>', '_self');
        </script>

    <?php
    } else {
    ?>
        <script>
            alert('Error! Try again later');
            window.open('courses.php?page=<?php echo $page; ?>', '_self');
        </script>

<?php
    }
}

?>