<?php
    session_start();

    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the sign-in page or any other desired location
    header("location: ../../index.php ");
    exit();
?>