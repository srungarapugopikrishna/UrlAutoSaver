<?php
include "dbconnection.php";
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$username=$_POST["username"];
$email=$_POST["email"];
$password=$_POST["password"];
$phnum=$_POST["tel"];

//Check Email Already Exists
$emailExist=mysqli_query($con,"SELECT UID FROM registration where Email='".$email."'");

if($row = mysqli_fetch_array($emailExist)){
	echo "This Email-ID is already Registered";
}else{
	$result = mysqli_query($con,"SELECT count(UserID) FROM usercount");
	$row = mysqli_fetch_array($result);
		$USERIDCurr='URLUserNo'.($row[0]+1);
		mysqli_query($con,"INSERT INTO usercount (UserID) VALUES ('$USERIDCurr')");
	 	mysqli_query($con,"INSERT INTO registration (UID,UName,Email,MobileNumber) VALUES ('$USERIDCurr','$username','$email','$phnum')");
	 	mysqli_query($con,"INSERT INTO passwords (UID,Password) VALUES ('$USERIDCurr','$password')");
	 	echo "Deatils Entered Sucessfully";
}
mysqli_close($con);
?> 	