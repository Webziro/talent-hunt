<?php
//   include "session.php";

//     if(isset($_POST['submit'])){
//         $oldPassword = mysqli_real_escape_string($conn, $_POST['currentPassword']);
//         $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
//         $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
//         $loginUserPassword = $result['Upassword'];
//         //print_r($_POST); die();
      
//         if($oldPassword == $loginUserPassword){
//             if($newPassword == $confirmPassword){
//                 $query = mysqli_query($conn, "UPDATE users SET Upassword = '$newPassword' WHERE id = $userid ");
//                 //or die(mysqli_error($conn));
//                 if(mysqli_affected_rows($conn) > 0){
//                 $_SESSION['msg'] = "<div class='alert alert-success'>Successfully Changed Password</div>";
//                 //header("location: ../../../index.php ");
                
//             }else{
//                 $_SESSION['msg'] = "<div class='alert alert-danger'>Failed to Change Password</div>";
//                 //header("location: changepass.php ");

//                 }
//             }else{
//                 $_SESSION['msg'] = "<div class='alert alert-danger'> Password Mismatch!</div>";
//                 //header("location: changepass.php ");

//             }
//         }else{
//             $_SESSION['msg'] = "<div class='alert alert-danger'>Not working!</div>";

//         }
        
        
//     }


// include "session.php"; 

// if(isset($_POST['submit'])){
//     $oldPassword = mysqli_real_escape_string($conn, $_POST['currentPassword']);
//     $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
//     $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
//     print_r($_POST); die;
//     // Fetch the user's current password from the session
//     $loginUserPassword = $result['Upassword'];
    
//     if($oldPassword == $loginUserPassword){
//         if($newPassword == $confirmPassword){
//             // Update the user's password in the database
//             $query = mysqli_query($conn, "UPDATE users SET Upassword = '$newPassword' WHERE id = $userid ") or die(mysqli_errno($conn));
//             if(mysqli_affected_rows($conn) > 0){
//                 $_SESSION['msg'] = "<div class='alert alert-success'>Successfully Changed Password</div>";
//                 header("location: ../../../index.php");
//                 exit();
//             } else {
//                 $_SESSION['msg'] = "<div class='alert alert-danger'>Failed to Change Password</div>";
//                 header("location: ../changepass.php");
//                 exit();
//             }
//         } else {
//             $_SESSION['msg'] = "<div class='alert alert-danger'>Password Mismatch!</div>";
//             header("location: ../changepass.php");
//             exit();
//         }
//     } else {
//         $_SESSION['msg'] = "<div class='alert alert-danger'>Incorrect Old Password!</div>";
//         header("location: ../changepass.php");
//         exit();
//     }
// } else {
//     // Handle case where form is not submitted
//     $_SESSION['msg'] = "<div class='alert alert-danger'>Form Submission Error!</div>";
//     header("location: ../changepass.php");
//     exit();
// }





include "session.php"; 

if(isset($_POST['submit'])){
    $oldPassword = mysqli_real_escape_string($conn, $_POST['currentPassword']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    // Fetch the hashed password of the logged-in user from the database
    $query = mysqli_query($conn, "SELECT Upassword FROM users WHERE id = $userid ");
    $user = mysqli_fetch_assoc($query);
    $hashedPassword = $user['Upassword'];

    // Verify if the provided old password matches the hashed password
    if(password_verify($oldPassword, $hashedPassword)){
        if($newPassword == $confirmPassword){
            // Hash the new password before updating in the database
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the user's password in the database
            $updateQuery = mysqli_query($conn, "UPDATE users SET Upassword = '$hashedNewPassword' WHERE id = $userid ");
            if(mysqli_affected_rows($conn) > 0){
                $_SESSION['msg'] = "<div class='alert alert-success'>Successfully Changed Password</div>";
                header("location: ../../../index.php");
                exit();
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Failed to Change Password</div>";
                header("location: ../changepass.php");
                exit();
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Password Mismatch!</div>";
            header("location: ../changepass.php");
            exit();
        }
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Incorrect Old Password!</div>";
        header("location: ../changepass.php");
        exit();
    }
} else {
    // Handle case where form is not submitted
    $_SESSION['msg'] = "<div class='alert alert-danger'>Form Submission Error!</div>";
    header("location: ../changepass.php");
    exit();
}


?>