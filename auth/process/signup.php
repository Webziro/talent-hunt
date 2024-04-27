<?php
session_start();
include "../../includes/conn.php";

function generateVerificationCode($length = 2) {
    $prefix = "GMA-";
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomCode = '';
    // Add 5 random numbers
    $randomNumbers = '';
    for ($i = 0; $i < 3; $i++) {
        $randomNumbers .= rand(0, 9);
    }
    for ($i = 0; $i < $length; $i++) {
        $randomCode .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $prefix . $randomNumbers . $randomCode;
}


function password_strength_check($password, $min_len = 8, $max_len = 70, $req_digit = 1, $req_lower = 1, $req_upper = 1, $req_symbol = 1) {
    // Build regex string depending on requirements for the password
    $regex = '/^';
    if ($req_digit == 1) { $regex .= '(?=.*\d)'; }              // Match at least 1 digit
    if ($req_lower == 1) { $regex .= '(?=.*[a-z])'; }           // Match at least 1 lowercase letter
    if ($req_upper == 1) { $regex .= '(?=.*[A-Z])'; }           // Match at least 1 uppercase letter
    if ($req_symbol == 1) { $regex .= '(?=.*[^a-zA-Z\d])'; }    // Match at least 1 character that is none of the above
    $regex .= '.{' . $min_len . ',' . $max_len . '}$/';

    if(preg_match($regex, $password)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['Uname']);
    $email = mysqli_real_escape_string($conn, $_POST['Uemail']);
    $password = mysqli_real_escape_string($conn, $_POST['Upassword']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['UconfrimPassword']);
    $talent = mysqli_real_escape_string($conn, $_POST['Utalent']);
    $message = mysqli_real_escape_string($conn, $_POST['Umessage']);
    // print_r($_POST); die();
    if(empty($name) or empty($email) or empty($password) or empty($confirmPassword) or empty($talent) or empty($message)){
        $_SESSION['msg'] = "<div class='alert alert-danger'>Please fill all fields!</div>";
        header("location:../signup.php");
    }else{
        if(password_strength_check($password) == FALSE){
            $_SESSION['msg'] = "<div class='alert alert-danger'>Your password must contain an uppercase letter, a lowercase letter, a special character, and a number and be between 8 and 70 characters long.</div>";
            header("location:../signup.php");
        }else{
            if($password != $confirmPassword){
                $_SESSION['msg'] = "<div class='alert alert-danger'>Passwords do not match!</div>";
                header("location:../signup.php");
            }else{
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $_SESSION['msg'] = "<div class='alert alert-danger'>Your email is not correct!</div>";
                    header("location:../signup.php");
                }else{
                    $verificationCode = generateVerificationCode(); // Generate verification code
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password

                    $query = mysqli_query($conn, "INSERT INTO users (Uname, Uemail, Upassword, Utalent, Umessage, verification_code) 
                    VALUES ('$name', '$email', '$hashedPassword',  '$talent', '$message', '$verificationCode')");
                    //or die(mysqli_error($conn));
                    if($query){
                        $_SESSION['userid'] = mysqli_insert_id($conn);
                        header("location:../../dashboard/index.php");
                    }else{
                        $_SESSION['msg'] = "<div class='alert alert-danger'>You details are not unique!</div>";
                        header("location:../signup.php");
                    }
                }
            }
        }
    }
}else{
    $_SESSION['msg'] = "<div class='alert alert-danger'>Not Set!</div>";
    header("location:../signup.php");
}
?>