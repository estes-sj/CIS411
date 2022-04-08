<?php
session_start();
include "serverPUT.php";

if(isset($_POST['edit']))
{
	$email=$_POST['email'];
	$first=$_POST['first'];
	$last=$_POST['last'];
	$mobile=$_POST['phone'];
	$select= "select * from users where email='$email'";
	$sql = mysqli_query($conn, $select);
	$row = mysqli_fetch_assoc($sql);
	$res=$row['email'];
	if($res === $email)
	{
		$update = "update users set firstName = '$first', lastName = '$last', mobileNumber = '$mobile' where email = '$email'";
		$sql2=mysqli_query($conn, $update);
		if($sql2)
		{
			response(200, "User Inserted",$sql2);
			header('location: Dashboard.html');
		}
		else
		{
			header('location: EditUser.html');
		}
	}
	else
	{
		header('location:EditUser.html');
	}

}
else {
    response(400,"Invalid Request",NULL);
}
function response($status,$status_message,$data) {
    header("HTTP/1.1 ".$status);
    $response['status_message']=$status_message;
    $response['data']=$data;

    $json_response = json_encode($response);
    #echo $json_response;
}
?>