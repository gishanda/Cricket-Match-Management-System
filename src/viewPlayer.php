<?php 
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');

$va_Player = "SELECT * FROM superxi_playerDetails  ORDER BY player_id";
$sqlPlayer = mysql_query($va_Player);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SuperXI Players</title>
<?php include_once("links.php");?>
	<script type="text/javascript">
		function  validate_delete(msg)
		{
		  var a = confirm("Are you sure you want to "+msg+" ?");
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
                    	<h2 class="page-heading"><span>VIEW PLAYER</span></h2>
						<div align="center">	                      				
                            <table width="700" border="1" cellspacing="3" style="color:#000">
                              <tr>
                                <td bgcolor="#999999" width="500"><div align="center"><strong style="color:#FFF">Full Name</strong></div></td>
                                <td bgcolor="#999999" width="50" align="center"><strong style="color:#FFF">Status</strong></td>
                                <td bgcolor="#999999" width="50">&nbsp;</td>	
                                <td bgcolor="#999999" width="50">&nbsp;</td>
                              </tr>
                              
                              <?php 
                              while($rowPlayer = mysql_fetch_array($sqlPlayer)) 
                              {
                              ?>
                              <tr>
                                <td bgcolor="<?php if($rowPlayer["player_Status"] == 1){echo("#CCCCCC");}else {echo("FF6666");}?>" ><?php echo $rowPlayer["player_Name"]; ?></td>
                                
                                <td bgcolor="<?php if($rowPlayer["player_Status"] == 1){echo("#CCCCCC");}else {echo("FF6666");}?>" align="center" ><?php if($rowPlayer["player_Status"] == 1){echo("Active");}else {echo("Inactive");}?></td>
                               
                                <td bgcolor="<?php if($rowPlayer["player_Status"] == 1){echo("#FFFFFF");}else {echo("FF6666");}?>"><a href="editPlayer.php?id=<?php echo $rowPlayer["player_id"]; ?>">Edit</a></td>
                                <?php if($rowPlayer["player_Status"] == 1){?>
                                <td bgcolor="#FF6666"  align="center"><a href="delete.php?id=<?php echo $rowPlayer["player_id"]; ?>&form=player&status=1"  onclick="return validate_delete('Deactivate');" >Deactivate</a> </td>
                                <?php }else{ ?>
                                 <td bgcolor="#66CCFF"  align="center"><a href="delete.php?id=<?php echo $rowPlayer["player_id"]; ?>&form=player&status=0"  onclick="return validate_delete('Activate');" >Activate</a> </td>
                                <?php } ?>
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
				  <div class="left">Created by <a href="http://www.ImeshMadusanka.com" >Gishanda Prabath</a></div>
					<div class="right">
					</div>
			</div>
		</footer>
					
	</body>
	
</html>