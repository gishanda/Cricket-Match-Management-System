<?php
include_once('dbConnection.php');//including all the connection codes
include_once('sessionCheck.php');
include_once('upload_class.php');//Including File Uploading Class

//File Uploading

if($_FILES["player_image"]["name"] != "") // Checking whether file is uploading via the component
{

	$upload = new file_upload();
	$imagename = $upload->image_upload('player_image');
}
else if(isset($_POST["hidden_image"]) && $_POST["hidden_image"] != "") // If there's an image already to this perticular student
{
	$imagename = $_POST["hidden_image"];
}

//End : File Uploading


//retrieve values from the form to new variables
$var_id = $_POST["hiddentxt_id"];
$var_fullName = $_POST["txt_fullName"];
$var_txt_dateOfBirth = $_POST["txt_dateOfBirth"];
$var_address  = $_POST["txt_address"];
$var_contactNumber = $_POST["txt_contactNumber"];
$var_mail = $_POST["txt_mail"];


$sql = "UPDATE superxi_playerDetails SET 
player_Name='".$var_fullName."',
player_Address='".$var_address."',
player_DateOfBirth='".$var_txt_dateOfBirth."',
player_ContactNumber='".$var_contactNumber."',
player_eMail='".$var_mail."',
player_Image='".$imagename."'
WHERE player_id=".$var_id;




if(mysql_query($sql,$con)) //Whether the data is entered properly
{
 	header("location:editPlayer.php?msg=Data Entered Successfully&id=".$var_id);
	exit();
}
else
{
	header("location:editPlayer.php?msg=Data not updated. something wrong!!!");
	exit();
}


?>