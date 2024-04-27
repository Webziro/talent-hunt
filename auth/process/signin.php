<?php
    session_start();
    include "../../includes/conn.php";
    

    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn, $_POST['Uemail']);
        $password = mysqli_real_escape_string($conn, $_POST['Upassword']); 
        //print_r($_POST['submit']); die;
        //echo $password; die;

        // Hash the password before comparing
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        

        // Prepare and execute the query using prepared statements
        $query = mysqli_prepare($conn, "SELECT * FROM users WHERE Uemail = ?");
        mysqli_stmt_bind_param($query, "s", $email);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
       

        if(mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result); 

            // Verify the hashed password and save the user section in userid == database id
            if(password_verify($password, $user['Upassword'])) {
                $_SESSION['userid'] = $user['id'];
                header("location: ../../dashboard/index.php");
                exit();
            } else {
                $_SESSION['msg'] = "<div style='background-color: white; color: red; padding: 12px'>Incorrect password!</div>";
                header("location: ../../dashboard/index.php");
                exit();
            }
        } else {
            $_SESSION['msg'] = "<div style='background-color: white; color: red; padding: 12px'>No job yourself, your login details are incorrect!</div>";
            header("location: ../../dashboard/index.php");
            exit();
        }
    } else {
        echo "Form not submitted!";
    }

?>