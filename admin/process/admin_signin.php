<?php
// Start the session
session_start();

// Include the database connection file
include "../includes/conn.php";

//Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize the form inputs
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Prepare the SQL statement to fetch user data by email and role (Admin)
    $stmt = mysqli_prepare($conn, "SELECT id, Upassword FROM users WHERE Uemail = ? AND roles = 'Admin'");
    if (!$stmt) {
        // Error preparing the statement
        $_SESSION['msg'] = "<div style='background-color: white; color: red; padding: 12px;'>Database error: " . mysqli_error($conn) . "</div>";
        header("Location: ../index.php");
        exit();
    }

    // Bind the email parameter
    mysqli_stmt_bind_param($stmt, "s", $email);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Fetch the result
    $result = mysqli_stmt_get_result($stmt);
     //print_r($user); die;

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $user = mysqli_fetch_assoc($result);
        
        
        

        // Verify the password using password_verify
        if (password_verify($password, $user['Upassword'])) {
            // Password matches, set user ID in session
            $_SESSION['userid'] = $user['id'];

            // Redirect the user to the dashboard
            header("Location: ../dashboard.php");
            exit();
        } else {
            // Password does not match
            $_SESSION['msg'] = "<div style='background-color: white; color: red; padding: 12px;'>Incorrect password!</div>";
            header("Location: ../index.php");
            exit();
        }
    } else {
        
        $_SESSION['msg'] = "<div style='background-color: white; color: red; padding: 12px;'>Incorrect email or password!</div>";
        header("Location: ../index.php");
        exit();
    }

    // Close the statement and Invalid request method
    mysqli_stmt_close($stmt);
} else {
    
    $_SESSION['msg'] = "<div style='background-color: white; color: red; padding: 12px;'>Invalid request method!</div>";
    header("Location: ../index.php");
    exit();
}





// if (isset($_POST['email'])) {
//     $email = mysqli_real_escape_string($conn, $_POST['email']);
//     $password = mysqli_real_escape_string($conn, $_POST['password']);
//     // print_r($_POST); die;

//     // Prepare the statement
//     $stmt = $conn->prepare("SELECT id, Upassword, roles FROM users WHERE Uemail = ?");
//     // $stmt = $conn->prepare("SELECT * FROM users WHERE Uemail =?");
//     $stmt->bind_param("s", $email);
//     $stmt->execute();

//     // Fetch the result
//     $result = $stmt->get_result();
//         // print_r($result); die;


//     if ($result->num_rows > 0) {
//         // Fetch the user data
//         $user = $result->fetch_assoc();

//         // var_dump($result); die;

//         // Verify the provided password with the stored hashed password
//         if (password_verify($password, $user['Upassword'])) {
//             // Password matches, set user ID in session
//             $_SESSION['userid'] = $user['id'];

//             // Redirect the user based on their role
//             if ($user['roles'] === 'Admin') {
//                 header("Location: ../dashboard.php");
//             } else {
//                 header("Location: ../index.php");
//             }
//             exit;
//         } else {
//             // Password does not match
//             $_SESSION['msg'] = "<div style='background-color: white; color: red; padding: 12px;'>Incorrect email or password!</div>";
//             header("Location: ../index.php");
//             exit;
//         }
//     } else {
//         // No user found with the provided email
//         $_SESSION['msg'] = "<div style='background-color: white; color: red; padding: 12px;'>No user found</div>";
//         header("Location: ../index.php");
//         exit;
//     }

//     // Close the statement
//     $stmt->close();
// } else {
//     // Invalid request method
//     $_SESSION['msg'] = "<div style='background-color: white; color: red; padding: 12px;'>Invalid request method!</div>";
//     header("Location: ../index.php");
//     exit();
// }