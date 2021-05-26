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
$var_txt_dateOfBirth = $_POST["txt_dateOfBirth"];
$var_address  = $_POST["txt_address"];
$var_contactNumber = $_POST["txt_contactNumber"];
$var_mail = $_POST["txt_mail"];


$sql = "INSERT INTO superxi_playerDetails(player_Name, player_Address, player_DateOfBirth, player_ContactNumber, player_eMail, player_Image) VALUES ('".$var_fullName."','".$var_address."','".$var_txt_dateOfBirth."','".$var_contactNumber."','".$var_mail."','".$image_name."')";

if(mysql_query($sql,$con)) //Whether the data is entered properly
{
 	header("location:addPlayer.php?msg=Data Entered Successfully");
	exit();
}
else
{
	header("location:addPlayer.php?msg=Data not inserted. something wrong!!!");
	exit();
}


?>