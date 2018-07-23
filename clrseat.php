<?php
$uidai=$_POST['uidai'];
include "conn.php";
session_start();

@$user=$_SESSION['user'];
if(!$user)
 header("Location: /hms/index.php");
else
{
	include"conn.php";
	$db->query("use hms");
	$a=$db->query("select uidai from students");
	while($row=mysqli_fetch_assoc($a))
	{
		if($user==$row['uidai'])
			header("Location: /hms/");
	}
}

$db->query("use hms");
$a=$db->query("select user from users");
$x=1;
while($u=mysqli_fetch_assoc($a))
{
    if($user==$u["user"])
      {$db->query("update seats set uidai='' where uidai='".$uidai."'");
	   header("Location: /hms/warlogin.php");
	   $x=1;
	   break;
	   goto b;
	   }
    else
		$x=0;
}
b:
if($x==0)
	header("Location: /hms/");
?>