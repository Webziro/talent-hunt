<?php
session_start();
include "../../../includes/properties.php";
include "../../../includes/conn.php";

if(isset($_SESSION['userid'])){
    $adminid = $_SESSION['userid'];
} else {
    header("location: ../index.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get the user id from the URL parameter
    $userId = $_GET['id'];

    // Fetch the user details from the database
    $query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$userId'");
    
  
    $userDetails = mysqli_fetch_assoc($query);
   
    // Check if the user exists
    if(!$userDetails) {
        $_SESSION['msg'] = "User not found";
        header("location: ../all-contestants.php");
        exit();
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user id from the form data
    $userId = $_POST['userId'];

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $payment = $_POST['payment'];
    $phone = $_POST['phone'];
    $talent = $_POST['talent'];

    // Update user details in the database
    $update_query = "UPDATE users SET Uname=?, Uemail=?, form_payment=?, Uphone=?, Utalent=? WHERE id=?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("sssssi", $name, $email, $payment, $phone, $talent, $userId);

    if($stmt->execute()) {
        $_SESSION['msg'] = "<div style= 'color: green'>User details updated successfully</div>";
        header("location: ../all-contestants.php");
        exit();
    } else {
        $_SESSION['msg'] = "<div style = 'color: red'>Error! Try again</div>";
        // $_SESSION['msg'] = "Error updating user details: " . $stmt->error;
        header("location: edit.php?id=$userId");
        exit();
    }
} else {
    header("location: ../all-contestants.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $title;?></title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../../../assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../../../assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="../../../assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
    </head>

    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth">
                    <div class="row flex-grow">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left p-5">
                                <h3>Edit a Contestants</h3>
                                <div class="brand-logo">
                                    <img src="../../../assets/images/bwec-logo.png" style="padding-right: 68pc;"
                                        height="160px">
                                </div>

                                <?php
                            if(isset($_SESSION['msg'])){
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                            ?>

                                <form id="editForm" method="POST" action="edit.php">
                                    <input type="hidden" name="userId" value="<?php echo $userDetails['id']; ?>">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="<?php echo $userDetails['Uname']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="<?php echo $userDetails['Uemail']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="payment">Purchased Form:</label>
                                        <input type="text" class="form-control" id="payment" name="payment"
                                            value="<?php echo $userDetails['form_payment']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="<?php echo $userDetails['Uphone']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="talent">Talent:</label>
                                        <input type="text" class="form-control" id="talent" name="talent"
                                            value="<?php echo $userDetails['Utalent']; ?>">
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#confirmModal">Update Contestant</button>
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

        <!-- Modal -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmModalLabel">Confirm Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to update this contestant?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" form="editForm" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- plugins:js -->
        <script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="https://js.paystack.co/v1/inline.js"></script>

        <script src="process/buyformscript.js"></script>
        <script src="../../../assets/js/off-canvas.js"></script>
        <script src="../../../assets/js/hoverable-collapse.js"></script>
        <script src="../../../assets/js/misc.js"></script>
        <!-- endinject -->
    </body>

</html>