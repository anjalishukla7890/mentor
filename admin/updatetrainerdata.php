<?php
include('../db.php');
?>

<?php
if (isset($_POST['submit'])) { 
    
    $page = $_POST['page'];
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST["email"];
    $phone_no = $_POST['phone_no'];
    $designation = $_POST['designation'];
    $about = $_POST['about'];
    $popular = $_POST['popular'];
    $twitter_link = $_POST['twitter_link'];
    $facebook_link = $_POST['facebook_link'];
    $instagram_link = $_POST['instagram_link'];
    $skype_link = $_POST['skype_link'];
    $linkedin_link = $_POST['linkedin_link'];
    $createdate = $_POST['createdate'];
    $updatedate = $_POST['updatedate'];

    $image = "";
    if (!empty($_FILES['image']['name'])) {

        $imagename = $_FILES['image']['name'];
        $tmpname = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmpname, "../images/$imagename");

        $image = ", `image`='" . $imagename . "'";
    }

    $sql = "UPDATE `trainer` SET `name`='" . $name . "',`email`='" . $email . "',`phone_no`='" . $phone_no . "', `designation`='" . $designation . "',`about`='" . $about . "',`popular`='" . $popular . "',`twitter_link`='" . $twitter_link . "',`facebook_link`='" . $facebook_link . "',`instagram_link`='" . $instagram_link . "',`skype_link`='" . $skype_link . "',`linkedin_link`='" . $linkedin_link . "',`create_date`='" . $createdate . "',`update_date`='" . $updatedate . "' $image WHERE `id`='" . $id . "' ";

    $run = mysqli_query($conn, $sql);

   
    if ($run) {

?>
        <script>
            alert('Data Updated Successfully');
            window.open('trainers.php?page=<?php echo $page; ?>', '_self');
        </script>

    <?php
    } else {
    ?>
        <script>
            alert('Error! Try again later');
            window.open('trainers.php?page=<?php echo $page; ?>', '_self');
        </script>

<?php
    }
}

?>