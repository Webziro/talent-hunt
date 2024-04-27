<?php
    //Include the session page manually because it is trowing error when using the Include function
include "../../../../includes/conn.php";
    session_start();
    if(isset($_SESSION['userid'])){
        $userid = $_SESSION['userid'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $userid ");
    //  or die(mysqli_errno($conn));
    $result = mysqli_fetch_assoc($query);
    }else{
        header("location:../../../../auth/signin.php ");
    }


    //The edit session function
    if(isset($_GET['e'])){
        $id = $_GET['e'];
        $edit_query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
        if(mysqli_num_rows($edit_query)>0){
            $edit_result = mysqli_fetch_assoc($edit_query);
        }else{
            header("location:../../../index.php");
        }
    }

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $img = mysqli_real_escape_string($conn, $_POST['img']);
        $talent = mysqli_real_escape_string($conn, $_POST['talent']);
        $bio = mysqli_real_escape_string($conn, $_POST['bio']);
        if(empty($name) or empty($email) or empty($phone) or empty($address) or empty($talent) or empty($bio)){

            print_r($_POST); die();
            $msg = "<div class='alert alert-danger'>Please Fill all Field</div>";
        }else{
            //Where Primary ID = ID FROM EDIT PAGE
            $query = mysqli_query($conn, "UPDATE users SET Uname = '$name', Uemail = '$email', Uphone = '$phone', 
            Uaddress = '$address', Uprofile_photo = '$img', Utalent = '$talent', Umessage = '$bio' WHERE id = $userid ");

            if($query){
                $msg = "<div class='alert alert-success'>Successfully Edited Item</div>";
            }else{
                $msg  ="<div class='alert alert-danger'>Could not be Edited now/Password wrong</div>";
            }
        }
        
    }
?>