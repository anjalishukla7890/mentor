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
                            <h5 class="card-title">Events Fields</h5>
                            

                            <!-- General Form Elements -->
                            <form method="post" action="events_insertdata.php" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Id</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="id" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Event Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" style="height: 100px"></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Joining fees</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="joining_fees" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label"> Date From</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="date_from" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Date To</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="date_to" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Time From</label>
                                    <div class="col-sm-10">
                                        <input type="time" name="time_from" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Time To</label>
                                    <div class="col-sm-10">
                                        <input type="time" name="time_to" class="form-control" value="">
                                    </div>
                                </div>                                

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Create Date</label>
                                    <div class="col-sm-10">
                                        <input type="datetime" name="createdate" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label"> Update Date</label>
                                    <div class="col-sm-10">
                                        <input type="datetime" name="updatedate" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="image" type="file" id="formFile"><br />
                                        
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