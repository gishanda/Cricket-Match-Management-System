<?php
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');

//retrieve values from the form to new variables
$var_id = $_POST["hiddentxt_id"];
$var_matchID = $_POST["drp_matches"];
$var_playerID = $_POST["drp_players"];
$var_runs = $_POST["txt_runs"];

$sql = "UPDATE superxi_runs SET matches_id=".$var_matchID." , player_id = ".$var_playerID.", runs_matchRuns = ".$var_runs." WHERE runs_id =".$var_id;





if(mysql_query($sql,$con)) //Whether the data is entered properly
{
 	header("location:viewRuns.php?msg=Data Edited Successfully&id");
	exit();
}
else
{
	header("location:editRuns.php?msg=Data not inserted. something wrong!!!");
	exit();
}


?>