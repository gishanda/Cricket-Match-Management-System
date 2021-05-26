<?php
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');
include_once('upload_class.php');//Including File Uploading Class


//retrieve values from the form to new variables
$var_fullName = $_POST["txt_fullName"];
$var_drpType = $_POST["drpType"];
$vat_userName  = $_POST["txt_userName"];
$var_password = $_POST["txt_password"];
$var_password2 = $_POST["txt_password2"];

if($var_password == $var_password2){

$sql = "UPDATE `superxi_user` SET `superxi_userName` = '".$vat_userName."', `superxi_password` = '".md5($var_password)."', `superxi_type` = '".$var_drpType."', `superxi_name` = '".$var_fullName."' WHERE superxi_id = '".$_POST["hidUserID"]."'";

	if(mysql_query($sql,$con)) //Whether the data is entered properly
	{
		header("location:editUser.php?msg=Data Entered Successfully&id='".$_POST["hidUserID"]."'");
		exit();
	}
	else
	{
		header("location:editUser.php?msg=Data not inserted. something wrong!!!&id='".$_POST["hidUserID"]."'");
		exit();
	}
}else
{
	header("location:editUser.php?msg2=Password Doesn't Match!!!&id='".$_POST["hidUserID"]."'");
	exit();
}

?>