<?php
    session_start();
    include "../../../includes/conn.php";
    include "../../includes/properties.php";


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
            <?Php echo $title;?>
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
        <link rel="shortcut icon" href="../../assets/images/favicon.png" />
    </head>

    <body>
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="../../index.php"><img
                            src="../../assets/images/bwec-logo.png" alt="logo" /></a>

                    <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/bwec-logo.png"
                            alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>


                    <div class="search-field d-none d-md-block">
                        <form class="d-flex align-items-center h-100" action="#">
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <i class="input-group-text border-0 mdi mdi-magnify"></i>
                                </div>
                                <input type="text" class="form-control bg-transparent border-0"
                                    placeholder="Search projects">
                            </div>
                        </form>
                    </div>


                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                                aria-expanded="false">


                                <?php
                                $queryVerify = mysqli_query($conn, "SELECT * FROM users WHERE id = '$userid' ");
                                
                                while($rowVerify = mysqli_fetch_assoc($queryVerify)){
                            ?>

                                <div class="nav-profile-text">
                                    <p class="mb-1 text-black"><?php echo $rowVerify['Uname']; ?></p>
                                </div>
                            </a>
                            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages/password/signout.php">
                                    <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                            </div>
                        </li>
                        <?php } ?>


                        <li class="nav-item dropdown">
                            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                                data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="count-symbol bg-warning"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="messageDropdown">
                                <h6 class="p-3 mb-0">Messages</h6>


                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                                    </div>
                                    <div
                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Bwec send you a
                                            message
                                        </h6>
                                        <p class="text-gray mb-0"> 1 Minutes ago </p>
                                    </div>
                                </a>


                                <div class="dropdown-divider"></div>
                                <h6 class="p-3 mb-0 text-center">No new messages</h6>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>


            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:../../partials/_sidebar.html -->
                <nav class="sidebar sidebar-offcanvas" id="sidebar">



                    <span class="nav-link">
                        <a href="../../index.php"> <button class="btn btn-block btn-lg btn-gradient-secondary mt-4">
                                <- Go back Home</button>
                        </a>
                    </span>

                </nav>



                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="page-header">
                        </div>
                        <div class="row">
                            <div class="col-lg-4 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Your BWEC Profile</h4>

                                        <?php
                                                $sn = 1;
                                                $profileQuery = mysqli_query($conn, "SELECT * FROM users WHERE $userid = id");
                                                    //or die(mysqli_errno($conn));
                                            
                                                while($tableRow = mysqli_fetch_assoc($profileQuery)){
                                        ?>
                                        <hr>
                                        <img src="../../assets/images/faces/face2.jpg"
                                            style="border-radius: 50px; margin-left:25%; border: 2px solid red" alt=""
                                            sizes="" srcset="">
                                        <br><br>
                                        Code ::: <strong>
                                            <?php echo $tableRow['verification_code'];?></strong> <br><br>
                                        Name ::: <strong> <?php echo $tableRow['Uname'];?> </strong> <br><br>
                                        Email ::: <strong><?php echo $tableRow['Uemail'];?></strong> <br><br>
                                        Address ::: <strong><?php echo $tableRow['Uaddress'];?></strong> <br><br>
                                        Talent ::: <strong><?php echo $tableRow['Utalent'];?></strong> <br><br>
                                        Message ::: <strong><?php echo $tableRow['Umessage'];?></strong> <br><br>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                    <footer class="footer">
                        <div class="container-fluid clearfix">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright
                                BWEC
                                &copy;
                                2023 - <?php echo date ("Y"); ?> </span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Developed
                                by <a href="https://wa.link/k5cji9" target="_blank">WEBON
                                </a> </span>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
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
        <!-- Custom js for this page -->
        <!-- End custom js for this page -->
    </body>

</html>