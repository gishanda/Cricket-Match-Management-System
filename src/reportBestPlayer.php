<?php 
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');


$va_runs = "SELECT  R.`runs_id`,P.`player_Name`, R.`runs_matchRuns` ,  
(
`runs_matchRuns` * 0.2
) AS RUNS
FROM `superxi_runs` AS R 
INNER JOIN `superxi_playerdetails` AS P ON P.`player_id` = R.`player_id`
ORDER BY R.`runs_matchRuns`  DESC , R.`matches_id`  DESC LIMIT 5";

$sqlruns = mysql_query($va_runs);

$va_wickets = "SELECT  W.`wickets_id`,P.`player_Name` AS 'Wplayer', W.`wickets_matchWickets`,
(
`wickets_matchWickets` * 5
) AS WICKETS
FROM `superxi_wickets` AS W 
INNER JOIN `superxi_playerdetails` AS P
ON P.`player_id` = W.`player_id`
ORDER BY W.`wickets_matchWickets`  DESC , W.`matches_id`  DESC LIMIT 5";

$sqlwickets = mysql_query($va_wickets);

$va_allRounder = "SELECT  R.`runs_id`,P.`player_Name`, R.`runs_matchRuns`,(`runs_matchRuns` * 0.2) AS RUNS,(`wickets_matchWickets` * 5) AS WICKETS,(`runs_matchRuns` * 0.2) + (`wickets_matchWickets` * 5) AS TOTAL
FROM `superxi_runs` AS R 
INNER JOIN `superxi_playerdetails` AS P ON P.`player_id` = R.`player_id`
LEFT JOIN `superxi_wickets` AS W ON P.`player_id` = W.`player_id`
ORDER BY TOTAL DESC, R.`matches_id`  DESC LIMIT 5";

$sqlAllRounder = mysql_query($va_allRounder);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SuperXI Players</title>
<?php include_once("links.php");?>
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
                    <h2 class="page-heading"><span>BEST PLAYERS REPORT</span></h2>
						<div align="center">
							<table width="700" border="1" cellspacing="3" style="color:#000">
                              <tr>
                              <td bgcolor="#000000" width="1"><div align="center"><strong style="color:#FFF">#</strong></div></td>
                                <td bgcolor="#FF9999" width="100"><div align="center"><strong style="color:#FFF">Top 5 Batsmen</strong></div></td>
                                <td bgcolor="#FF9999" width="100"><div align="center"><strong style="color:#FFF"> Top 5 Bowlers</strong></div></td>
                                <td bgcolor="#FF9999" width="100"><div align="center"><strong style="color:#FFF"> Top 5 All Rounders</strong></div></td>
                              </tr>
                        
                               <?php 
										$int_i = 1;
										while(($rowruns = mysql_fetch_array($sqlruns)) && ($rowWickets = mysql_fetch_array($sqlwickets)) && ($rowAllRounder = mysql_fetch_array($sqlAllRounder)) && $int_i <= 5 ){				
							  ?>
                              
                              <tr>
                              	<td bgcolor="#000000"  style="color:#FFF" align="center" ><?php  echo   $int_i   ?></td>
                                <td bgcolor="#FFFFFF"><?php echo $rowruns["player_Name"]; ?></td>
                                <td bgcolor="#FFFFFF"><?php echo $rowWickets["Wplayer"]; ?></td>
                                 <td bgcolor="#FFFFFF"><?php echo $rowAllRounder["player_Name"];?></td>
                              </tr>
                                <?php 	
									$int_i ++;
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
					
	</body>
	
</html>