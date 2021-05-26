<?php
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');

//retrieve values from the form to new variables
$var_id = $_POST["hiddentxt_id"];
$var_matchID = $_POST["drp_matches"];;
$var_playerID = $_POST["drp_players"];;
$var_wickets = $_POST["txt_wickets"];

$sql = "UPDATE superxi_wickets SET matches_id=".$var_matchID." , player_id = ".$var_playerID.", wickets_matchWickets = ".$var_wickets." WHERE wickets_id =".$var_id;

if(mysql_query($sql,$con)) //Whether the data is entered properly
{
 	header("location:viewWickets.php?msg=Data Edited Successfully");
	exit();
}
else
{
	header("location:addWickets.php?msg=Data not inserted. something wrong!!!");
	exit();
}


?>