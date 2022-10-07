<?php
include('../db.php');

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


<body>
  
<!-- ======= Header ======= -->
  <?php include('header.php'); ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include('sidebar.php'); ?>
  <!-- End Sidebar-->
  

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">


        <?php

        $sql = "SELECT * FROM `admin`";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) > 0) {

          while ($data = mysqli_fetch_assoc($query)) {
        ?>

            <div class="col-xl-4">
              <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                  <img src="<?php echo "../images/" . $data['image']; ?>" alt="Profile" class="img-fluid rounded-circle">
                  <h2><?php echo $data['name']; ?></h2>
                  <h3><?php echo $data['designation']; ?></h3>
                  <div class="social-links mt-2">
                    <a href="<?php echo $data['twitter_link']; ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="<?php echo $data['facebook_link']; ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="<?php echo $data['instagram_link']; ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="<?php echo $data['linkedin_link']; ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-8">

              <div class="card">
                <div class="card-body pt-3">
                  <!-- Bordered Tabs -->
                  <ul class="nav nav-tabs nav-tabs-bordered">

                    <li class="nav-item">
                      <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                    </li>

                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                    </li>

                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                    </li>

                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                    </li>

                  </ul>
                  <div class="tab-content pt-2">

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                      <h5 class="card-title">About</h5>
                      <p class="small fst-italic"><?php echo $data['about']; ?></p>

                      <h5 class="card-title">Profile Details</h5>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                        <div class="col-lg-9 col-md-8"><?php echo $data['name']; ?></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Company</div>
                        <div class="col-lg-9 col-md-8"><?php echo $data['company_name']; ?></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Job</div>
                        <div class="col-lg-9 col-md-8"><?php echo $data['designation']; ?></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Country</div>
                        <div class="col-lg-9 col-md-8"> <?php echo $data['country']; ?></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Address</div>
                        <div class="col-lg-9 col-md-8"><?php echo $data['address']; ?></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Phone</div>
                        <div class="col-lg-9 col-md-8"><?php echo $data['phone_no']; ?></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8"><?php echo $data['email']; ?></div>
                      </div>

                    </div>

                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                      <!-- Profile Edit Form -->
                      <form method="post" action="userprofiledata.php" enctype="multipart/form-data">

                        <div class="row mb-3">
                          <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                          <div class="col-md-8 col-lg-9">
                            <img src="<?php echo "../images/" . $data['image']; ?>" alt="Profile">
                            <div class="pt-2">
                              <input class="form-control" type="file" name="image">
                              <!---<a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> -->
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label"></label>
                          <div class="col-md-8 col-lg-9">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $data['id']; ?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" name="name" class="form-control" id="fullName" value="<?php echo $data['name']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                          <div class="col-md-8 col-lg-9">
                            <textarea class="form-control" name="about" style="height: 100px"><?php echo $data['about']; ?></textarea>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" name="company" class="form-control" id="company" value="<?php echo $data['company_name']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" name="designation" class="form-control" id="Job" value="<?php echo $data['designation']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" name="country" class="form-control" id="Country" value="<?php echo $data['country']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" name="address" class="form-control" id="Address" value="<?php echo $data['address']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" name="phone" class="form-control" id="Phone" value="<?php echo $data['phone_no']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="email" name="email" class="form-control" id="Email" value="<?php echo $data['email']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" name="t_profile" class="form-control" id="Twitter" value="<?php echo $data['twitter_link']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" name="f_profile" class="form-control" id="Facebook" value="<?php echo $data['facebook_link']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" name="insta_profile" class="form-control" id="Instagram" value="<?php echo $data['instagram_link']; ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Skype Profile</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" name="skype_profile" class="form-control" id="skype" value="<?php echo $data['skype_link']; ?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                          <div class="col-md-8 col-lg-9">
                            <input type="text" name="linkedin_profile" class="form-control" id="Linkedin" value="<?php echo $data['linkedin_link']; ?>">
                          </div>
                        </div>

                        <div class="text-center">
                          <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                      </form>

                      <!-- End Profile Edit Form -->

                    </div>

                    <div class="tab-pane fade pt-3" id="profile-settings">

                      <!-- Settings Form -->
                      <form>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                          <div class="col-md-8 col-lg-9">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="changesMade" checked>
                              <label class="form-check-label" for="changesMade">
                                Changes made to your account
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="newProducts" checked>
                              <label class="form-check-label" for="newProducts">
                                Information on new products and services
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="proOffers">
                              <label class="form-check-label" for="proOffers">
                                Marketing and promo offers
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                              <label class="form-check-label" for="securityNotify">
                                Security alerts
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                      </form><!-- End settings Form -->

                    </div>

                    <div class="tab-pane fade pt-3" id="profile-change-password">
                      <!-- Change Password Form -->
                      <form method="post" action="change_password.php">

                        <input type="hidden" name="id" class="form-control" value="<?php echo $data['id']; ?>">

                        <div class="row mb-3">
                          <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="password" type="password" class="form-control" id="currentPassword">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                          </div>
                        </div>

                        <div class="text-center">

                          <button type="submit" name="change" class="btn btn-primary">Change Password</button>
                        </div>
                      </form><!-- End Change Password Form -->

                    </div>

                  </div><!-- End Bordered Tabs -->

                </div>
              </div>
            </div>
        <?php
          }
        }

        ?>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('footer.php'); ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php include('script.php'); ?>

</body>

</html>