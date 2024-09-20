<?php
        include_once "conn.php";
        if(isset($_SESSION['userid'])){
            $adminid = $_SESSION['userid'];
            $query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$adminid' "); 
            $result = mysqli_fetch_assoc($query);
            }else{
                header("location: index.php ");
            }

?>