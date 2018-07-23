<?php
$user=$_POST['user'];
$pref1=$_POST['pref1'];
$pref2=$_POST['pref2'];
$pref3=$_POST['pref3'];
echo "1".$pref1."<br>2".$pref2."<br>3".$pref3."<br>";
session_start();
include "conn.php";
$result1= $db->query("use hms");
if(!$result1)
	echo'Can not connect to Database.<br><br>';
$query= $db->query('update students set p1="'.$pref1.'" , p2="'.$pref2.'" , p3="'.$pref3.'" where uidai like"'.$user.'"');
$qerror=$db->error;
$_SESSION['user'] = $user;
echo $qerror;	
$db->close();
echo"Prefrences Saved.<br><br>Taking you back to home.
<a href='/hms/home_pref.php'>go</a>";
?>