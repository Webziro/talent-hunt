<?php

session_start();
include "../../includes/conn.php";
$myServer="http://localhost/talent-hunt";
if(isset($_POST['email']) && $_POST['noOfVotes']>1 && $_POST['email']!="") {
    //print_r($_POST); die();
    
    $selectedCat=0;
    $dataToInsert=[];
    foreach($_POST as $key=>$value){
        if(is_numeric($key)){
            if($value!==""){
                $selectedCat++;
                $dataToInsert[]=['category'=>$key, 'contestant'=>$value];
                //print_r($dataToInsert); die;
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
    //print_r($_POST); die;

    // Prepare data for the Paystack API request
    $fields = [
        'email' => $_POST['email'], 
        'amount' => $amount_kobo,
        //new
        'currency' => "NGN",
        "initiate_type"=>"inline",
        //new end
        //'reference'=>$dataToInsert[0]['contestant'].'x'.date('dhis'),
        //real
        // 'reference'=>$_POST['chosen_contestant'].'x'.date('dhis'),
        'transaction_ref'=>$_POST['chosen_contestant'].'x'.date('dhis'),
        'callback_url' => $myServer."/votes/process/verifySquad.php",
        // 'metadata' => ["cancel_action" => $myServer."/votes/process/paymentCancelled.php"]
    ];

    // $fields_string = http_build_query($fields);
    $fields_string = json_encode($fields);
    // print_r($fields_string); die();
    // Set up the Paystack API request
    // $url = "https://api.paystack.co/transaction/initialize";
    $url = "https://sandbox-api-d.squadco.com/transaction/initiate";
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer sandbox_sk_ebecd1ec7e45995b1bf0e0c5450f24c823d9d8fb74ce",
        "Cache-Control: no-cache",
    ));
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    
    // Execute the Paystack API request
    $result = curl_exec($ch);
    echo $result; die();
    header('location: '.json_decode($result, true)['data']['authorization_url']);
    
} else {
   $_SESSION['msg']="Please provide Number of Votes and Email";
    header("location:../contestants.php");
}



?>