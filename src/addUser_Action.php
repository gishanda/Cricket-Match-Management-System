<?php
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');
include_once('upload_class.php');//Including File Uploading Class

//File Uploading Start
$upload = new file_upload;
$image_name = $upload->image_upload('player_image');

//File Uploading END



//retrieve values from the form to new variables
$var_fullName = $_POST["txt_fullName"];
$var_drpType = $_POST["drpType"];
$vat_userName  = $_POST["txt_userName"];
$var_password = $_POST["txt_password"];




$sql = "INSERT INTO `superxi_user`(`superxi_userName`, `superxi_password`, `superxi_type`, `superxi_name`) VALUES ('".$vat_userName."','".md5($var_password)."','".$var_drpType."','".$var_fullName."')";

if(mysql_query($sql,$con)) //Whether the data is entered properly
{
 	header("location:addUser.php?msg=Data Entered Successfully");
	exit();
}
else
{
	header("location:addUser.php?msg=Data not inserted. something wrong!!!");
	exit();
}


?>