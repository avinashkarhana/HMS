<?php
session_start();
@$user=$_SESSION['user'];
if(!$user)
header("Location: /hms/");
else
echo "";
?>