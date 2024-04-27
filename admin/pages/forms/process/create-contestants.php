<?php
session_start();
include "../../../includes/conn.php";

if(isset($_SESSION['userid'])){
    $adminid = $_SESSION['userid'];
} else {
    header("location: ../index.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $payment = $_POST['payment'];
    // Hash the password
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $talent = $_POST['talent'];
    $verification_code = $_POST['verification_code'];

    // Validate form fields
    if(empty($name) || empty($email) || empty($password) || empty($talent)) {
        $_SESSION['msg'] = " <div style='color: red'> Please fill in all fields </div>";
        header("location: ../create-contestants.php");
        exit();
    }

    // Insert contestant into database
    $insert_query = "INSERT INTO users (Uname, Uemail, form_payment, Upassword, Utalent, verification_code) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("ssssss", $name, $email, $payment, $password, $talent, $verification_code);

    if($stmt->execute()) {
        $_SESSION['msg'] = "<div style='color:green''>Contestant created successfully</div>";
        header("location: ../create-contestants.php");
        exit();
    } else {
        // $_SESSION['msg'] = "Error creating contestant: " . $conn->error;
        $_SESSION['msg'] = "<div syle='color:red'>Error creating contestant</div>";
        header("location: ../create-contestants.php");
        exit();
    }
} else {
    header("location: ../create-contestants.php");
    exit();
}

?>