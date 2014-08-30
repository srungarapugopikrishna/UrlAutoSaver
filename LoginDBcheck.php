<?php
include "dbconnection.php";
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$email=$_POST["email"];
$password=$_POST["password"];

//Check Email Already Exists
$emailExist=mysqli_query($con,"SELECT UID FROM registration where Email='".$email."'");

if($row = mysqli_fetch_array($emailExist)){
	$userIDtoCookie=$row[0];
	$result = mysqli_query($con,"SELECT password FROM passwords where UID='".$row[0]."'");
	$row = mysqli_fetch_array($result);
	//echo "$row[0]";
		if($row[0]==$password){
			echo "logged in";
			$expire=time()+60*60*24*30;
			setcookie("UserIDcookie",$userIDtoCookie,$expire);
			header("Location: UserHome.php");
			exit;
		}
		else{
			echo "enter correct password";
		}
	}
	else{
		echo "This Email-ID is not Registered";
	}
mysqli_close($con);
?> 	