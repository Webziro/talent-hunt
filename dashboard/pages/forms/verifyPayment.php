<?php
session_start();
    include "../../../includes/conn.php";
    if(isset($_SESSION['userid'])){
        $userid = $_SESSION['userid'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $userid ");
    //  or die(mysqli_errno($conn));
    $result = mysqli_fetch_assoc($query);
    }else{
        header("location:../auth/signin.php ");
    }
// print_r($result); die();
if(!isset($_GET['ref']) or $_GET['ref']==""){
  header("location:../../");
}
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$_GET['ref'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_d720df3d9e71bc57abd87547fe761b736a30f15f",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $resp=json_decode($response, true);
    if($resp['data']['status']=="success"){
        $talent=$result['Utalent'];
        $userId=$result['id'];

        $paymentQuery = mysqli_query($conn, "INSERT INTO contestants (category_id, contestantId) VALUES('$talent', '$userId')");
          
        if($paymentQuery){
            $_SESSION['msg'] = "Your Payment was successful"; 
            header("location: ../../"); 
        }else{
            $_SESSION['msg'] = "Your Payment was successful, but failed to insert record. Transaction ID: ".$_GET['ref']; 
            header("location: ../../");
        }
        
    }else{
        echo "Payment Failed";
    }
    
}