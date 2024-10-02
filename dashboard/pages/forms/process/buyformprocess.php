<?php
    session_start();
    include "../../../../includes/conn.php";

    // Ensure that $_POST['amount'] is set and numeric
    if(isset($_POST['email']) &&  ($_POST['amount']) && is_numeric($_POST['amount'])) {
        // Convert amount to kobo (100 kobo = 1 naira)
        $amount_kobo = $_POST['amount'] * 100;
   // API endpoint
    $api_url = "https://api-d.squadco.com/transaction/initiate";
    
    $data = array(
        "amount" => $amount_kobo,
        "email" => $_POST['email'],
        "currency" => "NGN",
        "initiate_type" => "inline",
        "transaction_ref" => rand(0,100).date('dhYmis'),
        "callback_url" => "https://gospelmusically.com/dashboard/pages/forms/process/verifySquad.php"
        // "callback_url" => "http://squadco.com"
    );

    // Convert the array to JSON format
    $payload = json_encode($data);

    // Initialize cURL session
    $curl = curl_init($api_url);

    // Set the required options for the POST request
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return the response
    curl_setopt($curl, CURLOPT_POST, true);           // Use POST method
    curl_setopt($curl, CURLOPT_POSTFIELDS, $payload); // Pass the payload

    // Set headers
    $headers = [
        "Content-Type: application/json",             // Set content type to JSON
        "Authorization: Bearer sk_c0bb9b7dcc0762ce3109c51ddd302237b06567d6"     // Authorization header if required
    ];
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    // Execute the API call
    $response = curl_exec($curl);

    // Check for errors
    if (curl_errno($curl)) {
        echo 'Error:' . curl_error($curl);
    } else {
        // print_r($result); die;
        header('location: '.json_decode($response, true)['data']['checkout_url']);
    }
    
} else {
   
    echo json_encode([
        "status" => false,
        "message" => "Invalid amount value",
    ]);
}

?>