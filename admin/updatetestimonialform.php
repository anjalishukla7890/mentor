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
                            <h5 class="card-title">Testimonial Fields</h5>
                            <?php
                            $id = $_GET['id']; 
                            $page =$_GET['page'];


                            $sql = " SELECT * FROM `testimonial` WHERE `id` ='" . $id . "'";
                            $query = mysqli_query($conn, $sql);

                            $data = mysqli_fetch_assoc($query);
                            ?>

                            <!-- General Form Elements -->
                            <form method="post" action="updatetestimonialdata.php" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Id</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="id" class="form-control" value="<?php echo $data['id']; ?>">
                                        <input type="hidden" name="page" class="form-control" value="<?php echo $page ; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>">
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Designation</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="designation" class="form-control" value="<?php echo $data['designation']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label"> Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="description" class="form-control" value="<?php echo $data['description']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label"> Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" class="form-control" ><br>
                                        <img height="200px" src="<?php echo "../images/" . $data['image']; ?>">
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



<!-- ======= Footer ======= -->
<?php include('footer.php'); ?>
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<?php include('script.php'); ?>