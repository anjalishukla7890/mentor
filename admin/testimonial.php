<?php
include('../db.php');

// error_reporting(false);

// function RandomString()
// {
//     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//     $randstring = '';
//     for ($i = 0; $i < 10; $i++) {
//         $randstring .= $characters[rand(0, strlen($characters))];
//     }
//     return $randstring;
// }

// for ($i = 0; $i < 10000; $i++) {
//     # code...

//     $name = RandomString();
//     $email = RandomString() . '@gmail.com';
//     $subject = RandomString() . ' dummy subject';
//     $mesage = RandomString() . ' dummy message';


//     $sql = "INSERT INTO `contact`(`name`, `email`, `subject`, `message`, `status`, `add_date`) VALUES ('$name','$email','$subject','$mesage',true,'now()')";
//     $conn->query($sql);
// }

// return false;

session_start();

if ($_SESSION['id']) {

    echo "";
} else {
    header('location: index.php');
}
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
                            <a href="testimonial_insertform.php" class="btn btn-primary" style="float:right;  margin-top:65px; margin-left:10px;">Insert New Data</a>
                            <h5 class="card-title">Testimonials</h5>


                            <form action="" id="search_form" method="GET">
                                <div class="row">
                                    <div class="col-2">
                                        <input type="hidden" name="page" value="<?= !empty($_GET["page"]) ? $_GET["page"] : 1 ?>">
                                        <select onchange="$('#search_form').submit();" style="width: 100px;" class="form-control" name="limit" id="limit">
                                            <option value="" disabled selected>Limit </option>
                                            <option <?= !empty($_GET["limit"]) && $_GET["limit"] == 10 ? "selected" : "" ?> value="10">10</option>
                                            <option <?= !empty($_GET["limit"]) && $_GET["limit"] == 25 ? "selected" : "" ?> value="25">25</option>
                                            <option <?= !empty($_GET["limit"]) && $_GET["limit"] == 50 ? "selected" : "" ?> value="50">50</option>
                                            <option <?= !empty($_GET["limit"]) && $_GET["limit"] == 100 ? "selected" : "" ?> value="100">100</option>
                                            <option <?= !empty($_GET["limit"]) && $_GET["limit"] == 1000 ? "selected" : "" ?> value="1000">1000</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <input type="text" class="form-control" value="<?= !empty($_GET["search"]) ? $_GET["search"] : "" ?>" placeholder="Search" name="search">
                                    </div>

                                    <div class="col-3">
                                        <select onchange="$('#search_form').submit();" class="form-control" name="sortby" id="sortby">
                                            <option value="" disabled selected>Sort By </option>
                                            <option <?= !empty($_GET["sortby"]) && $_GET["sortby"] == "ASC" ? "selected" : "" ?> value="ASC">Ascending Order</option>
                                            <option <?= !empty($_GET["sortby"]) && $_GET["sortby"] == "DESC" ? "selected" : "" ?> value="DESC">Descending Order</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <?php

                                        $limit = !empty($_GET["limit"]) ? $_GET["limit"] : 10;
                                        $sort_sql = !empty($_GET["sortby"]) ? $_GET["sortby"] : "";

                                        if (isset($_GET['page'])) {
                                            $page = $_GET['page'];
                                        } else {
                                            $page = 1;
                                        }

                                        $offset = ($page - 1) * $limit;


                                        $sql = "SELECT * FROM `testimonial`";
                                        $run = mysqli_query($conn, $sql) or die("Query Failed");

                                        if (mysqli_num_rows($run) > 0) {
                                            $total_records = mysqli_num_rows($run);

                                            $total_page = ceil($total_records / $limit);

                                            echo '<div class="test" ><nav aria-label="Page navigation example">
                                                <ul style="margin:0px; float:right" class="pagination" >';

                                            if ($page > 2) {
                                                echo '<li class="page-item" ><a class="page-link"  href="testimonial.php?page=1&limit=' . $limit .'&sortby='.$sort_sql.'"> First </a></li>';
                                            }

                                            if ($page > 1) {
                                                echo '<li class="page-item"><a class="page-link"  href="testimonial.php?page=' . ($page - 1) . '&limit=' . $limit .'&sortby='.$sort_sql.'"> Prev </a></li>';
                                            }

                                            for ($i = 1; $i <= $total_page; $i++) {

                                                if ($i == $page) {
                                                    $active = "active";
                                                } else {
                                                    $active = "";
                                                }

                                                if ($i == $page || ($i > ($page - 3) && $i < $page) || ($i < ($page + 3) && $i > $page)) {
                                                    # code...
                                                    echo '<li class="page-item' . $active . '"><a class="page-link" href="testimonial.php?page=' . $i . '&limit=' . $limit .'&sortby='.$sort_sql.'">' . $i . '</a></li>';
                                                }
                                            }

                                            if ($total_page > $page) {
                                                echo '<li class="page-item"><a class="page-link" href="testimonial.php?page=' . ($page + 1) . '&limit=' . $limit . '&sortby='.$sort_sql.'">Next</a></li>';
                                            }

                                            if ($total_page != $page) {
                                                echo '<li class="page-item"><a class="page-link"  href="testimonial.php?page=' . $total_page . '&limit=' . $limit .'&sortby='.$sort_sql.'">Last</a></li>';
                                            }

                                            echo '</ul></nav></div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </form>
                            <br>




                            <!-- Table with hoverable rows -->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Edit Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $search_sql = "";
                                    $sort_sql = "";

                                    if (!empty($_GET["search"])) :
                                        $search_sql = " AND ( name LIKE '%" . $_GET["search"] . "%' || designation LIKE '%" . $_GET["search"] . "%')";
                                    endif;

                                    if (!empty($_GET["sortby"])) :
                                        $sort_sql = " ORDER BY id " . $_GET["sortby"];
                                    endif;

                                    $sql = "SELECT * FROM testimonial WHERE 1 $search_sql $sort_sql LIMIT  $offset, $limit";
                                    $query = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($query) > 0) {

                                        while ($data = mysqli_fetch_assoc($query)) {

                                    ?>
                                            <tr>
                                                <th scope="row"><?php echo $data['id']; ?></th>
                                                <td><?php echo $data['name']; ?></td>
                                                <td> <img height="50px" src="<?php echo "../images/" . $data['image']; ?>"></td>
                                                <td><?php echo $data['designation']; ?></td>
                                                <td>
                                                    <div class="text-center">
                                                        <a class="btn btn-primary" href="updatetestimonialform.php?page=<?php echo $page; ?>&id=<?php echo $data['id']; ?>">Edit</a>
                                                        <a class="btn btn-danger" onClick="return confirm('Are you sure you want to delete')" href="deletetestimonialdata.php?page=<?php echo $page; ?>&id=<?php echo $data['id']; ?>">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }

                                    ?>
                                </tbody>
                            </table>
                            <div style="text-align:right;"><b>
                                    Showing <?php echo (($offset) + 1); ?> to <?php echo ($offset + $limit); ?>

                                    Of <?php echo mysqli_num_rows(mysqli_query($conn, 'SELECT * FROM testimonial')); ?> entries
                                </b>
                            </div>


                            <!-- End Table with hoverable rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main><!-- End #main -->
</body>

</html>

<!-- ======= Footer ======= -->
<?php include('footer.php'); ?>
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<?php include('script.php'); ?>