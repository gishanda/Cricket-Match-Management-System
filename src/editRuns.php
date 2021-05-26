<?php 
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');

$va_Runs = "SELECT R.runs_id AS 'runID',M.matches_id AS 'matchesID', P.player_id AS 'pId', R.runs_matchRuns AS 'runs' FROM superxi_matches AS M INNER JOIN superxi_runs AS R ON R.matches_id = M.matches_id LEFT JOIN superxi_playerdetails AS P ON R.player_id = P.player_id WHERE  R.runs_id =".$_GET["id"];
$sqlRuns = mysql_query($va_Runs);
$rowRuns = mysql_fetch_array($sqlRuns);

$var_Match = "SELECT matches_id, matches_Title FROM superxi_matches ORDER BY matches_id";
$sqlMatch = mysql_query($var_Match);

$var_Player = "SELECT player_id, player_Name  FROM superxi_playerDetails ORDER BY player_id";
$sqlPlayer = mysql_query($var_Player);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SuperXI Players</title>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<?php include_once("links.php");?>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
		<header class="clearfix">
			<div class="wrapper clearfix">
				<a href="home.php" id="logo"><img  src="img/logo.png" alt="SuperXI"></a>
				<!-- Navigator-->
				<?php include_once("navigator.php");?>
			</div>
		</header>

		<!-- MAIN -->
		<div id="main">	
			<div class="wrapper clearfix">
	        	
				<!-- page content -->
	        	<div id="page-content" class="clearfix">
					
					
					
					<!-- fullwidth content -->
					<div class="fullwidth-content">
                    <h2 class="page-heading"><span>EDIT RUNS </span></h2>
						<div align="center">					
                           <form action="editRuns_Action.php" method="POST" enctype="multipart/form-data" name="editRuns" id="editRuns">
                                <table width="500" border="0" cellspacing="2" cellpadding="3">
                                  <tr>
                                    <td width="155">Match</td>
                                    <td width="327"><span id="spryselect1">
                                      <label>
                                        <select name="drp_matches" id="drp_matches">
                                          <?php 
												  while($rowMatch = mysql_fetch_array($sqlMatch)) 
												  {
												?>
                                          <option value="<?php echo $rowMatch["matches_id"]; ?>" 
												<?php if(isset($rowRuns["matchesID"]) && $rowRuns["matchesID"] == $rowMatch["matches_id"]){  ?>  selected="selected" <?php } ?> > <?php echo $rowMatch["matches_Title"]; ?> </option>
                                          <?php } ?>
                                        </select>
                                      </label>
                                    <span class="selectRequiredMsg">Please select an item.</span></span></td>
                                  </tr>
                                  <tr>
                                    <td>Player</td>
                                    <td><span id="spryselect2">
                                      <label>
                                        <select name="drp_players" id="drp_players">
                                          <?php 
												  while($rowPlayer = mysql_fetch_array($sqlPlayer)) 
												  {
												?>
                                          <option value="<?php echo $rowPlayer["player_id"]; ?>" 
												<?php if(isset($rowRuns["pId"]) && $rowRuns["pId"] == $rowPlayer["player_id"]){  ?>  selected="selected" <?php } ?> > <?php echo $rowPlayer["player_Name"]; ?> </option>
                                          <?php } ?>
                                        </select>
                                      </label>
                                    <span class="selectRequiredMsg">Please select an item.</span></span></td>
                                  </tr>
                                  <tr>
                                    <td>Runs</td>
                                    <td><span id="sprytextfield1">
                                      <label>
                                        <input type="text" name="txt_runs" id="txt_runs" value="<?php echo $rowRuns["runs"];  ?>" />
                                      </label>
                                    <span class="textfieldRequiredMsg">Runs is required.</span></span></td>
                                  </tr>
                                   <tr>
                                    <td>
                                    <label> 
                                    	<input type="hidden" name="hiddentxt_id" id="hiddentxt_id" value="<?php echo $rowRuns["runID"]; ?>" />
                                    </label>
                                    </td>
                                    <td><label>
                                    <input type="submit" name="submit" id="submit" value="Submit" />
                                    <?php
                                    if(isset($_GET["msg"]))//If the msg is coming via URL
                                    {
                                    echo $_GET["msg"];
                                    }
                                    ?></label></td>
                                  </tr>
                                </table>
                        </form>
</div>			
					</div>
					<!-- ends fullwidth content -->
				</div>	        	
	        	<!--  page content-->
			</div>
		</div>
		<!-- ENDS MAIN -->
		<footer>
        	<div class="footer-bottom">
				  <div class="left">Created by <a>Gishanda Prabath</a></div>
					<div class="right">
					</div>
			</div>
		</footer>
					
    <script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
    </script>
</body>
	
</html>