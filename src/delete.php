<?php
include_once('dbConnection.php');
include_once('session_check.php');

$var_form = $_GET["form"];
$sql = "";
if($var_form == "player"){
	$location = "viewPlayer";
		if($_GET["status"]==1){
			$sql = "UPDATE superxi_playerdetails SET player_Status = 0 WHERE player_id =".$_GET["id"];
		}else{
			$sql = "UPDATE superxi_playerdetails SET player_Status = 1 WHERE player_id =".$_GET["id"];	
			}
	}
elseif($var_form == "matches"){
	$location = "viewMatches";
			if($_GET["status"]==1){
			$sql = "UPDATE superxi_matches SET matches_Status = 0 WHERE matches_id =".$_GET["id"];
		}else{
			$sql = "UPDATE superxi_matches SET matches_Status = 1 WHERE matches_id =".$_GET["id"];	
			}
	}
elseif($var_form == "runs"){
	$location = "viewRuns";
	$sql = "DELETE FROM superxi_runs WHERE runs_id =".$_GET["id"];
	}
elseif($var_form == "wickets"){
	$location = "viewWickets";
	$sql = "DELETE FROM superxi_wickets WHERE wickets_id =".$_GET["id"];
	}
elseif($var_form == "user"){
	$location = "viewUser";
		if($_GET["status"]==1){
			$sql = "UPDATE superxi_user SET user_status = 0 WHERE superxi_id =".$_GET["id"];
		}else{
			$sql = "UPDATE superxi_user SET user_status = 1 WHERE superxi_id =".$_GET["id"];	
			}
	}

if(mysql_query($sql))
{
	header("location:".$location.".php?msg= Action is Successful");
	exit();
}
else
{	
	header("location:".$location.".php?msg=Something Wrong!!");
	exit();
}




?>
