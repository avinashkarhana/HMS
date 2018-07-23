<?php
session_start();
$uidai=$_POST["uidai"];
$user=$_SESSION["user"];
include "conn.php";
if($user=='admin'){
$db->query("use hms");
$today=date("c");
$db->query("update students set vdate='".$today."' , status='2' where uidai like'".$uidai."'");
header("Location: /hms/warlogin.php");}
echo "Unauthorised<a href='/hms/'>Go Back</a>";
?>