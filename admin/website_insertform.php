<?php
include('../db.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<!-- ======= Header ======= -->
<?php include('header.php'); ?>

<!-- End Header -->
<?php include('sidebar.php'); ?>
<!-- ======= Sidebar ======= -->

<!-- End Sidebar-->

<body>
    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col">


                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Websitepages</h5>

                            <!-- General Form Elements -->
                            <form method="post" action="website_insertform.php" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Id</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="id" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">URL</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="url" class="form-control" value="">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="description" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Type</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="type" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Create Date</label>
                                    <div class="col-sm-10">
                                        <input type="datetime" name="createdate" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Update Date</label>
                                    <div class="col-sm-10">
                                        <input type="datetime" name="updatedate" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit Form</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->
</body>

</html>

<?php

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $url = $_POST['url'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $createdate = $_POST['createdate'];
    $updatedate = $_POST['updatedate'];
    $imagename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmpname, "../images/$imagename");


    $sql = "INSERT INTO `websitepages`(`id`, `name`, `url_`, `description`, `type`, `image`, `status`, `create_date`, `update_date`) VALUES ('$id','$name','$url','$description','$type','$imagename',false,'$createdate','$updatedate')";

    $run = mysqli_query($conn, $sql);

    if ($run) {

?>
        <script>
            alert('Data Updated Successfully');
            window.open('websitepages.php', '_self');
        </script>

    <?php
    } else {
    ?>
        <script>
            alert('Error! Try again later');
            window.open('websitepages.php', '_self');
        </script>

<?php
    }
}

?>



<!-- ======= Footer ======= -->
<?php include('footer.php'); ?>
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<?php include('script.php'); ?>