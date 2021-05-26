<?php
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');

//retrieve values from the form to new variables
$var_matchID = $_POST["drp_matches"];
$var_playerID =$_POST["drp_players"];
$var_runs = $_POST["txt_runs"];

$sql = "
INSERT INTO superxi_runs(matches_id,player_id, runs_matchRuns) 
VALUES(".$var_matchID.",".$var_playerID.",".$var_runs.")
";




if(mysql_query($sql,$con)) //Whether the data is entered properly
{
 	header("location:addRuns.php?msg=Data Entered Successfully");
	exit();
}
else
{
	header("location:addRuns.php?msg=Data not inserted. something wrong!!!");
	exit();
}


?>