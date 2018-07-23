<?php
$date=date('H:i j F Y');
$user=$_POST["uidai"];
$pass=$_POST["pass"];
include "conn.php";
if(!get_magic_quotes_gpc())
{
 $user=addslashes($user);	
 $pass=addslashes($pass);
}
if(!mysqli_query($db,'use hms'))
echo"Can't connect to database";
$sql1="select pass from users where user='".$user."'";
$sql="select pass from students where uidai like '".$user."'";
$result=mysqli_query($db,$sql);
$result1=mysqli_query($db,$sql1);
$dpass=mysqli_fetch_assoc($result);
$ddpass=$dpass['pass'];
$dpass1=mysqli_fetch_assoc($result1);
$ddpass1=$dpass1['pass'];
session_start();
if(mysqli_num_rows($result1)>0)
{
	   if($ddpass1==$pass)
	       {
		   mysqli_query($db,'update users set last_login="'.$date.'" where user like "'.$user.'"');
		   $_SESSION['user'] = $user; 
		   header("Location: /hms/warlogin.php");
		   } 
       else
           echo'Wrong Password<br><br><a href="/hms/">Try Again</a>';
}
else
{
	if(mysqli_num_rows($result)>0)
    {
	   if($ddpass==$pass)
	       {
		   mysqli_query($db,'update students set last_login="'.$date.'" where uidai like "'.$user.'"');
		   $_SESSION['user'] = $user; 
		   header("Location: /hms/home.php");
		   } 
       else
           echo'Wrong Password<br><br><a href="/hms/">Try Again</a>';
	   
    }
    else
       echo'No such user exist.<a href="index.php">Try Again</a><br><br><br><a href="register.php">Register</a>';	
}

?>