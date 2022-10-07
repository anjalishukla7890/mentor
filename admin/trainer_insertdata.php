<?php
include('../db.php');
?>

<?php
if (isset($_POST['submit'])) {

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
    $imagename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmpname, "../images/$imagename");

    $sql = "INSERT INTO `trainer`(`id`, `name`, `email`, `phone_no`, `image`, `designation`, `about`, `popular`, `twitter_link`, `facebook_link`, `instagram_link`, `skype_link`, `linkedin_link`, `status`, `create_date`, `update_date`) VALUES ('id','$name','$email','$phone_no','$imagename ','$designation','$about','$popular',' $twitter_link','$facebook_link',' $instagram_link','$skype_link',' $linkedin_link',false,'$createdate','$updatedate')";

    $run = mysqli_query($conn, $sql);


    if ($run) {

?>
        <script>
            alert('Data Inserted Successfully');
            window.open('trainers.php', '_self');
        </script>

    <?php
    } else {
    ?>
        <script>
            alert('Error! Try again later');
            window.open('trainers.php', '_self');
        </script>

<?php
    }
}

?>