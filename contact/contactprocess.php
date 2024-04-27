<?php
session_start();
include "../includes/conn.php";

if(isset($_POST['submit'])){
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['number']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    if(empty($name) || empty($phone) || empty($subject) || empty($message)){
        $_SESSION['message'] = "<div style='background-color: red; color: white; padding: 20px;'> Please fill all fields before proceeding</div>";
        header("Location: index.php");
        exit(); // Add exit to stop executing the script further
    }else{
        // Using prepared statement to prevent SQL injection
        $query = mysqli_prepare($conn, "INSERT INTO contact_us (Uname, number, Usubject, Umessage) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($query, 'ssss', $name, $phone, $subject, $message);
        
        if(mysqli_stmt_execute($query)){
            $_SESSION['message'] = "<div style='background-color: green; color: white; padding:20px;'>Your message has been successfully submitted. </div>";
            header("Location: index.php");
            exit();
        }else{
            $_SESSION['message'] = "<div style='background-color: red; color: white; padding:20px;'>There was an error processing your form</div>";
            header("Location: index.php");
            exit();
        }
    }
}else{
    $_SESSION['message'] = "<div style='background-color: red; color: white; padding:20px;'>What is happening</div>";
    header("Location: index.php");
    exit();
}
?>