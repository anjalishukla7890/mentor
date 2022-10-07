
<?php
include('../db.php');
?>

<?php 
if(isset($_POST['submit'])){

     $page = $_POST['page'];
    
    $id = $_POST['id'];
    $title = $_POST['name'];
    $description = $_POST["description"];
    $joining_fees = $_POST['joining_fees'];
    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];
    $time_from = $_POST['time_from'];
    $time_to = $_POST['time_to'];    
    $createdate = $_POST['createdate'];
    $updatedate = $_POST['updatedate'];

    $image = "";
    if(!empty($_FILES['image']['name'])){

        $imagename = $_FILES['image']['name'];
        $tmpname= $_FILES['image']['tmp_name'];

        move_uploaded_file($tmpname, "../images/$imagename");

        $image = ", `image`='".$imagename."'";
    }

    $sql = "UPDATE `events` SET `title`='". $title ."' , `description`='". $description."' , `joining_fees`='".$joining_fees."' ,`date_from`= '". $date_from ."' ,`date_to`= '". $date_to."',`time_from`='". $time_from."',`time_to`='".$time_to."' ,`create_date`= '".$createdate."',`update_date`='". $updatedate."' $image WHERE `id`='". $id."'";

    $run = mysqli_query($conn, $sql);


    if($run){

       ?>
        <script>
            alert('Data Updated Successfully');
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
}

?>