<?php
include "dbconnection.php";
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$UseridfromCookie=$_COOKIE["UserIDcookie"];
$urlLink=$_POST["urlLink"];
$result = mysqli_query($con,"SELECT count(UniqueUrlID) FROM urldetails");
	$row = mysqli_fetch_array($result);
		$UrlID='URLID'.($row[0]+1);
	 	mysqli_query($con,"INSERT INTO urldetails (UniqueUrlID,UserID,Url) VALUES ('$UrlID','$UseridfromCookie','$urlLink')");
	 	echo "URL Deatils Entered Sucessfully";
	 	header("Location: UserHome.php");
		exit;
mysqli_close($con);
?> 	