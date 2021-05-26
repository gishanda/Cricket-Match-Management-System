<?php 
include_once('dbConnection.php'); //connecting to the db
include_once('session_check.php');
$var_User = "SELECT * FROM superxi_user WHERE superxi_id =".$_GET["id"];
$sqlUser = mysql_query($var_User);
$row_User = mysql_fetch_array($sqlUser);
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
                    	<h2 class="page-heading"><span>EDIT  USER</span></h2>
						<div align="center">					
                            <form action="editUser_Action.php" method="POST" enctype="multipart/form-data" name="addUser" id="addUser">
                                <table width="500" border="0" cellspacing="2" cellpadding="3">
                                  <tr>
                                    <td width="180">Full Name</td>
                                    <td width="300">
                                      <label>
                                      <input type="text" name="txt_fullName" id="txt_fullName"  value="<?php echo $row_User["superxi_name"] ?>"/>
                                      </label>
                                     </td>
                                  </tr>
                                  <tr>
                                    <td>User Type</td>
                                    <td><label for="drpType"></label>
                                      <select name="drpType" id="drpType">
                                        <option value="<?php echo $row_User["superxi_type"] ?>"><?php echo $row_User["superxi_type"] ?></option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Manager">Manager</option>
                                        <option value="DataEntry">DataEntry</option>
                                    </select></td>
                                  </tr>
                                  <tr>
                                    <td>User Name</td>
                                    <td>
                                    <label>
                                    <input name="txt_userName" type="text" id="txt_userName" value="<?php echo $row_User["superxi_userName"]  ?>" />
                                    </label>
                                   </td>
                                  </tr>
                                  <tr>
                                    <td>New Password</td>
                                    <td><span id="sprytextfield1">
                                      <label>
                                        <input name="txt_password" type="password" id="txt_password" value="" />
                                      </label>
                                      <span class="textfieldRequiredMsg">A value is required.</span></span>
                                      <?php
                                    if(isset($_GET["msg2"]))//If the msg is coming via URL
                                    { 

									echo $_GET["msg2"];
                                    }
                                     ?>
                                      </td>
                                  </tr>
                                  <tr>
                                    <td>Re-type the Password</td>
                                    <td><span id="sprytextfield2">
                                      <input name="txt_password2" type="password" id="txt_password2" value="" />
                                    <span class="textfieldRequiredMsg">A value is required.</span></span>
                                    </td>
                                  </tr>
                                  <input name="hidUserID" type="hidden" value="<?php echo $row_User["superxi_id"]  ?>" />
                                  <tr>
                                    <td><a href="viewUser.php">View Data</a></td>
                                    <td><input type="submit" name="submit" id="submit" value="Submit" />
                                    <?php
                                    if(isset($_GET["msg"]))//If the msg is coming via URL
                                    { 

									echo $_GET["msg"];
                                    }
                                     ?></td>
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
    </script>
</body>
	
</html>