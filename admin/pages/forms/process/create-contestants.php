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
    $talent_name = $_POST['talent']; // Retrieve talent name from form

    // Validate form fields
    if(empty($name) || empty($email) || empty($password) || empty($talent_name)) {
        $_SESSION['msg'] = "<div style='color: red'>Please fill in all fields</div>";
        header("location: ../create-contestants.php");
        exit();
    }

    // Retrieve talent ID based on talent name
    $talent_query = "SELECT id FROM categories WHERE name = ?";
    $stmt_talent = $conn->prepare($talent_query);
    $stmt_talent->bind_param("s", $talent_name);
    $stmt_talent->execute();
    $result_talent = $stmt_talent->get_result();

    if($result_talent->num_rows > 0) {
        $row_talent = $result_talent->fetch_assoc();
        $talent_id = $row_talent['id'];

        // Insert contestant into database
        $insert_query = "INSERT INTO users (Uname, Uemail, form_payment, Upassword, Utalent, terms, verification_code) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("sssssss", $name, $email, $payment, $password, $talent_id, $_POST['terms'], $_POST['verification_code']);

        if($stmt->execute()) {
            $_SESSION['msg'] = "<div style='color:green'>Contestant created successfully</div>";
            header("location: ../create-contestants.php");
            exit();
        } else {
            $_SESSION['msg'] = "Error creating contestant: " . $conn->error;
            header("location: ../create-contestants.php");
            exit();
        }
    } else {
        $_SESSION['msg'] = "Error creating contestant: Talent not found";
        header("location: ../create-contestants.php");
        exit();
    }
} else {
    header("location: ../create-contestants.php");
    exit();
}
?>