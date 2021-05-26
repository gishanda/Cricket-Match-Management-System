<?php 
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');

$var_Match = "SELECT matches_id, matches_Title FROM superxi_matches WHERE matches_Status = 1 ORDER BY matches_id ";
$sqlMatch = mysql_query($var_Match);

$var_Player = "SELECT player_id, player_Name  FROM superxi_playerDetails WHERE player_Status = 1 ORDER BY player_id";
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
                    <h2 class="page-heading"><span>ADD RUNS</span></h2>
						<div align="center">					
                            <form action="addRuns_Action.php" method="POST" enctype="multipart/form-data" name="addRuns" id="addRuns">
                                <table width="500" border="0" cellspacing="2" cellpadding="3">
                                  <tr>
                                    <td width="155">Match</td>
                                    <td width="327"><span id="spryselect1">
                                      <label>
                                        <select name="drp_matches" id="drp_matches">
                                          <option value="" selected="selected" >----Select----</option>
                                          <?php 
												  while($rowMatch = mysql_fetch_array($sqlMatch)) 
												  {
  												?>
                                          <option value="<?php echo $rowMatch["matches_id"]; ?>"> <?php echo $rowMatch["matches_Title"]; ?></option>
                                          <?php 
												 } 
												 ?>
                                        </select>
                                      </label>
                                    <span class="selectRequiredMsg">Please select an item.</span></span></td>
                                  </tr>
                                  <tr>
                                    <td>Player</td>
                                    <td><span id="spryselect2">
                                      <label>
                                        <select name="drp_players" id="drp_players">
                                          <option value="" selected="selected">----Select----</option>
                                          <?php 
												  while($rowPlayer = mysql_fetch_array($sqlPlayer)) 
												  {
  												?>
                                          <option value="<?php echo $rowPlayer["player_id"]; ?>"> <?php echo $rowPlayer["player_Name"]; ?></option>
                                          <?php 
												 } 
												 ?>
                                        </select>
                                      </label>
                                    <span class="selectRequiredMsg">Please select an item.</span></span></td>
                                  </tr>
                                  <tr>
                                    <td>Runs</td>
                                    <td><span id="sprytextfield1">
                                      <label>
                                        <input type="text" name="txt_runs" id="txt_runs"  />
                                      </label>
                                    <span class="textfieldRequiredMsg">Runs is required.</span></span></td>
                                  </tr>
                                   <tr>
                                    <td></td>
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
				  <div class="left">Created by <a href="http://www.ImeshMadusanka.com" >Gishanda Prabath</a></div>
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