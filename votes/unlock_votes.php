<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Purple Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../dashboard/assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../dashboard/assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="../dashboard/assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="../dashboard/assets/images/favicon.ico" />
        <style>
        body {
            margin-top: 50px;
        }
        </style>
    </head>

    <body>


        <div class="container-fluid">

            <div class="row justify-content-center align-items-center">

                <div class="col-lg-4 col-md-6">

                    <!-- Image column -->

                    <div class="brand-logo text-center mb-4 mb-md-0">
                        <img src="../images/bwec-logo.png" height="160px">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h3>Unlock more votes</h3>
                    <!-- Description -->
                    <p>You can unlock more votes by purchasing voting power to keep your favorite contestant ahead. </p>


                    <?php
                                        if(isset($_SESSION['msg'])){
                                          echo $_SESSION['msg'];
                                          unset($_SESSION['msg']);
                                        }
                                    ?>

                    <form id="paymentForm" class="pt-3" method="POST" action="process/buyvote.php">
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg" id="email-address" name="email"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control form-control-lg" id="amount" name="amount"
                                placeholder="Amount">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" id="first-name" name="firstname"
                                placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" id="last-name" name="lastname"
                                placeholder="Last Name">
                        </div>
                        <div class="mt-3">
                            <button type="submit" id="submitButton"
                                class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                BUY VOTES
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
        <script src="../dashboard/assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="https://js.paystack.co/v1/inline.js"></script>

        <script src="process/buyvote.js"></script>
        <script src="../dashboard/assets/js/off-canvas.js"></script>
        <script src="../dashboard/assets/js/hoverable-collapse.js"></script>
        <script src="../dashboard/assets/js/misc.js"></script>
        <!-- endinject -->
    </body>

</html>