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
                                // Fetching categories and contestants
                                <?php
                                    $sql = "SELECT c.id AS category_id, u.id AS contestant_id, c.name AS category_name, c.description AS category_description, u.Uname AS contestant_name
                                            FROM categories c
                                            INNER JOIN contestants cn ON c.id = cn.category_id 
                                            INNER JOIN users u ON u.id = cn.contestantId 
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
                                            $contestant_id = $row['contestant_id']; // Make sure to use the correct key for contestant ID
                                            
                                            // Add the contestant to the corresponding category in the array
                                            if (!isset($categories[$category_id])) {
                                                $categories[$category_id] = array(
                                                    'name' => $category_name,
                                                    'description' => $category_description,
                                                    'contestants' => array() // Initialize as an array
                                                );
                                            }
                                            // Store both contestant name and ID
                                            $categories[$category_id]['contestants'][$contestant_id] = $contestant_name;
                                        }

                                        // Display dropdown menu for each category
                                        foreach ($categories as $category_id => $category_data) {
                                            echo '<div class="category">';
                                            echo '<h3 style="color:#b59410;">' . $category_data['name'] . ' Category</h3>';
                                            echo '<p style="color:#fff">' . $category_data['description'] . '</p>'; ?>
                                <select class="custom-select" name="category_<?php echo $category_id; ?>"
                                    id="category_contestants_<?php echo $category_id; ?>"
                                    onChange="updateSelectedContestant(this)">
                                    <option value="">--Select an option--</option>
                                    <?php foreach ($category_data['contestants'] as $contestant_id => $contestant_name): ?>
                                    <option value="<?php echo $contestant_id; ?>"><?php echo $contestant_name; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php
                                            echo '</div>';
                                        }
                                    } else {
                                        echo 'No categories or contestants found.';
                                    }
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
                            <script src="https://checkout.squadco.com/widget/squad.min.js"></script>
                            <!-- <script src="https://checkout.squadco.com/v1/squad.min.js"></script> -->

                            <script>
                            function generateUniqueNumbers(count, min, max) {
                                const uniqueNumbers = new Set();

                                while (uniqueNumbers.size < count) {
                                    const randomNum = Math.floor(Math.random() * (max - min + 1)) + min;
                                    uniqueNumbers.add(randomNum);
                                }

                                return Array.from(uniqueNumbers).join(''); // Join the numbers without commas
                            }

                            function updateSelectedContestant(selectElement) {
                                // Get the selected option value
                                var selectedValue = selectElement.value; // The value of the selected option
                                var selectedText = selectElement.options[selectElement.selectedIndex]
                                .text; // The text of the selected option

                                // Update the hidden input field
                                $('#chosen_contestant').val(selectedValue);

                                // Optionally, you can log the selected value and text to the console
                                console.log("Selected Contestant ID: " + selectedValue);
                                console.log("Selected Contestant Name: " + selectedText);

                                // Show the submit button container if a contestant is selected
                                if (selectedValue !== "") {
                                    $('#submitButtonContainer').show();
                                } else {
                                    $('#submitButtonContainer').hide(); // Hide if no selection
                                }
                            }
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

                                    // Submit the form after a short delay
                                    setTimeout(() => {
                                        // console.log($('#chosen_contestant').val());
                                        $('#categoryForm').submit();
                                        // SquadPay($('#chosen_contestant').val());
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

                            function SquadPay(contestant) {
                                const squadInstance = new squad({
                                    onClose: () => console.log("Widget closed"),
                                    onLoad: () => console.log("Widget loaded successfully"),
                                    onSuccess: () => console.log("Success"),
                                    key: "pk_c0bb9b7dcc0762ce4f7dc472c02e5120d87401b8",
                                    //Change key (test_pk_sample-public-key-1) to the key on your Squad Dashboard
                                    email: document.getElementById("email-address").value,
                                    amount: (document.getElementById("noOfVotes").value * 50) * 100,
                                    transaction_ref: contestant + 'x' + generateUniqueNumbers(10, 0, 99),
                                    //Enter amount in Naira or Dollar (Base value Kobo/cent already multiplied by 100)
                                    currency_code: "NGN",
                                    callback_url: "http://localhost/talent-hunt/votes/process/verifySquad.php"
                                });
                                squadInstance.setup();
                                squadInstance.open();
                            }
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