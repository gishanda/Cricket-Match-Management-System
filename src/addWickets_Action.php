<?php
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');

//retrieve values from the form to new variables
$var_matchID = $_POST["drp_matches"];;
$var_playerID = $_POST["drp_players"];;
$var_wickets = $_POST["txt_wickets"];

$sql = "
INSERT INTO superxi_wickets(matches_id, player_id, wickets_matchWickets) 
VALUES(".$var_matchID.",".$var_playerID.",".$var_wickets.")";

if(mysql_query($sql,$con)) //Whether the data is entered properly
{
 	header("location:addWickets.php?msg=Data Entered Successfully");
	exit();
}
else
{
	header("location:addWickets.php?msg=Data not inserted. something wrong!!!");
	exit();
}


?>