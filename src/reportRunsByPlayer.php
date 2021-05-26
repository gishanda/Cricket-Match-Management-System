<?php 
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');

if(isset($_GET["drp_players"])){
$va_runsByPalyer = "SELECT R.runs_id AS 'runID', M.matches_Title AS 'matchesTitle', P.player_id AS 'pId', R.runs_matchRuns AS 'runs' 
FROM superxi_matches AS M
INNER JOIN superxi_runs AS R ON R.matches_id = M.matches_id
LEFT JOIN superxi_playerdetails AS P ON R.player_id = P.player_id
WHERE R.player_id = ".$_GET["drp_players"]."
ORDER BY M.matches_id";

$sqlrunsByPalyer = mysql_query($va_runsByPalyer);

$va_totalRuns = "SELECT SUM(runs_matchRuns)  AS 'total', ROUND(AVG(runs_matchRuns),2) AS 'avarage' FROM superxi_runs WHERE player_id =".$_GET["drp_players"];
$sqlTotalRuns = mysql_query($va_totalRuns);
$rowTotalRuns = mysql_fetch_array($sqlTotalRuns);

}

$var_Player = "SELECT player_id, player_Name  FROM superxi_playerDetails ORDER BY player_id";
$sqlPlayer = mysql_query($var_Player);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SuperXI Players</title>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<?php include_once("links.php");?>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
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
                    <h2 class="page-heading"><span>RUNS BY PLAYER REPORT</span></h2>
						<div align="center">					
                          <form action="" method="GET" enctype="multipart/form-data" name="editWickets" id="editWickets">
                                <table width="500" border="0" cellspacing="2" cellpadding="3">
                                  <tr>
                                    <td width="155">Player</td>
                                    <td width="327"><span id="spryselect1">
                                      <label>
                                        <select name="drp_players" id="drp_players">
                                          <option value="" selected="selected">----Select----</option>
                                          <?php 
												  while($rowPlayer = mysql_fetch_array($sqlPlayer)) 
												  {
												?>
                                          <option value="<?php echo $rowPlayer["player_id"]; ?>" 
												<?php if(isset($_GET["drp_players"]) && $_GET["drp_players"] == $rowPlayer["player_id"]){  ?>  selected="selected" <?php } ?> > <?php echo $rowPlayer["player_Name"]; ?> </option>
                                          <?php } ?>
                                        </select>
                                      </label>
                                    <span class="selectRequiredMsg">Please select an item.</span></span></td>
                                  </tr>
                                   <tr>
                                    <td>
                                    <label>
                                    <input type="submit" name="submit" id="submit" onclick="return validate_DropDown();" value="Submit" />
                                    </label>
                                    </td>
                                    <td>
                                    <?php
                                    if(isset($_GET["msg"]))//If the msg is coming via URL
                                    {
                                    echo $_GET["msg"];
                                    }
                                     ?></label></td>
                                  </tr>
                                </table>
                        </form>
                        <br/>
                        
                               <?php 
							  		if(isset($_GET["drp_players"]) && $_GET["drp_players"] != ""){
																					
							  ?>
							<table width="700" border="1" cellspacing="3" style="color:#000">
                              <tr>
                                <td bgcolor="#FF9999" width="100"><div align="center"><strong style="color:#FFF">Match Title</strong></div></td>
                                <td bgcolor="#FF9999" width="100"><div align="center"><strong style="color:#FFF"> Runs</strong></div></td>
                              </tr>
                        
                               <?php 

										while($rowrunsByPalyer = mysql_fetch_array($sqlrunsByPalyer)){
																					
							  ?>
                              <tr>
                                <td bgcolor="#FFFFFF"><div><?php echo $rowrunsByPalyer["matchesTitle"]; ?></div></td>
                                <td bgcolor="#FFFFFF"><div><?php echo $rowrunsByPalyer["runs"]; ?></div></td>
                              </tr>
                                <?php 	
									}
									
							  ?>
                               <tr bgcolor="#33CCFF">
                                <td>Total</td>
                                <td><?php echo $rowTotalRuns["total"]; ?></td>
                              </tr>
                               <tr bgcolor="#0066FF">
                                <td >Average</td>
                                <td><?php echo $rowTotalRuns["avarage"]; ?></td>
                              </tr>
                              <?php 
										
								}
									
							  ?>
                            </table>

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
        </script>
</body>
	
</html>