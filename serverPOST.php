<?php

$data = json_decode(file_get_contents('php://input'), true);

$firstName=$_REQUEST['firstName'];
$lastName=$_REQUEST['lastName'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$mobileNumber=$_REQUEST['mobileNumber'];

//Data access
$servername = "localhost";
$dbname = "bargain_bites";
$dbusername = "root";
$dbpassword = "";
// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

#$sql = "insert into users set password=$password, firstName=$firstName, lastName=$lastName,email=$email,firstName=$firstName" ;
#$sql = "insert into users set password=" . $password . ", firstName=" . $firstName . ", lastName=" . $lastName . ", email=" . $email . ", mobileNumber=" . $mobileNumber . "";
#$sql = INSERT INTO 'users'('id', 'firstName', 'lastName', 'email', 'password', 'mobileNumber') VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
#$sql = "INSERT INTO users (id, firstName, lastName, email, password, mobileNumber) VALUES (NULL, '$firstname', '$lastName', '$email', '$password', '$mobileNumber')";
$sql = "INSERT INTO users (id, firstName, lastName, email, password, mobileNumber) VALUES (NULL, 'asdfasdfasdf', 'asdfasdfas', 'sdfaasdf', 'asdfad', 'asdfasdf')";
//echo $sql; exit; //debug query
$result = $conn->query($sql);
if($result)//successfully inserted
{
    response(201, "User Inserted",$result);
} else{
    response(400,"User not inserted",$result);
}
function response($status,$status_message,$data) {
    header("HTTP/1.1 ".$status);
    $response['status_message']=$status_message;
    $response['data']=$data;

    $json_response = json_encode($response);
    echo $json_response;
}

?>