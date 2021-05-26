<?php 
include_once('dbConnection.php');
$sql = "SELECT * FROM superxi_user WHERE superxi_userName ='".$_POST["txt_username"]."' AND superxi_password = '".md5($_POST["txt_password"])."' AND user_status = 1";


$view = mysql_query($sql);

$num_rows = mysql_num_rows($view); //getting the number of rows we are returning after sql run in the db

$rowuser = mysql_fetch_array($view);//Loading the data to an array


if($num_rows > 0) // If we have a user in the database with the login details entered
{
	//Creating session
	$_SESSION["userid"] = $rowuser["superxi_id"];
	$_SESSION["name"] = $rowuser["superxi_userName"];

	header("location:home.php"); // redirecting the user to the system
	exit();
}
else //user login details are incorrect
{
    header("location:index.php?msg=Incorrect Username or Password");
	exit();
}




?>