<?php
    session_start();

    include "../../../includes/conn.php";
    
    if(isset($_SESSION['userid'])){
        $adminid = $_SESSION['userid'];
        $query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$adminid' "); 
        $result = mysqli_fetch_assoc($query);
    } else {
        header("location: ../../../index.php ");
    }
        
        
//Check if session Id is set
    if(isset($_SESSION['userid'])){
            $adminid = $_SESSION['userid'];
            } else {
            header("location: ../all-contestants.php");
            exit();
            }

    if($_SERVER["REQUEST_METHOD"] == "GET") {
            // Get the user id from the URL parameter
            $userId = $_GET['id'];

            // Delete the user from the database
            $delete_query = mysqli_query($conn, "DELETE FROM users WHERE id = '$userId'");

    if($delete_query) {
            $_SESSION['msg'] = "<div style = 'color:green'>Contestant deleted successfully</div>";
            header("location: ../all-contestants.php");
            exit();
            } else {
            $_SESSION['msg'] = "<div style = 'color:red'>Error deleting contestant</div>";
            header("location: ../all-contestants.php");
            exit();
            }
            } else {
            header("location: ../all-contestants.php");
            exit();
            }   
    ?>