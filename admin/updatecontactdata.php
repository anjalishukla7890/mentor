<?php
include('../db.php');


if (isset($_POST['submit'])) {

    $page = $_POST['page'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST["email"];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $add_date = $_POST['add_date'];    
    $updatedate = $_POST['updatedate'];
        

    $sql = "UPDATE `contact` SET `name`='$name',`email`='$email ',`subject`='$subject',`message`='$message',`add_date`='$add_date',`update_date`='$updatedate' WHERE `id`='$id'";

    $run = mysqli_query($conn, $sql);
    

    if ($run) {

?>
        <script>
            alert('Data Updated Successfully');
            window.open('contact.php?page=<?php echo $page; ?>', '_self');
        </script>

    <?php
    } else {
    ?>
        <script>
            alert('Error! Try again later');
            window.open('contact.php?page=<?php echo $page; ?>', '_self');
        </script>

<?php
    }
}

?>