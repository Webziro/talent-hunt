<?php
    session_start();
    include "../../includes/properties.php";
    include "../../../includes/conn.php";
    if(isset($_SESSION['userid'])){
        $userid = $_SESSION['userid'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $userid ");
    //  or die(mysqli_errno($conn));
    $result = mysqli_fetch_assoc($query);
    }else{
        header("location:../auth/signin.php ");
    }

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
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left p-5">
                                <div class="brand-logo">
                                    <img src="../../assets/images/gmally-logo.png" style="padding-right: 68pc;"
                                        height="160px">
                                </div>

                                <?php
                                        if(isset($_SESSION['msg'])){
                                          echo $_SESSION['msg'];
                                          unset($_SESSION['msg']);
                                        }
                                    ?>

                                <form id="paymentForm" class="pt-3" method="POST" action="process/buyformprocess.php">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-lg" id="email-address"
                                            name="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control form-control-lg" id="amount"
                                            name="amount" value="5000">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" id="first-name"
                                            name="firstname" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" id="last-name"
                                            name="lastname" placeholder="Last Name" required>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" id="submitButton"
                                            class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                            BUY FORM
                                        </button>
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
        <script src="https://js.paystack.co/v1/inline.js"></script>

        <script src="process/buyformscript.js"></script>
        <script src="../../assets/js/off-canvas.js"></script>
        <script src="../../assets/js/hoverable-collapse.js"></script>
        <script src="../../assets/js/misc.js"></script>
        <!-- endinject -->
    </body>

</html>