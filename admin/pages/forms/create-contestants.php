<?php
    session_start();
    include "../../includes/properties.php";
    include "../../includes/admin-session.php";
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
                                    <img src="../../assets/images/gmall-logo.jpeg" style="padding-right: 68pc;"
                                        height="160px">
                                </div>

                                <?php
                            if(isset($_SESSION['msg'])){
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                            ?>

                                <form id="paymentForm" class="pt-3" method="POST"
                                    action="process/create-contestants.php">

                                    <div class="form-group">
                                        <input type="name" class="form-control form-control-lg" id="name" name="name"
                                            placeholder="Name">
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-lg" id="email-address"
                                            name="email" placeholder="Email">
                                    </div>


                                    <div class="form-group">
                                        <select class="form-control form-control-lg" id="payment" name="payment">
                                            <option value="">payment Category</option>
                                            <?php
                                        // Fetch payment options from the database
                                        $payment_query = mysqli_query($conn, "SELECT * FROM users");
                                        while($payment_row = mysqli_fetch_assoc($payment_query)) {
                                            echo '<option value="' . $payment_row['form_payment'] . '">' . $payment_row['form_payment'] . '</option>';
                                        }
                                        ?>
                                            <!-- Add more talent options as needed -->
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg" id="password"
                                            name="password" placeholder="Password">
                                    </div>



                                    <div class="form-group">
                                        <select class="form-control form-control-lg" id="talent" name="talent">
                                            <option value="">Talent Category</option>
                                            <?php
                                                // Fetch talent options from the database
                                                $talent_query = mysqli_query($conn, "SELECT * FROM categories");
                                                while($talent_row = mysqli_fetch_assoc($talent_query)) {
                                                    echo '<option value="' . $talent_row['name'] . '">' . $talent_row['name'] . '</option>';
                                                }
                                            ?>
                                            <!-- Add more talent options as needed -->
                                        </select>
                                    </div>



                                    <div class="form-group ml-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id=" agreeTerms"
                                                name="terms" required>
                                            <label class="form-check-label" for="agreeTerms">
                                                By clicking submit, you agree to our <a href="tncs.php">Terms and
                                                    Conditions</a>
                                            </label>
                                        </div>
                                    </div>

                                    <?php
                                        // Generate random verification code
                                        $verification_code = 'GMA-' . mt_rand(100, 999) . chr(mt_rand(65, 90)) . chr(mt_rand(65, 90));
                                    ?>

                                    <input type="hidden" name="verification_code"
                                        value="<?php echo $verification_code; ?>">

                                    <div class="mt-3">
                                        <button type="submit" name="submit" id="submitButton"
                                            class="btn btn-block btn-gradient-secondary btn-lg font-weight-medium auth-form-btn">
                                            Create a Contestant
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