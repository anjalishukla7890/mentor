<?php
include('../db.php');
?>

<?php 
if(isset($_POST['submit'])){

    $page = $_POST['page'];
    
    $id = $_POST['id'];
    $name = $_POST['name'];   
    $link = $_POST['link'];   
    $createdate = $_POST['createdate'];
    $updatedate = $_POST['updatedate'];
   

    $sql = "UPDATE `menu` SET `name`='$name',`link`='$link',`create_date`=' $createdate',`update_date`='updatedate' WHERE `id`=' $id'";

    $run = mysqli_query($conn, $sql);
  

    if($run){

       ?>
        <script>
            alert('Data Updated Successfully');
            window.open('menu.php?page=<?php echo $page; ?>', '_self');
        </script>

        <?php 
    }
    else
    {
        ?>
        <script>
            alert('Error! Try again later');
            window.open('menu.php?page=<?php echo $page; ?>', '_self');
        </script>

        <?php 
    }
}

?>