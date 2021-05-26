<?php 
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');

$va_Runs = "SELECT R.runs_id AS 'runId', M.matches_Title AS 'matchesTitle', P.player_Name AS 'pName', R.runs_matchRuns AS 'runs' FROM superxi_matches AS M INNER JOIN superxi_runs AS R ON R.matches_id = M.matches_id LEFT JOIN superxi_playerdetails AS P ON R.player_id = P.player_id ORDER BY M.matches_Title";
$sqlRuns = mysql_query($va_Runs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SuperXI Runss</title>
<?php include_once("links.php");?>
	<script type="text/javascript">
		function  validate_delete()
		{
		  var a = confirm("Are you sure you want to delete ?");
		  return a;
		}
    </script>
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
                    	<h2 class="page-heading"><span>VIEW RUNS</span></h2>
						<div align="center">	
                        
                        <div>
                        	<h3 align="center" style="color:#F00; margin-bottom:10px;">
                             <?php
                                    if(isset($_GET["msg"]))
                                    {
                                    echo $_GET["msg"];
                                    }
									?>
                            </h3>
                        </div>	
                        				
                            <table width="700" border="1" cellspacing="3" style="color:#000">
                              <tr>
                                <td bgcolor="#999999" width="100"><div align="center"><strong style="color:#FFF">Match Title</strong></div></td>
                                <td bgcolor="#999999" width="100"><div align="center"><strong style="color:#FFF">Player Name</strong></div></td>
                                <td bgcolor="#999999" width="100"><div align="center"><strong style="color:#FFF">Runs</strong></div></td>
                                <td bgcolor="#999999" width="50">&nbsp;</td>
                                <td bgcolor="#999999" width="50">&nbsp;</td>	
                              </tr>
                              
                              <?php 
                              while($rowRuns = mysql_fetch_array($sqlRuns)) 
                              {
                              ?>
                              <tr>
                                <td bgcolor="#CCCCCC" ><?php echo ($rowRuns["matchesTitle"])?></td>
                                <td bgcolor="#FFFFFF" ><?php echo ($rowRuns["pName"])?></td>
                                <td bgcolor="#CCCCCC" ><?php echo $rowRuns["runs"]; ?></td>
                               
                                <td bgcolor="#FFFFFF"><a href="editRuns.php?id=<?php echo $rowRuns["runId"]; ?>">Edit</a></td>
                                <td bgcolor="#CCCCCC"><a href="delete.php?id=<?php echo $rowRuns["runId"]; ?>&form=runs"  onclick="return validate_delete();" >Delete</a> </td>
                              </tr>
                              <div class="clearfix"></div>
                              
                              <?php } ?>
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