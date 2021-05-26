<?php
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');

//retrieve values from the form to new variables
$var_id = $_POST["hiddentxt_id"];
$var_matchTitle = $_POST["txt_title"];
$var_venue = $_POST["txt_venue"];
$var_date = $_POST["txt_date"];

$sql = "UPDATE superxi_matches SET matches_Title='".$var_matchTitle."' , matches_Venue = '".$var_venue."', matches_Date = '".$var_date."' WHERE matches_id =".$var_id;




if(mysql_query($sql,$con)) //Whether the data is entered properly
{
 	header("location:viewMatches.php?msg=Data Edited Successfully");
	exit();
}
else
{
	header("location:editMatches.php?msg=Action is Unsuccessful!");
	exit();
}


?>