<?php
    session_start();
        include "../../includes/properties.php";
    include "../../../includes/conn.php";
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
                        <div class="col-lg-6 mx-auto">
                            <div class="auth-form-light text-left p-5">
                                <div class="brand-logo">
                                    <img src="../../assets/images/gmall-logo.jpeg" style="padding-right: 50pc;"
                                        height="160px">
                                </div>




                                <?php
                                        if(isset($_SESSION['msg'])){
                                          echo $_SESSION['msg'];
                                          unset($_SESSION['msg']);
                                        }
                                    ?>



                                <?php                                      
                                        $queryContact = mysqli_query($conn, "SELECT * FROM contact_us ");

                                        if(mysqli_num_rows($queryContact) > 0) { 
                                ?>


                                <div class="container">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Name</th>
                                                    <th>Number</th>
                                                    <th>Message</th>
                                                    <th>Subject of Votes</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    $count = 1;
                                                    while ($contactResult = mysqli_fetch_assoc($queryContact)) {
                                                ?>

                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $contactResult['Uname']; ?></td>
                                                    <td><?php echo $contactResult['number']; ?></td>
                                                    <td>
                                                        <?php
                                                            // Retrieve the message from the database
                                                            $message = $contactResult['Umessage'];

                                                            // Split the message into an array of words
                                                            $words = explode(' ', $message);

                                                            // Initialize an array to hold lines of 3 words each
                                                            $lines = [];
                                                            
                                                            // Loop through the words array in chunks of 3 words
                                                            for ($i = 0; $i < count($words); $i += 3) {
                                                                // Get a chunk of 3 words
                                                                $chunk = array_slice($words, $i, 3);
                                                                // Join the chunk of 3 words with a space
                                                                $line = implode(' ', $chunk);
                                                                // Add the line to the lines array
                                                                $lines[] = $line;
                                                            }
                                                            
                                                            // Join the lines with a <br> tag
                                                            echo implode('<br>', $lines);
                                                        ?>
                                                    </td>
                                                    <td><?php echo $contactResult['Usubject']; ?></td>
                                                    <td><?php echo $contactResult['created_at']; ?></td>
                                                </tr>

                                                <?php
                                                    $count++;
                                                    }
                                            ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>



                                <?php
                                        } else {
                                            echo "No Messages sent yet!";
                                        }
                                ?>

                                <!-- container-scroller -->
                                <!-- plugins:js -->
                                <script src=" ../../assets/vendors/js/vendor.bundle.base.js">
                                </script>
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