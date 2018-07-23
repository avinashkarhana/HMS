<?php
include "conn.php";
session_start();
$user=$_SESSION['user'];
$seat=$_POST['seat'];
$hostel=$_POST["hostelc"];
$db->query("use hms");
$a=mysqli_fetch_assoc($db->query("select uidai from seats where Seat='".$seat."'"));
if($a['uidai']==""){
$db->query("update students set seat='".$seat."' where uidai like'".$user."'");
$db->query("update seats set uidai=".$user." where Seat like'".$seat."' AND Hcode like '".$hostel."'");
header("Location: /hms/home.php");}
else
	echo $a['uidai']."-".$seat."   Sorry ! Seat taken by other Candidate,Please <a href='seatselect.php'>try again</a>.";

?>