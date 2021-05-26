<?php 
include_once('sessionCheck.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SuperXI Players</title>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<?php include_once("links.php");?>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
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
                    	<h2 class="page-heading"><span>ADD USER</span></h2>
						<div align="center">					
                            <form action="addUser_Action.php" method="POST" enctype="multipart/form-data" name="addUser" id="addUser">
                                <table width="500" border="0" cellspacing="2" cellpadding="3">
                                  <tr>
                                    <td width="180">Full Name</td>
                                    <td width="300"><span id="sprytextfield1">
                                      <label>
                                        <input type="text" name="txt_fullName" id="txt_fullName" />
                                      </label>
                                    <span class="textfieldRequiredMsg">Full Name is required.</span></span></td>
                                  </tr>
                                  <tr>
                                    <td>User Type</td>
                                    <td><label for="drpType"></label>
                                      <span id="spryselect1">
                                      <select name="drpType" id="drpType">
                                        <option value="">---Select---</option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Manager">Manager</option>
                                        <option value="DataEntry">DataEntry</option>
                                      </select>
                                    <span class="selectRequiredMsg">Please select an item.</span></span></td>
                                  </tr>
                                  <tr>
                                    <td>User Name</td>
                                    <td><span id="sprytextfield2">
                                      <label>
                                        <input name="txt_userName" type="text" id="txt_userName" value="" />
                                      </label>
                                    <span class="textfieldRequiredMsg">User Name is required.</span></span></td>
                                  </tr>
                                  <tr>
                                    <td>Password</td>
                                    <td><span id="sprytextfield3">
                                      <label>
                                        <input name="txt_password" type="text" id="txt_password" value="" />
                                      </label>
                                    <span class="textfieldRequiredMsg">Password is required.</span></span></td>
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
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
    </script>
</body>
	
</html>