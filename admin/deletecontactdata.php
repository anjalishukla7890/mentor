<?php
include('../db.php');
?>

<?php 

   
    $page = $_GET['page'];
    $sid = $_GET['id'];

    $sql = "DELETE FROM `contact` WHERE `id` = $sid  ";

    $run = mysqli_query($conn, $sql);

    if($run){

        ?>
        <script>
            alert('Data deleted Successfully');
            window.open('contact.php?page=<?php echo $page; ?>', '_self');
        </script>

        <?php 
    
    }
    else
    {
        ?>
        <script>
            alert('Error! Try again later');
            window.open('contact.php?page=<?php echo $page; ?>', '_self');
        </script>

        <?php 
    }
    


?>