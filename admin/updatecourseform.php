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
                            <h5 class="card-title">Courses Fields</h5>
                            <?php
                            $id = $_GET['id'];
                            $page =$_GET['page'];

                            $sql = " SELECT * FROM `courses` WHERE `id` ='" . $id . "'";
                            $query = mysqli_query($conn, $sql);

                            $data = mysqli_fetch_assoc($query);
                            ?>

                            <!-- General Form Elements -->
                            <form method="post" action="updatecoursedata.php" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Id</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="id" class="form-control" value="<?php echo $data['id']; ?>">
                                        <input type="hidden" name="page" class="form-control" value="<?php echo $page ; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label"> Trainer Id</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tid" class="form-control" value="<?php echo $data['trainer_id']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" style="height: 100px"><?php echo $data["description"]; ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Pricing</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="pricing" class="form-control" value="<?php echo $data['pricing']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Available Seats</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="availableseats" class="form-control" value="<?php echo $data['available_seats']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">View</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="view" class="form-control" value="<?php echo $data['view']; ?>">
                                    </div>
                                </div>                               

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Popular</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="popular" class="form-control" value="<?php echo $data['popular']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Create Date</label>
                                    <div class="col-sm-10">
                                        <input type="datetime" name="createdate" class="form-control" value="<?php echo $data['create_date']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label"> Update Date</label>
                                    <div class="col-sm-10">
                                        <input type="datetime" name="updatedate" class="form-control" value="<?php echo $data['update_date']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="image" type="file" id="formFile">
                                        <img src="<?php echo "../images/" . $data['image']; ?>">
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