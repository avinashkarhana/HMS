<html>
<head>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<title>New Registeration</title>
<body><?php
$Date=date("H:i jS F Y");
$sex=$_POST['sex'];
$Name=$_POST['Name'];
$Phone=$_POST['Phone'];
$Email=$_POST['Email'];
$pass=$_POST['pass'];
$omarks=$_POST['omarks'];
$tmarks=$_POST['tmarks'];
$percentage=($omarks/$tmarks)*100;
$uidai=$_POST['uidai'];
$Course=$_POST['Course'];
$Batch=$_POST['Batch'];
$Category=$_POST['Category'];
if(!$sex || !$Name || !$Phone || !$Email || !$uidai || !$Course || !$Category || !$Batch || !$pass || !$omarks || !$tmarks)
{
 echo 'Some Details left Blank.<br>Please go <a href="register.php">back</a> And try again';
 exit;
}
include "conn.php";
$result1= $db->query("use hms");
if(!$result1)
	echo'Can not connect to Database.<br><br>';
$a=$db->query("select * from students where uidai like'".$uidai."'");
$b=mysqli_fetch_assoc($a);
if($a && $uidai==$b["uidai"])
  {
	 echo "Sorry can't register again.<br>Already Registered<br><br> UIDAI : ".$uidai."<br>Name : ".$b["Name"]."";
     if($Phone==$b["Mobile"] or $Email==$b["email"])
        echo"<br>Password:".@$b[pass]."";
  }
else
  {
		$query= $db->query("insert into students (Date,Sex,Name,Mobile,uidai,pass,Category,email,Course,Batch,status,omarks,tmarks,percentage)
				values('".$Date."','".$sex."', '".$Name."', '".$Phone."','".$uidai."','".$pass."','".$Category."','".$Email."','".$Course."','".$Batch."',0,'".$omarks."','".$tmarks."','".$percentage."')");
		$qerror=$db->error;	 
		if($query)
		 echo '* User Registered <br><br>Please <a href="index.php">Get Back to HMS</a> and login with your credentials for futher detailed information filling.';
		else
		 echo $qerror."<br>Something went wrong.Sorry system error can't Register Right Now.";
  }
$db->close();
echo '<br><br><br><br><a href="register.php">New Registeration.</a>';
?>
</body>
</head></html>