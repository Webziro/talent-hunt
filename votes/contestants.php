<?php
session_start();
include "../includes/conn.php";
include "../includes/contact-details.php";
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            <? echo $header;?>
        </title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="shortcut icon" href=../images/gmally-logo.jpeg type=image/x-icon>
        <!-- Layout styles -->

        <!-- Layout styles -->
        <link rel="stylesheet" href="second-style.css">

    </head>

    <body>

        <body>


            <div class="background-container">
                <div class="form-container">
                    <div class="overlay"></div>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-10 col-md-6">
                            <h3>Select a Category </h3>

                            <p>Chose your favorite contestant to vote for. You can select more than one category </p>
                            <p> *Each Vote Cost &#8358;50 *You need an Email to Vote</p>


                            <!-- HTML form -->
                            <form action="process/payment.php" method="POST" id="categoryForm">
                                <?php 
                    // Perform SQL query to fetch categories and contestants
                    $sql = "SELECT c.id AS category_id, u.id id, c.name AS category_name, c.description AS category_description, u.Uname AS contestant_name
                            FROM categories c
                            INNER JOIN contestants cn ON c.id = cn.category_id join users u on u.id=cn.contestantId 
                            ORDER BY u.Uname";
                    $result = $conn->query($sql);

                    // Check if there are any categories and contestants
                    if (!empty($result) && $result->num_rows > 0) {
                        // Initialize an array to store categories and contestants
                        $categories = array();

                        // Loop through the result set and store categories and contestants in the array
                        while ($row = $result->fetch_assoc()) {
                            $category_id = $row['category_id'];
                            $category_name = $row['category_name'];
                            $category_description = $row['category_description'];
                            $contestant_name = $row['contestant_name'];
                            $contestant_id=$row['id'];
                            
                            // Add the contestant name to the corresponding category in the array
                            if (!isset($categories[$category_id])) {
                                $categories[$category_id] = array(
                                    'name' => $category_name,
                                    'description' => $category_description,
                                    'contestants' => array($contestant_name)
                                );
                            } else {
                                $categories[$category_id]['contestants'][] = $contestant_name;
                            }
                        }
// print_r($categories); die();
                        // Display dropdown menu for each category
                        foreach ($categories as $category_id => $category_data) {
                            echo '<div class="category">';
                            echo '<h3 style="color:#b59410;">' . $category_data['name'] . '   ' . 'Category' .'</h3>';
                            echo '<p style="color:#fff">' . $category_data['description'] . '</p>';
                            echo '<select class="custom-select" name="' . $category_id . '" id="category_contestants_' . $category_id . '">';
                            echo '<option value="">--Select an option--</option>'; 
                            foreach ($category_data['contestants'] as $contestant_name) {
                                // echo '<option value= "' . $contestant_id . '">' . $contestant_name . '</option>';
                                echo '<option value="' . $contestant_id . '" data-contestant-id="' . $contestant_id . '">' . $contestant_name . '</option>';

                            }
                            echo '</select>';
                            echo '</div>';
                        }
                    } else {
                        echo 'No categories or contestants found.';
                    }



// Display dropdown menu for each category
                    ?>
                                <!-- Hidden input fields to store chosen category and contestant -->
                                <input type="hidden" name="chosen_contestant" id="chosen_contestant">

                                <div class="form-group mt-5">
                                    <label for="noOfVotes">No of Votes</label>
                                    <input type="number" class="form-control" id="noOfVotes" name="noOfVotes" required
                                        value="0">
                                </div>

                                <div class="form-group">
                                    <label for="email"></label>
                                    <input type="email" class="form-control" id="email-address" name="email" required
                                        placeholder="Type your Email Address">
                                </div>


                                <!-- Submit button container -->
                                <div id="submitButtonContainer" style="display: none;">
                                    <button type="button" id="submitButton"
                                        class="btn btn-block btn-secondary btn-lg font-weight-medium auth-form-btn">
                                        Proceed to Payment
                                    </button>

                                </div>
                            </form>

                            <!-- jQuery -->
                            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                            <!-- Bootstrap JS -->
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">
                            </script>

                            <script>
                            // Keep track of the previously selected element
                            let previouslySelectedElement = null;

                            // Show submit button when a category is selected
                            $('select').change(function() {
                                // Enable all select elements when a new selection is made
                                $('select').prop('disabled', false);

                                // Check if the current select element has a value
                                if ($(this).val() !== "") {
                                    // Disable all other select elements
                                    $('select').not(this).prop('disabled', true);

                                    // Update the previously selected element
                                    previouslySelectedElement = this;
                                }

                                // Show the submit button container
                                $('#submitButtonContainer').show();
                            });

                            // Update the hidden input field when the email address is typed
                            // $('#email-address').keyup(function() {
                            //     var contestant = $('select option:selected').data('contestant-id');
                            //     $('#chosen_contestant').val(contestant);
                            // });

                            var contestant = $('select option:selected').data('contestant-id');
                            console.log(contestant);
                            $('#chosen_contestant').val(contestant);

                            // Function to confirm selection and submit the form
                            $('#submitButton').click(function() {
                                // Confirm the action with the user
                                var confirmation = confirm('Are you sure you want to proceed to payment?');
                                if (confirmation) {
                                    // Get the chosen contestant from the currently selected option
                                    var contestant = $('select option:selected').val();

                                    // Update the hidden input field with the chosen contestant value
                                    $('#chosen_contestant').val(contestant);

                                    // Submit the form after a short delay
                                    setTimeout(() => {
                                        $('#categoryForm').submit();
                                    }, 1000);
                                }
                            });


                            // const currentURL = new URL(window.location.href);

                            // // Get the search parameters from the URL
                            // const searchParams = currentURL.searchParams;

                            // // Get the value of a specific parameter, for example, 'paramName'
                            // const user = searchParams.get('c_id');
                            // const cat = searchParams.get('cat_id');
                            // if (user !== null && cat !== null) {
                            //     $('#category_contestants_' + cat).val(user);
                            //     $('#chosen_contestant').val(user);
                            //     $('#submitButtonContainer').show();
                            // }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        <script src="
                            https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js
                            "></script>
        <link href="
                            https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css
                            " rel="stylesheet">
        <?php if(isset($_SESSION['msg'])){ ?>
        <script>
        Swal.fire({
            // title: "Good job!",
            text: "<?= $_SESSION['msg'] ?>",
            icon: "success"
        });
        </script>
        <?php unset($_SESSION['msg']); } ?>

</html>