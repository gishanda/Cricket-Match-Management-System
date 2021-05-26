<?php 
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');

if(isset($_GET["drp_players"])){
$va_wicketsByPalyer = "SELECT W.wickets_id AS 'wicketsID', M.matches_Title AS 'matchesTitle', P.player_id AS 'pId', W.wickets_matchWickets AS 'wickets' 
FROM superxi_matches AS M
INNER JOIN superxi_wickets AS W ON W.matches_id = M.matches_id
LEFT JOIN superxi_playerdetails AS P ON W.player_id = P.player_id
WHERE W.player_id = ".$_GET["drp_players"]."
ORDER BY M.matches_id";

$sqlwicketsByPalyer = mysql_query($va_wicketsByPalyer);

$va_totalwickets = "SELECT SUM(wickets_matchWickets)  AS 'total', ROUND(AVG(wickets_matchWickets),0) AS 'avarage' FROM superxi_wickets WHERE player_id =".$_GET["drp_players"];
$sqlTotalwickets = mysql_query($va_totalwickets);
$rowTotalwickets = mysql_fetch_array($sqlTotalwickets);

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
                    <h2 class="page-heading"><span>WICKETS BY PLAYER REPORT</span></h2>
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
                                <td bgcolor="#FF9999" width="100"><div align="center"><strong style="color:#FFF"> Wickets</strong></div></td>
                              </tr>
                        
                               <?php 

										while($rowwicketsByPalyer = mysql_fetch_array($sqlwicketsByPalyer)){
																					
							  ?>
                              <tr>
                                <td bgcolor="#FFFFFF"><div><?php echo $rowwicketsByPalyer["matchesTitle"]; ?></div></td>
                                <td bgcolor="#FFFFFF"><div><?php echo $rowwicketsByPalyer["wickets"]; ?></div></td>
                              </tr>
                                <?php 	
									}
									
							  ?>
                               <tr bgcolor="#33CCFF">
                                <td>Total</td>
                                <td><?php echo $rowTotalwickets["total"]; ?></td>
                              </tr>
                               <tr bgcolor="#0066FF">
                                <td >Average</td>
                                <td><?php echo $rowTotalwickets["avarage"]; ?></td>
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