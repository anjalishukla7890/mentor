<?php
include('../db.php');
?>

<?php 
if(isset($_POST['submit'])){

    $page = $_POST['page'];
    
    $sid = $_POST['id'];
    $email = $_POST['email'];   
    $createdate = $_POST['createdate'];
    $updatedate = $_POST['updatedate'];

    $sql = "UPDATE `subscriber` SET `email`= '".$email."' ,`create_date`='".$createdate."',`update_date`='".$updatedate."' WHERE `id`='".$sid."'";

    $run = mysqli_query($conn, $sql);

    if($run){

       ?>
        <script>
            alert('Data Updated Successfully');
            window.open('subscribers.php?page=<?php echo $page; ?>', '_self');
        </script>

        <?php 
    }
    else
    {
        ?>
        <script>
            alert('Error! Try again later');
            window.open('subscribers.php?page=<?php echo $page; ?>', '_self');
        </script>

        <?php 
    }
}

?>