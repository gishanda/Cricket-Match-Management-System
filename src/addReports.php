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
                    <h2 class="page-heading"><span>ADD REPORTS</span></h2>
						<div align="center">					
                            <form action="form_action.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <table width="500" border="0" cellspacing="2" cellpadding="3">
                                  <tr>
                                    <td width="155">First Name</td>
                                    <td width="327">
                                      <label>
                                      <input type="text" name="txt_firstname" id="txt_firstname" />
                                      </label>
                                     </td>
                                  </tr>
                                  <tr>
                                    <td>Last Name</td>
                                    <td>
                                      <label>
                                      <input type="text" name="txt_lastname" id="txt_lastname" />
                                      </label>
                                     </td>
                                  </tr>
                                  <tr>
                                    <td>Age</td>
                                    <td>
                                    <label>
                                    <input name="txt_age" type="text" id="txt_age" value="" />
                                    </label>
                                   </td>
                                  </tr>
                                  <tr>
                                    <td>Address</td>
                                    <td>
                                      <label>
                                      <textarea name="txt_address" id="txt_address"></textarea>
                                      </label>
                                      </td>
                                  </tr>
                                  <tr>
                                    <td>Gender</td>
                                    <td><label>
                                      <input name="gender" type="radio" id="gender" value="Male" checked="checked" />
                                      Male 
                                      <input  type="radio" name="gender" id="gender" value="Female"  />
                                    Female</label></td>
                                  </tr>
                                  <tr>
                                    <td>Married</td>
                                    <td>
                                        <label>
                                          <input name="married" type="checkbox" id="married" value="Married" />
                                        </label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Grade</td>
                                    <td>
                                      <label>
                                          <select name="grade" id="grade">
                                                <option value="" selected="selected">--Select--</option>
                                                <option value="1">Grade 1</option>
                                                <option value="2">Grade 2</option>
                                          </select>
                                      </label>
                                      </td>
                                  </tr>
                                  <tr>
                                    <td>Image</td>
                                    <td><label>
                                      <input type="file" name="student_image" id="student_image" />
                                    </label></td>	
                                  </tr>
                                  <tr>
                                    <td></td>
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
					
	</body>
	
</html>