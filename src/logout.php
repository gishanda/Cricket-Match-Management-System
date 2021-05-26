<?php
session_start();
session_destroy();//destroying all the sessions
header("location:index.php?msg=You have successsfully logged out");
exit();

?>