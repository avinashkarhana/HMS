<?php
$user=$_POST[user];
include "conn.php";
session_start();
$db->query("use hms");
$today=date("H:i jS F Y");
$db->query("update students set Date='".$today."' , status=1 where uidai like'".$user."'");
$_SESSION['user'] = $user;
header("Location: /hms/application_form.php");
?>