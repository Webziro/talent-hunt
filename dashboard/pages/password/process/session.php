<?php
include "conn.php";
    session_start();
    if(isset($_SESSION['userid'])){
        $userid = $_SESSION['userid'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $userid ");
    //  or die(mysqli_errno($conn));
    $result = mysqli_fetch_assoc($query);
    }else{
        header("location:../auth/signin.php ");
    }
?>