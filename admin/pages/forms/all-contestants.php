<?php
session_start();
include "../../includes/properties.php";
include "../../includes/conn.php";

if(isset($_SESSION['userid'])){
    $adminid = $_SESSION['userid'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$adminid' "); 
    $result = mysqli_fetch_assoc($query);
} else {
    header("location: index.php ");
}

// Fetch users data
$queryusers = mysqli_query($conn, "SELECT * FROM users");

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $title;?></title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
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
                        <div class="col-lg-10 mx-auto">
                            <div class="auth-form-light text-left p-3 p-md-5">
                                <div class="brand-logo">
                                    <img src="../../assets/images/bwec-banner.png" height="160px" class="img-fluid"
                                        alt="Brand Logo">
                                </div>
                                <?php
                            if(isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            } 
                            ?>
                                <?php                                      
                            if(mysqli_num_rows($queryusers) > 0) { ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Purchased Form</th>
                                                <th>Phone</th>
                                                <th>Talent</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $count = 1;
                                        while($rowResults = mysqli_fetch_assoc($queryusers)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $rowResults['Uname']; ?></td>
                                                <td><?php echo $rowResults['Uemail']; ?></td>
                                                <td><?php echo $rowResults['form_payment']; ?></td>
                                                <td><?php echo $rowResults['Uphone']; ?></td>
                                                <td><?php echo $rowResults['Utalent']; ?></td>
                                                <td>
                                                    <!-- Edit button -->
                                                    <a href="process/edit.php?id=<?php echo $rowResults['id']; ?>"
                                                        class="btn btn-primary">Edit</a>

                                                    <!-- Delete button with modal popup -->
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal<?php echo $rowResults['id']; ?>">Delete</button>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal<?php echo $rowResults['id']; ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirm
                                                                Deletion</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete the contestant
                                                            "<?php echo $rowResults['Uname']; ?>"?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <a href="process/delete.php?id=<?php echo $rowResults['id']; ?>"
                                                                class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                        $count++; 
                                    } 
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                            } else {
                                echo "No Contestants yet!!";
                            }
                            ?>
                                <!-- Add buttons at the end of the page -->
                                <div class="text-center mt-4">
                                    <!-- Download button -->
                                    <!-- <a href="http://localhost:60/localserver/gm-talent/admin/pages/forms/all-contestants.pdf"
                                        download>
                                        <button class="btn btn-warning">Download</button>
                                    </a> -->

                                    <!-- Print button -->
                                    <button class="btn btn-warning" onclick="window.print()">Print</button>
                                </div>

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
        <!-- inject:js -->
        <script src="https://js.paystack.co/v1/inline.js"></script>
        <script src="process/buyformscript.js"></script>
        <script src="../../assets/js/off-canvas.js"></script>
        <script src="../../assets/js/hoverable-collapse.js"></script>
        <script src="../../assets/js/misc.js"></script>
        <!-- endinject -->
    </body>

</html>