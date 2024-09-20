<?php

session_start();
include "../../includes/conn.php";

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
        //'reference'=>$dataToInsert[0]['contestant'].'x'.date('dhis'),
        'reference'=>$_POST['chosen_contestant'].'x'.date('dhis'),
        'callback_url' => "http://localhost:60/localserver/gm-talent/votes/process/verifyPaystack.php",
        'metadata' => ["cancel_action" => "http://localhost:60/localserver/gm-talent/votes/process/paymentCancelled.php"]
    ];

    $fields_string = http_build_query($fields);
    //print_r($fields_string); die();
    // Set up the Paystack API request
    $url = "https://api.paystack.co/transaction/initialize";
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer sk_test_d720df3d9e71bc57abd87547fe761b736a30f15f",
        "Cache-Control: no-cache",
    ));
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    
    // Execute the Paystack API request
    $result = curl_exec($ch);
    // echo $result; die();
    header('location: '.json_decode($result, true)['data']['authorization_url']);
    
} else {
   $_SESSION['msg']="Please provide Number of Votes and Email";
    header("location:../contestants.php");
}



?>