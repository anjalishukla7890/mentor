<?php
include('../db.php');
?>

<?php 
if(isset($_POST['submit'])){

    $page = $_POST['page'];
    
    $id = $_POST['id'];
    $name = $_POST['name'];   
    $url = $_POST['url'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $createdate = $_POST['createdate'];
    $updatedate = $_POST['updatedate'];

    $image = "";
    if (!empty($_FILES['image']['name'])) {

        $imagename = $_FILES['image']['name'];
        $tmpname = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmpname, "../images/$imagename");

        $image = ", `image`='" . $imagename . "'";
    }

    $sql = "UPDATE `websitepages` SET `name`='$name ',`url_`='$url',`description`='$description',`type`='$type',`create_date`='$createdate',`update_date`='$updatedate' WHERE `id`='$id'";

    $run = mysqli_query($conn, $sql);
   
    if($run){

       ?>
        <script>
            alert('Data Updated Successfully');
            window.open('websitepages.php?page=<?php echo $page; ?>', '_self');
        </script>

        <?php 
    }
    else
    {
        ?>
        <script>
            alert('Error! Try again later');
            window.open('websitepages.php?page=<?php echo $page; ?>', '_self');
        </script>

        <?php 
    }
}

?>