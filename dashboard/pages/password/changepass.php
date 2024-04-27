<?php
session_start();
  include "process/conn.php";
  include "../../includes/properties.php";

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            <? echo $title; ?>
        </title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="../../assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="../../assets/images/gmall-logo.jpeg" />

    </head>

    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth">
                    <div class="row flex-grow">
                        <div class="col-lg-6 mx-auto">
                            <div class="auth-form-light text-left p-3">
                                <!-- <div class="brand-logo">
                                    <img src="../../assets/images/bwec-logo-nobg.png" height="300px" width="10px">

                                </div> -->

                                <?php
                                        if(isset($_SESSION['msg'])){
                                          echo $_SESSION['msg'];
                                          unset($_SESSION['msg']);
                                        }
                                    ?>
                                <h4>Hello! Change your Password</h4>
                                <h6 class="font-weight-light">Change password to continue.</h6>
                                <form class="pt-3" method="POST" action="process/changepassprocess.php">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg"
                                            id="exampleInputPassword1" name="currentPassword"
                                            placeholder="Current Password">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg"
                                            id="exampleInputPassword1" name="newPassword" placeholder="New Password">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg"
                                            id="exampleInputPassword1" name="confirmPassword"
                                            placeholder="Confirm Password">
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" name="submit"
                                            class="btn btn-block btn-gradient-secondary btn-lg font-weight-medium auth-form-btn"
                                            href="">CHANGE PASSWORD</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="../../assets/js/off-canvas.js"></script>
        <script src="../../assets/js/hoverable-collapse.js"></script>
        <script src="../../assets/js/misc.js"></script>
        <!-- endinject -->
    </body>

</html>