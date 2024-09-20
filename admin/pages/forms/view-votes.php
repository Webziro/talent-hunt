<?php
    session_start();
        include "../../includes/properties.php";
        include "../../includes/conn.php";
        if(isset($_SESSION['userid'])){
            $adminid = $_SESSION['userid'];
            $query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$adminid' "); 
            $result = mysqli_fetch_assoc($query);
            

            }else{
                header("location: index.php ");
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
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth">
                    <div class="row flex-grow">
                        <div class="col-lg-10 mx-auto">
                            <div class="auth-form-light text-left p-5">
                                <!-- <div class="brand-logo">
                                    <img src="../../assets/images/bwec-banner.png" style="padding-right: 50pc;"
                                        height="160px">
                                </div> -->

                                <?php
                                        if(isset($_SESSION['msg'])){
                                          echo $_SESSION['msg'];
                                          unset($_SESSION['msg']);
                                        }
                                    ?>



                                <?php                                      
                                        // $queryVotes = mysqli_query($conn, "SELECT * FROM votes ");
                                        $queryVotes = mysqli_query($conn, "SELECT * FROM votes INNER JOIN users ON votes.userId = users.id ");

                                        if(mysqli_num_rows($queryVotes) > 0) { 
                                ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Email</th>
                                                <th>Vote Type</th>
                                                <th>Votes</th>
                                                <th>Voter's Name</th>
                                                <th>Payment Ref</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $count = 1;
                                                    while($rowResults = mysqli_fetch_assoc($queryVotes)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $rowResults['email']; ?></td>
                                                <td><?php echo $rowResults['v_type']; ?></td>
                                                <td><?php echo $rowResults['no_Of_Votes']; ?></td>
                                                <td><?php echo $rowResults['Uname']; ?></td>
                                                <td><?php echo $rowResults['payment_ref']; ?></td>
                                                <td><?php echo $rowResults['date']; ?></td>
                                            </tr>
                                            <?php 
                                        $count++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                        } else {
                                            echo "No votes yet, Invite your fans to vote for you!";
                                        }
                                ?>

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