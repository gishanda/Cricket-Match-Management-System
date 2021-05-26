<?php
session_start();
if(!isset($_SESSION["userid"]))//If the session is not created (User is not logged in to the system)
{
  header("location:index.php?msg=Please login");
  exit();
}
?>