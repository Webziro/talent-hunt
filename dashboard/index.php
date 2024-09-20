<?php
    
    include "includes/properties.php";
    include "session.php";
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            <?php echo $title;?>
        </title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">

        <!-- Layout styles -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="assets/images/gmall-logo.jpeg" />
    </head>

    <body>

        <div class="d-flex align-items-center justify-content-between">
            <a href="#"><i class="mdi mdi-home mr-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white mr-0"></i>
            </button>
        </div>
        </div>
        </div>
        </div>
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/gmall-logo.jpeg"
                        height="3000px" width="3000px" alt="logo" /></a>

                <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/gmall-logo.jpeg"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>


                <!-- <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" class="form-control bg-transparent border-0" placeholder="Search ">
                        </div>
                    </form>
                </div> -->


                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="assets/images/faces/face1.jpg" alt="image">
                                <span class="availability-status online"></span>
                            </div>


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
                                </div>
                                <div
                                    class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message
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
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">

                <!-- Aside links -->
                <?php include "includes/aside-links.php"?>
                <!-- Aside links End -->

            </nav>
            <!-- partial -->




            <!--Start Inner Dashboard-->
            <div class="main-panel">
                <div class="content-wrapper">

                    <!--Top Links Start Inner Dashboard-->
                    <?php include "includes/top-links.php"?>
                    <!--Top Links Ends Inner Dashboard-->

                </div>




                <div class="row">
                    <!-- <div class="col-md-7 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="clearfix">
                                    <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                                    <div id="visit-sale-chart-legend"
                                        class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                                </div>
                                <canvas id="visit-sale-chart" class="mt-4"></canvas>
                            </div>
                        </div> -->
                </div>


                <div class="col-md-5 grid-margin stretch-card">
                    <!-- <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Traffic Sources</h4>
                                <canvas id="traffic-chart"></canvas>
                                <div id="traffic-chart-legend"
                                    class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                            </div>
                        </div>
                    </div> -->
                </div>

                <!--end Inner Dashboard-->


                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright GMA
                            &copy;
                            2023 - <?php echo date("Y"); ?></span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Developed by <a
                                href="https://wa.link/k5cji9" target="_blank">WEBON
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
        <script src="assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="assets/vendors/chart.js/Chart.min.js"></script>
        <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="assets/js/off-canvas.js"></script>
        <script src="assets/js/hoverable-collapse.js"></script>
        <script src="assets/js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="assets/js/dashboard.js"></script>
        <script src="assets/js/todolist.js"></script>
        <!-- End custom js for this page -->
    </body>

</html>