<?php 
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');

$va_Wickets = "SELECT W.wickets_id AS 'wicketId', M.matches_Title AS 'matchesTitle', P.player_Name AS 'pName', W.	wickets_matchWickets AS 'wickets' FROM superxi_matches AS M INNER JOIN superxi_wickets AS W ON W.matches_id = M.matches_id LEFT JOIN superxi_playerdetails AS P ON W.player_id = P.player_id ORDER BY M.matches_Title";
$sqlWickets = mysql_query($va_Wickets);
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
                    	<h2 class="page-heading"><span>VIEW WICKETS</span></h2>
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
                                <td bgcolor="#999999" width="100"><div align="center"><strong style="color:#FFF">No of Wickets</strong></div></td>
                                <td bgcolor="#999999" width="50">&nbsp;</td>
                                <td bgcolor="#999999" width="50">&nbsp;</td>	
                              </tr>
                              
                              <?php 
                              while($rowWickets = mysql_fetch_array($sqlWickets)) 
                              {
                              ?>
                              <tr>
                                <td bgcolor="#CCCCCC" ><?php echo ($rowWickets["matchesTitle"])?></td>
                                <td bgcolor="#FFFFFF" ><?php echo ($rowWickets["pName"])?></td>
                                <td bgcolor="#CCCCCC" ><?php echo $rowWickets["wickets"]; ?></td>
                               
                                <td bgcolor="#FFFFFF" align="center"><a href="editWickets.php?id=<?php echo $rowWickets["wicketId"]; ?>">Edit</a></td>
                                <td bgcolor="#CCCCCC" align="center"><a href="delete.php?id=<?php echo $rowWickets["wicketId"]; ?>&form=wickets"  onclick="return validate_delete();" >Delete</a> </td>
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