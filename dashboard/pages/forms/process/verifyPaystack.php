<?php
session_start();
include "../../../../includes/conn.php";

if (!isset($_GET['reference'])) {
    header("location:../buyform.php");
    exit();
}

$curl = curl_init();

curl_setopt_array($curl, array(
    // CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $_GET['reference'],
    CURLOPT_URL => "https://sandbox-api-d.squadco.com/transaction/verify" . $_GET['reference'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        // "Authorization: Bearer sk_test_a4cdbb8de5b8b01524c387489e4501edd9d60fb6",
        "Authorization: Bearer sandbox_sk_94f2b798466408ef4d19e848ee1a4d1a3e93f104046f",
        "Cache-Control: no-cache",
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
//print_r($response); die();
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $resp = json_decode($response, true);
    if ($resp['data']['status'] === "success") {
        $reference = $resp['data']['reference'];
        $email = $resp['data']['customer']['email'];
        $amount = $resp['data']['amount'] / 100;

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
}
?>