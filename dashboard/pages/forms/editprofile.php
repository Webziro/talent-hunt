<?php

    //Include the session page manually because it is trowing error when using the Include function
    include "../../../includes/conn.php";
    include "../../../includes/contact-details.php";

    session_start();
    if(isset($_SESSION['userid'])){
        $userid = $_SESSION['userid'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $userid ");
    // print_r($query) or die(mysqli_errno($conn));
    $result = mysqli_fetch_assoc($query);
    }else{
        header("location:../../../../auth/signin.php ");
    }
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
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="../../index.php"><img
                            src="../../assets/images/gmall-logo.jpeg" alt="logo" /></a>


                    <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/gmall-logo.jpeg"
                            alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>




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
                                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">GMALLY sent you a
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



                    <!-- Aside links -->


                    <span class="nav-link">
                        <a href="../../index.php"> <button class="btn btn-block btn-lg btn-gradient-secondary mt-4">
                                <- Go back Home</button>
                        </a>
                    </span>
                    <!-- Aside links End -->

                </nav>


                <!-- The edit session function -->
                <?   
              

                    if(isset($_POST['name'])){
                        $name = mysqli_real_escape_string($conn, $_POST['name']);
                        $email = mysqli_real_escape_string($conn, $_POST['email']);
                        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
                        $address = mysqli_real_escape_string($conn, $_POST['address']);
                        $img = mysqli_real_escape_string($conn, $_POST['img']);
                        $talent = mysqli_real_escape_string($conn, $_POST['talent']);
                        $bio = mysqli_real_escape_string($conn, $_POST['bio']);

                        // print_r($_POST); die(mysqli_errno($conn));
                    
                            //Where Primary ID = ID FROM EDIT PAGE
                            $query = mysqli_query($conn, "UPDATE users SET Uname = '$name', Uemail = '$email', Uphone = '$phone', 
                            Uaddress = '$address', Uprofile_photo = '$img', Utalent = '$talent', Umessage = '$bio' WHERE id = $userid ");
                             //print_r($query); die(mysqli_errno($conn));

                            if($query){

                                $affected_rows = mysqli_affected_rows($conn);

                                if ($affected_rows > 0) {
                                        $_SESSION['msg'] = "<div class='alert alert-success'>Successfully Edited Item</div>";
                                         //header("location:../../index.php");

                                        } else {
                                        // Update executed but no rows affected (possibly the data was the same as existing data)
                                        $_SESSION['msg'] = "<div class='alert alert-warning'>No changes made to previous record.</div>";
                                        
                                    }

                                }else{
                                    $_SESSION['msg']  ="<div class='alert alert-danger'>Could not be Edited now/Password wrong</div>";
                                }


                            }?>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="page-header">
                        </div>

                        <?php
                             if(isset($_SESSION['msg'])){
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                             }   
                        
                        ?>
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Edit Your Profile</h4>
                                        <!-- <p class="card-description"> Basic form elements </p> -->
                                        <form class="forms-sample" method="POST" action="#">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Name</label>
                                                <input type="text" class="form-control" name="name" id=""
                                                    value="<?php echo $result['Uname']; ?>" placeholder="Name">

                                            </div>


                                            <div class="form-group">
                                                <label for="exampleInputEmail3">Email address</label>
                                                <input type="email" class="form-control" name="email"
                                                    id="exampleInputEmail3" value="<?php echo $result['Uemail'];?>"
                                                    placeholder="Email">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail3">Phone Number</label>
                                                <input type="text" class="form-control" name="phone"
                                                    id="exampleInputEmail3" value="<?php echo $result['Uphone'] ;?>"
                                                    placeholder="Phone Number">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail3"> Address</label>
                                                <input type="text" class="form-control" name="address"
                                                    id="exampleInputEmail3" value="<?php echo $result['Uaddress'];?>"
                                                    placeholder="Address">
                                            </div>

                                            <div class="form-group">
                                                <label>Profile Picture </label>
                                                <input type="file" name="img" class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled
                                                        placeholder="Upload Image">
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-gradient-secondary"
                                                            type="button">Upload</button>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputCity1">Talent (Not Editable)</label>
                                                <input type="hidden" class="form-control" name="talent"
                                                    value="<?php echo $result['Utalent'];?>" id="exampleInputCity1"
                                                    placeholder="Location">
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleTextarea1">Bio</label>
                                                <textarea class="form-control" name="bio" id="exampleTextarea1"
                                                    value="<?php echo $result['Umessage'];?>" rows="4"></textarea>
                                            </div>


                                            <button type="submit" name="submit"
                                                class="btn btn-gradient-secondary mr-2">Submit
                                            </button>

                                            <button class="btn btn-light">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <footer class="footer">
                                <div class="container-fluid clearfix">
                                    <span
                                        class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright
                                        <? echo $client_name;?>
                                        &copy;
                                        2023 - <?php echo date ("Y");?>
                                    </span>
                                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Developed
                                        by <a href="https://wa.link/k5cji9" target="_blank">
                                            <? echo $company_name?>
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
                <script src="../../assets/js/file-upload.js"></script>
                <!-- End custom js for this page -->
    </body>

</html>