<?php
$ctype=$_POST["ctype"];
$cdesc=$_POST["cdesc"];
$hostel=$_POST["hostel"];
include "conn.php";
session_start();
$user=$_SESSION["user"];
$db->query("use hms");
$today=date("c");
if($db->query("INSERT INTO complaints (Date,uidai,type,Hcode,description) VALUES ('".$today."',".$user.",'".$ctype."','".$hostel."','".$cdesc."')"))
     echo"Complaint Submitted <br><br><a href='helpdesk.php'>Go Back</a>";
else
	echo"Sorry failed to submit compliaint.<br><br><a href='helpdesk.php'>Try Again</a>";
?>