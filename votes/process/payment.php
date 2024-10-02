<?php

session_start();
include "../../includes/conn.php";
$myServer="https://gospelmusically.com";
if(isset($_POST['email']) && $_POST['noOfVotes']>1 && $_POST['email']!="") {    
    $selectedCat=0;
    $dataToInsert=[];
    foreach($_POST as $key=>$value){
        if(is_numeric($key)){
            if($value!==""){
                $selectedCat++;
                $dataToInsert[]=['category'=>$key, 'contestant'=>$value];
            }
        }
    }
    if($selectedCat>1){
        $_SESSION['msg'] = "You can use you free vote on only one Category";
        header("Location: vote.php");
        exit();
    }
    // Convert amount to kobo (100 kobo = 1 naira)
    $amount_kobo = ($_POST['noOfVotes']*50) * 100;
    



    // API endpoint
    $api_url = "https://api-d.squadco.com/transaction/initiate";
    
    $data = array(
        "amount" => $amount_kobo,
        "email" => $_POST['email'],
        "currency" => "NGN",
        "initiate_type" => "inline",
        "transaction_ref" => $_POST['chosen_contestant'].'x'.date('dhis'),
        "callback_url" => "https://gospelmusically.com/votes/process/verifySquad.php"
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
        // echo $response; die();
        header('location: '.json_decode($response, true)['data']['checkout_url']);
    }

    // Close cURL session
    curl_close($curl);
    
} else {
   $_SESSION['msg']="Please provide Number of Votes and Email";
    header("location:../contestants.php");
}



?>