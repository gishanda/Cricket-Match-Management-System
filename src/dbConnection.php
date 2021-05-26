<?php
error_reporting(1);
session_start();//Let the browser to handle session
$server = "localhost";//Database server
$username = "root";//Username to connect to the server
$password = "";//password to connect to the server
$database = "superxidb";//db need to connect

$con = mysql_connect($server,$username,$password);//connecting to the server<a href="form.php">Untitled Document</a>

if($con)//If successfully connected to the server
{
 	mysql_select_db($database,$con);//connecting to the db
}
else //problem in connection
{
	echo "Not connected";
	exit();
}

?>
