<?php
$Sex=$_POST['Sex'];
$Name=$_POST['Name'];
$Phone=$_POST['Phone'];
$Email=$_POST['Email'];
$uidai=$_POST['uidai'];
$user=$_POST['user'];
$omarks=$_POST['omarks'];
$tmarks=$_POST['tmarks'];
$Percentage=($omarks/$tmarks)*100;
$Course=$_POST['Course'];
$Batch=$_POST['Batch'];
$Category=$_POST['Category'];
$Gmobile=$_POST['Gmobile'];
$Fname=$_POST['Fname'];
$Mname=$_POST['Mname'];
$Address=$_POST['Address'];
session_start();
$_SESSION['user']=$user;
include "conn.php";
$result1= $db->query("use hms");
if(!$result1)
	echo'Can not connect to Database.<br><br>';
$query= $db->query("update students set Sex='".$Sex."', Name='".$Name."', Mobile='".$Phone."',uidai='".$uidai."',Category='".$Category."',Email='".$Email."',omarks='".$omarks."',tmarks='".$tmarks."',Percentage='".$Percentage."',Course='".$Course."',Fname='".$Fname."',Mname='".$Mname."',Address='".$Address."',Gmobile='".$Gmobile."' Where uidai=".$uidai."");
$e=$db->error;
if(!$query)
echo $e."error";
if($e)
{ echo $e;	}
else
{
	header("Location: /hms/home.php");
}
?>