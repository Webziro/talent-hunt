<?php
session_start();
include "../../includes/conn.php";

if (!isset($_GET['reference'])) {
    header("location:../contestants.php");
    exit();
}


// API endpoint
$api_url ="https://api-d.squadco.com/transaction/verify/".$_GET['reference'];
    
// Initialize cURL session
$curl = curl_init($api_url);

// Set the required options for the GET request
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return the response
curl_setopt($curl, CURLOPT_HTTPGET, true);        // Use GET method

// Set headers
$headers = [
    "Content-Type: application/json",             // Set content type to JSON
    "Authorization: Bearer sk_c0bb9b7dcc0762ce3109c51ddd302237b06567d6"     // Authorization header if required
];
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

// Execute the API call
$response = curl_exec($curl);


if (curl_errno($curl)) {
    echo 'Error:' . curl_error($curl);
} else {
    $resp = json_decode($response, true);
    if (isset($resp['data']['transaction_status']) && $resp['data']['transaction_status'] === "success") {
        $reference = $resp['data']['transaction_ref'];
        $email = $resp['data']['email'];
        $amount = $resp['data']['transaction_amount'] / 100;

        // Inserting data into database
        $paymentSql = "INSERT INTO forms (email, payment_ref, amount) 
        VALUES ('$email', '$reference', '$amount')";
        if ($conn->query($paymentSql) === TRUE) {
            // Redirect to index.php
            header("location:../../../index.php");
            exit();
        } else {
            echo "Error: " . $paymentSql . "<br>" . $conn->error;
            //echo "Network Error, Try again shortly!";
        }
    } else {
        echo "Payment Failed!";
    }
    
// Close cURL session
curl_close($curl);
}
?>