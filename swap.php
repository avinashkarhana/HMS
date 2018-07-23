<?php
list($seat1, $uidai1) = explode("-", $_POST['seat1'], 2);
list($seat2, $uidai2) = explode("-", $_POST['seat2'], 2);
include "conn.php";
session_start();
$user=$_SESSION["user"];
$db->query("use hms");
$db->query("update seats set uidai='".$uidai1."' where Seat like'".$seat2."'");
$db->query("update seats set uidai='".$uidai2."' where Seat like'".$seat1."'");
$b=$db->query("select user from users");
	while($row1=mysqli_fetch_assoc($b))
	{
	if($user=='admin')
		    header("Location: /hms/cseat_swap.php");
	else
			header("Location: /hms/seat_swap.php");	
	}
?>