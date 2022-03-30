<?php

$url = "http://localhost/CIS411/webservices/serverDELETE.php;


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer My_API_TOKEN'));
$response=curl_exec($ch);
$result = json_decode($response);
if($result->status==200){
    echo"$result->status. Data successfully deleted from the server DB.";
}else{
    echo $result->status_message;
}
?>
