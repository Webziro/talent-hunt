<?php
    session_start();
    include "../../../../includes/conn.php";

    // Ensure that $_POST['amount'] is set and numeric
    if(isset($_POST['email']) &&  ($_POST['amount']) && is_numeric($_POST['amount'])) {
        // Convert amount to kobo (100 kobo = 1 naira)
        $amount_kobo = $_POST['amount'] * 100;

    // Prepare data for the Paystack API request
    $fields = [
        'email' => $_POST['email'], 
        'amount' => $amount_kobo,
        'callback_url' => "http://localhost:60/localserver/gm-talent/dashboard/pages/forms/process/verifyPaystack.php",
        'metadata' => ["cancel_action" => "http://localhost:60/localserver/gm-talent/dashboard/pages/forms/process/paymentCancelled.php"]
    ];

    $fields_string = http_build_query($fields);

    // Set up the Paystack API request
    $url = "https://api.paystack.co/transaction/initialize";
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer sk_test_a4cdbb8de5b8b01524c387489e4501edd9d60fb6", 
        "Cache-Control: no-cache",
    ));
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    
     // Execute the Paystack API request
    $result = curl_exec($ch);
    
    header('location: '.json_decode($result, true)['data']['authorization_url']);
    
} else {
   
    echo json_encode([
        "status" => false,
        "message" => "Invalid amount value",
    ]);
}

?>