<?php
include('../db.php');
?>

<?php 
if(isset($_POST['submit'])){
    
    $page = $_POST['page'];

    $id = $_POST['id'];
    $name = $_POST['name'];   
    $designation = $_POST['designation'];
    $description = $_POST['description']; 
    
    $image = "";
    if (!empty($_FILES['image']['name'])) {

        $imagename = $_FILES['image']['name'];
        $tmpname = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmpname, "../images/$imagename");

        $image = ", `image`='" . $imagename . "'";
    }

    $sql = "UPDATE `testimonial` SET `name`='$name',`designation`='$designation',`description`='$description' $image  WHERE `id`=' $id '";

    $run = mysqli_query($conn, $sql);
   

    if($run){

       ?>
        <script>
            alert('Data Updated Successfully');
            window.open('testimonial.php?page=<?php echo $page; ?>', '_self');
        </script>

        <?php 
    }
    else
    {
        ?>
        <script>
            alert('Error! Try again later');
            window.open('testimonial.php?page=<?php echo $page; ?>', '_self');
        </script>

        <?php 
    }
}

?>