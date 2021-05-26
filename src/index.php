<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="css/common.css" rel="stylesheet" type="text/css" />
</head>

<body class="loginBody">
      <div class="loginForm" align="center"	> 
      	<div class="loginHeader" align="center">
        </div> 
        <form id="loginForm" name="loginForm" action="login_action.php" method="POST">
        <table width="400" border="0" cellspacing="2" cellpadding="3" style="padding-left:20%;">
          <tr>
            <td>Username</td>
            <td><label>
              <input type="text" name="txt_username" id="txt_username" />
            </label></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><label>
              <input type="password" name="txt_password" id="txt_password" />
            </label></td>
          </tr>
          <tr>
            <td style="padding-left:60%;"><label>
              <input type="submit" name="submit" id="submit" value="Submit" />
            </label>
            </td></td>
          </tr>
          <trstyle="color:red;"><?php if(isset($_GET["msg"])){ ?>
            <?php echo $_GET["msg"] ?>
            <img src="img/Warning.png" />
            <?php } ?>
          </tr>
        </table>
        </form>
	</div>
</body>
</html>
