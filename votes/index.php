<?php

//  use function Symfony\Component\String\b;

session_start();
include "../includes/conn.php";
include "../includes/contact-details.php";

// Fetch categories from the database
$sql = "SELECT id, name, description FROM categories";
$result = $conn->query($sql);

$categories = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Fetch contestants for each category
foreach ($categories as &$category) {
    $category_id = $category['id'];
    $contestants_query = "SELECT Uname name, b.id id FROM contestants a JOIN users b ON b.id=a.contestantId WHERE category_id = $category_id";
    $contestants_result = $conn->query($contestants_query);
    $category['contestants'] = array();
    if ($contestants_result->num_rows > 0) {
        while ($contestant_row = $contestants_result->fetch_assoc()) {
            $category['contestants'][] = $contestant_row;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    // print_r($_POST); die();
    $email = $_POST["email"];
    $ip_address = $_SERVER['REMOTE_ADDR'];

    // Validate email format
    if (empty($email) || strlen($email) < 4 ||  !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Please enter a valid email address #128542;</div>";
        header("Location: index.php");
        exit();
    }

    // Check if the email has already voted
    $check_sql = "SELECT COUNT(*) AS count FROM votes WHERE email = ? AND v_type ='Free'";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    $check_row = $check_result->fetch_assoc();
    // print_r($check_row); die;
    if ($check_row["count"] > 0) {
        $_SESSION['msg'] = "<div class='alert alert-danger'>This email already voted #128542;! <br>  <a href='contestants.php'>Click to Buy more votes</a></div>";
        header("Location: index.php");
        exit();
    }

    // Check if the IP address has already voted
    $check_ip_sql = "SELECT COUNT(*) AS count FROM votes WHERE ip_address = ? AND v_type='Free'";
    $check_ip_stmt = $conn->prepare($check_ip_sql);
    $check_ip_stmt->bind_param("s", $ip_address);
    $check_ip_stmt->execute();
    $check_ip_result = $check_ip_stmt->get_result();
    $check_ip_row = $check_ip_result->fetch_assoc();
    if ($check_ip_row["count"] > 0) {
        $_SESSION['msg'] = "<div class='alert alert-danger'>You have exhausted you free votes! &#128542; <br>  <a href='contestants.php'>Click to Buy more votes</a></div>";
        header("Location: index.php");
        exit();
    }

    $selectedCat=0;
    $dataToInsert=[];
    foreach($_POST as $key=>$value){
        if($key!=="email"){
            if ($key !== "email" && is_array($value)) {
                $selectedCat++;
                $dataToInsert[]=['category'=>$key, 'contestant' => $value[0]];
            }
        }
    }
    if($selectedCat>1){
        $_SESSION['msg'] = "<div class='alert alert-danger'>You can use you free vote on only one Category</div>";
        header("Location: index.php");
        exit();
    }

    foreach($dataToInsert as $data){
        $cat=$data['category'];
        $user= $data['contestant'];
        //$insert_vote_sql = "INSERT INTO votes (email, ip_address, no_Of_Votes, categoryId, userId) VALUES (?, ?, 1, '$cat', '$user')";

        $insert_vote_sql = "INSERT INTO votes (email, ip_address, no_Of_Votes, categoryId, userId) VALUES (?, ?, 1, ?, ?)";
        $insert_vote_stmt = $conn->prepare($insert_vote_sql);
        $insert_vote_stmt->bind_param("ssii", $email, $ip_address, $cat, $user);
        
        // Attempt to prepare the SQL statement
        $insert_vote_stmt = $conn->prepare($insert_vote_sql);

        // Check if preparation succeeded
        if ($insert_vote_stmt === false) {
            // Display the SQL error
            // echo "Error in SQL query: " . $conn->error;
            $_SESSION['msg'] = "<div class='alert alert-danger'>Network error! Please try shortly #128542;!</div>";
            exit(); // Exit the script
        }

        // Bind parameters to the prepared statement
        $insert_vote_stmt->bind_param("ss", $email, $ip_address);

        // Execute the prepared statement
        if ($insert_vote_stmt->execute()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Thank you for voting. <a href='contestants.php'>Click to Unlock more Votes</a> &#129303;!</div>";
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Failed to submit your vote. Please try shortly #128542;!</div>";
        }
    }

    // Construct the SQL query
    

    // Redirect the user
    header("Location: index.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo "$header"; ?></title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="shortcut icon" href=../images/gmally-logo.jpeg type=image/x-icon>
        <!-- Layout styles -->

        <!-- Second styles -->
        <link rel="stylesheet" href="second-style.css">


    </head>

    <body>
        <div class="background-container">
            <div class="overlay"></div>
            <div class="form-container">
                <h3 class="text-center text-white">Select a Category</h3>
                <p class="text-center text-white">Select a category and type your email to vote for free here!</p>
                <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
                <!-- HTML form -->


                //new form
                <form action="#" method="POST" id="categoryForm">
                    <?php
                // Display dropdown menu for each category
                foreach ($categories as $category) {
                    echo '<div class="category">';
                    echo '<h3 style="color:#b59410;">' . $category['name'] . '   ' . 'Category' . '</h3>';
                    echo '<p style="color:#fff;">' . $category['description'] . '</p>';
                    echo '<select class="custom-select" name="'.$category['id'].'">';
                    echo '<option value="">--Select an option--</option>';

                    // Display options for each category
                    foreach ($category['contestants'] as $contestant_name) {
                        //echo '<option value="' . $contestant_name['id'] . '">' . $contestant_name['name'] . '</option>';

                        echo '<option value="' . $contestant_name['id'] . '" data-contestant-id="' . $contestant_name['id'] . '">' . $contestant_name['name'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                }
                ?>
                    <div class="form-group">
                        <label for="email"></label>
                        <input type="email" class="form-control" id="email" name="email" required
                            placeholder="Type your Email Address">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Vote</button>
                </form>

            </div>
        </div>



        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    </body>

</html>