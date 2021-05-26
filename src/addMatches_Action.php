<?php
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');

//retrieve values from the form to new variables
$var_matchTitle = $_POST["txt_title"];
$var_venue = $_POST["txt_venue"];
$var_date = $_POST["txt_date"];

$sql = "INSERT INTO superxi_matches( matches_Title, matches_Venue, matches_Date) VALUES ('".$var_matchTitle."','".$var_venue."','".$var_date."')";




if(mysql_query($sql,$con)) //Whether the data is entered properly
{
 	header("location:addMatches.php?msg=Data Entered Successfully");
	exit();
}
else
{
	header("location:addMatches.php?msg=Data not inserted. something wrong!!!");
	exit();
}


?>