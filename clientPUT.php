<?php
include "serverPut.php";
	$email=$_POST['email'];
	$first=$_POST['first'];
	$last=$_POST['last'];
	$mobile=$_POST['phone'];
	$password=$_POST['password'];
	$select= "select * from users where email='$email'";
	$sql = mysqli_query($conn, $select);
	$row = mysqli_fetch_assoc($sql);
	$res=$row['email'];
	if($res === $email)
	{
		$update = "update users set firstName = '$first', lastName = '$last', mobileNumber = '$mobile' where email = '$email' AND password = '$password' ";
		$sql2=mysqli_query($conn, $update);
		if($sql2)
		{
			echo "success";
		}
		else
		{
			echo "Something went wrong, please try again.";
		}
	}
	else
	{
		echo "Something went wrong, plese try again.";
	}

?>