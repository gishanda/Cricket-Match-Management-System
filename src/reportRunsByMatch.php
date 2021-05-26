<?php 
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');

if(isset($_GET["drp_matches"])){
$va_runsByRuns = "SELECT R.runs_id AS 'runID', P.player_name AS 'pName', M.matches_id AS 'mId', R.runs_matchRuns AS 'runs'
FROM superxi_matches AS M
INNER JOIN superxi_runs AS R ON R.matches_id = M.matches_id
LEFT JOIN superxi_playerdetails AS P ON R.player_id = P.player_id
WHERE M.matches_id = ".$_GET["drp_matches"]."
ORDER BY R.runs_matchRuns DESC";

$sqlrunsByRuns = mysql_query($va_runsByRuns);

}

$var_Matches = "SELECT matches_id, matches_Title  FROM superxi_matches ORDER BY  matches_id DESC";
$sqlMatches = mysql_query($var_Matches);
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
                    <h2 class="page-heading"><span>RUNS BY MATCH REPORT</span></h2>
						<div align="center">					
                          <form action="" method="GET" enctype="multipart/form-data" name="editWickets" id="editWickets">
                                <table width="500" border="0" cellspacing="2" cellpadding="3">
                                  <tr>
                                    <td width="155">Match Titla</td>
                                    <td width="327"><span id="spryselect1">
                                      <label>
                                        <select name="drp_matches" id="drp_matches">
                                          <option value="" selected="selected">----Select----</option>
                                          <?php 
												  while($rowMatches = mysql_fetch_array($sqlMatches)) 
												  {
												?>
                                          <option value="<?php echo $rowMatches["matches_id"]; ?>" 
												<?php if(isset($_GET["drp_matches"]) && $_GET["drp_matches"] == $rowMatches["matches_id"]){  ?>  selected="selected" <?php } ?> > <?php echo $rowMatches["matches_Title"]; ?> </option>
                                          <?php } ?>
                                        </select>
                                      </label>
                                    <span class="selectRequiredMsg">Please select an item.</span></span></td>
                                  </tr>
                                   <tr>
                                    <td>
                                    <label>
                                    <input type="submit" name="submit" id="submit" value="Submit" />
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
							  		if(isset($_GET["drp_matches"]) && $_GET["drp_matches"] != ""){									
							  	?>
                        
                        
							<table width="700" border="1" cellspacing="3" style="color:#000">
                              <tr>
                                <td bgcolor="#FF9999" width="100"><div align="center"><strong style="color:#FFF">Player Title</strong></div></td>
                                <td bgcolor="#FF9999" width="100"><div align="center"><strong style="color:#FFF"> Runs</strong></div></td>
                              </tr>
                              <?php 
									while($rowrunsByRuns = mysql_fetch_array($sqlrunsByRuns)){													
							  ?>
                              <tr>
                                <td bgcolor="#FFFFFF"><div><?php echo $rowrunsByRuns["pName"]; ?></div></td>
                                <td bgcolor="#FFFFFF"><div><?php echo $rowrunsByRuns["runs"]; ?></div></td>
                              </tr>
                                <?php 	
									}
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