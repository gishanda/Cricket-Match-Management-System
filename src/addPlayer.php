<?php 
include_once('sessionCheck.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SuperXI Players</title>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<?php include_once("links.php");?>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
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
                    	<h2 class="page-heading"><span>ADD PLAYER</span></h2>
						<div align="center">					
                            <form action="addPlayer_Action.php" method="POST" enctype="multipart/form-data" name="addPlayer" id="addPlayer">
                                <table width="564" border="0" cellspacing="2" cellpadding="3">
                                  <tr>
                                    <td width="179"> Name</td>
                                    <td width="367"><span id="sprytextfield1">
                                      <label>
                                        <input type="text" name="txt_fullName" id="txt_fullName" />
                                      </label>
                                    <span class="textfieldRequiredMsg">A Name is required.</span></span></td>
                                  </tr>
                                  <tr>
                                    <td>Date of Birth(YYYY-MM-DD)</td>
                                    <td><span id="sprytextfield2">
                                    <label>
                                      <input name="txt_dateOfBirth" type="text" id="txt_dateOfBirth" value="" />
                                    </label>
                                    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
                                  </tr>
                                  <tr>
                                    <td>Address</td>
                                    <td><span id="sprytextarea1">
                                      <label>
                                        <textarea name="txt_address" id="txt_address"></textarea>
                                      </label>
                                    <span class="textareaRequiredMsg">A Address is required.</span></span></td>
                                  </tr>
                                  <tr>
                                    <td>Contact Number</td>
                                    <td><span id="sprytextfield4">
                                    <label>
                                      <input name="txt_contactNumber" type="text" id="txt_contactNumber" value="" />
                                    </label>
                                    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
                                  </tr>
                                  <tr>
                                    <td>E-mail</td>
                                    <td><span id="sprytextfield3">
                                    <label>
                                      <input name="txt_mail" type="text" id="txt_mail" value="" />
                                    </label>
                                    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
                                  </tr>
                                  <tr>
                                    <td>Image</td>
                                    <td><label>
                                      <input type="file" name="player_image" id="player_image" />
                                    </label></td>	
                                  </tr>
                                  <tr>
                                    <td><a href="viewPlayer.php">View Data</a></td>
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"yyyy-mm-dd"});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer");
    </script>
</body>
	
</html>