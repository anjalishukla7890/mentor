<?php
include('../db.php');
session_start();

if ($_SESSION['id']) {

    echo "";
} else {
    header('location: index.php');
}

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $about = $_POST["about"];
    $company = $_POST['company'];
    $designation = $_POST['designation'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $twitter_profile = $_POST['t_profile'];
    $fb_profile = $_POST['f_profile'];
    $insta_profile = $_POST['insta_profile'];
    $skype_profile = $_POST['skype_profile'];
    $linkedin_profile = $_POST['linkedin_profile'];

    $image = "";

    if (!empty($_FILES['image']['name'])) {

        $imagename = $_FILES['image']['name'];
        $tmpname = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmpname, "../images/$imagename");

        $image = ", `image`='" . $imagename . "'";
    }

    $sql = "UPDATE `admin` SET `name`='" . $name . "',`designation`='" . $designation . "',`about`='" . $about . "',`email`='" . $email . "',`phone_no`='" . $phone . "' ,`company_name`='" . $company . "',`country`='" . $country . "',`address`='" . $address . "',`twitter_link`='" . $twitter_profile . "',`facebook_link`='" . $fb_profile . "',`instagram_link`='" . $insta_profile . "',`skype_link`= '" . $skype_profile . "',`linkedin_link`='" . $linkedin_profile . "' $image WHERE `id`='" . $id . "'";

    $run = mysqli_query($conn, $sql);



    if ($run) {

?>
        <script>
            alert('Data Updated Successfully');
            window.open("users-profile.php", "_self");
        </script>

    <?php
    } else {
    ?>
        <script>
            alert('Error! Try again later');
            window.open('users-profile.php', '_self');
        </script>

<?php
    }
}

?>