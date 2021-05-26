<?php 
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');

$va_Matches = "SELECT * FROM superxi_matches WHERE matches_id =".$_GET["id"];
$sqlMatches = mysql_query($va_Matches);
$rowMatches = mysql_fetch_array($sqlMatches);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SuperXI Players</title>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<?php include_once("links.php");?>
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
                    <h2 class="page-heading"><span>EDIT MATCHES</span></h2>
						<div align="center">					
                            <form action="editMatches_Action.php" method="POST" enctype="multipart/form-data" name="addMatches" id="addMatches">
                                <table width="500" border="0" cellspacing="2" cellpadding="3">
                                  <tr>
                                    <td width="150">Match Title</td>
                                    <td width="300"><span id="sprytextfield1">
                                      <label>
                                        <input type="text" name="txt_title" id="txt_title"  value="<?php echo $rowMatches["matches_Title"]; ?>"/>
                                      </label>
                                    <span class="textfieldRequiredMsg">Match Title is required.</span></span></td>
                                  </tr>
                                  <tr>
                                    <td>Venue</td>
                                    <td><span id="sprytextfield2">
                                      <label>
                                        <input type="text" name="txt_venue" id="txt_venue" value="<?php echo $rowMatches["matches_Venue"]; ?>"/>
                                      </label>
                                    <span class="textfieldRequiredMsg">Venue is required.</span></span></td>
                                  </tr>
                                  <tr>
                                    <td>Date</td>
                                    <td><span id="sprytextfield3">
                                    <label>
                                      <input name="txt_date" type="text" id="txt_date" value="<?php echo $rowMatches["matches_Date"]; ?>"/>
                                    </label>
                                    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
                                      <label> 
                                    	<input type="hidden" name="hiddentxt_id" id="hiddentxt_id" value="<?php echo $rowMatches["matches_id"]; ?>" />
                                    </label>
                                   </td>
                                  </tr>
                                  <tr>
									<td>
           							<a href="viewMatches.php">View Data</a>
                                    </td>
                                    <td><label>
                                    <input type="submit" name="submit" id="submit" value="Submit" />
                                    <?php
                                    if(isset($_GET["msg"]))//If the msg is coming via URL
                                    {
                                    echo ("Data Altered Successfully !");
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "date", {format:"yyyy-mm-dd"});
    </script>
</body>
	
</html>