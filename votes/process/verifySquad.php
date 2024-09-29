<?php
session_start();
include "../../includes/conn.php";

if (!isset($_GET['reference'])) {
    header("location:../contestants.php");
    exit();
}

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://sandbox-api-d.squadco.com/transaction/verify/" . $_GET['reference'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer sandbox_sk_ebecd1ec7e45995b1bf0e0c5450f24c823d9d8fb74ce",
        "Cache-Control: no-cache",
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    // echo $response; die();
    $resp = json_decode($response, true);
    if (isset($resp['data']['transaction_status']) && $resp['data']['transaction_status'] === "success") {
        $reference = $resp['data']['transaction_ref'];
        //print_r($resp['data']['reference']); die();


        // Extract the contestant ID from the reference number
        $userId=explode("x", $resp['data']['transaction_ref'])[0];
        //print_r($userId); die;
        function getUserIP() {
            // Check if the IP is coming from a shared internet service
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                return $_SERVER['HTTP_CLIENT_IP'];
            }
            // Check if the IP is passed from a proxy
            if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]; // Get the first IP in the list
            }
            // Return the remote IP address
            return $_SERVER['REMOTE_ADDR'];
        }
        $ip = getUserIP();
        $email = $resp['data']['email'];
        $amount = $resp['data']['transaction_amount'] / 100;
        $noOfVotes = $amount / 50;
        $query = mysqli_query($conn, "SELECT Utalent FROM users WHERE id = $userId "); 
        $talent = mysqli_fetch_assoc($query)['Utalent']; 
        //print_r($talent); die;

        // Inserting data into database
        $paymentSql = "INSERT INTO votes (email, ip_address, payment_ref, amount, no_Of_Votes, v_type, categoryId, userId) 
        VALUES ('$email', '$ip', '$reference', '$amount', '$noOfVotes', 'Paid', '$talent', '$userId')";
        //print_r($paymentSql); die;


        // Execute the query
        if ($conn->query($paymentSql) === TRUE) {
            // Redirect to index.php
            $_SESSION['msg'] = "Your Payment was successful"; 
            header("location:../../index.php");
            exit();
        } else {
            // echo $resp['data']['reference'];
            echo "Error: " . $paymentSql . "<br>" . $conn->error;
            //echo "Network Error, Try again shortly!";
        }
    } else {
        echo "Payment Failed!";
    }
}
?>