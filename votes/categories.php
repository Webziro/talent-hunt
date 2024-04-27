<?php
    session_start();
    include "../includes/conn.php";

    // Fetch categories from the database
    $sql = "SELECT id, name, description FROM categories";
    $result = $conn->query($sql);

    $categories = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>BWEC </title>
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

                    <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
                    <h3>Select one Category before Proceding </h3>
                    <p>Select your favorite contestant in one of the categories</p>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " method="post">




                        <?php 
                                if (!empty($categories)): ?>
                        <div class="category-list">
                            <?php foreach ($categories as $category): ?>
                            <div class="category-item">
                                <input type="radio" name="category_id" value="<?php echo $category["id"]; ?>" required>
                                <label><?php echo $category["name"]; ?></label>
                                <a href="#" class="show-description" style="text-decoration: none; color:#bbbb33"
                                    data-description="<?php echo $category["description"]; ?>">
                                    Show Description</a>
                                <div class="description" style="display: none;"><?php echo $category["description"]; ?>
                                    <br><br><br>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php //endif; ?>


                        <div class="mt-3">
                            <button type="submit" id="submitButton"
                                class="btn btn-block btn-secondary btn-lg font-weight-medium auth-form-btn">
                                Pick a Category
                            </button>
                        </div>

                        <?php else: ?>
                        <p style="color: red">Sorry No Category available, check back again.</p>
                        <?php endif; ?>
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
        <script src="../dashboard/assets/js/off-canvas.js"></script>
        <script src="../dashboard/assets/js/hoverable-collapse.js"></script>
        <script src="../dashboard/assets/js/misc.js"></script>
        <!-- endinject -->




        <!--  Hide and Show Description JS  -->
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const showButtons = document.querySelectorAll('.show-description');

            showButtons.forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const description = this.nextElementSibling;
                    if (description.style.display === 'none' || description.style.display ===
                        '') {
                        description.style.display = 'block';
                        this.textContent = 'Hide Description';
                    } else {
                        description.style.display = 'none';
                        this.textContent = 'Show Description';
                    }
                });
            });
        });
        </script>

    </body>



</html>