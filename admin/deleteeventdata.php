<?php
include('../db.php');
?>

<?php 


    $sid = $_GET['id'];
    $page = $_GET['page'];

    $sql = " DELETE FROM `events`WHERE `id` = $sid  ";

    $run = mysqli_query($conn, $sql);

    if($run){

        ?>
        <script>
            alert('Data deleted Successfully');
            window.open('events.php?page=<?php echo $page; ?>', '_self');
        </script>

        <?php 
    
    }
    else
    {
        ?>
        <script>
            alert('Error! Try again later');
            window.open('events.php?page=<?php echo $page; ?>', '_self');
        </script>

        <?php 
    }
    


?>