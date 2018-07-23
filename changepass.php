<html>
<head>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<style>
input[type=text], select , input[type=password] , input[type=number] , input[type=email]{
    padding: 4px 8px;
    margin: 4px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit]:hover {
    background-color: #551A8B;
	box-shadow: 2px 3px 8px blue;
}
.button:after {
    content: "";
    background: #f1f1f1;
    display: block;
    position: absolute;
    padding-top: 300%;
    padding-left: 350%;
    margin-left: -20px !important;
    margin-top: -120%;
    opacity: 0;
    transition: all 0.8s
}

.button:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
}
.button{
background-color: #6534AC;
    border: none;
    color: white;
    padding: 7px 8px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 8.9px;
    margin: 4px 2px;
    cursor: pointer;
}
avi{
	font-family:Gloucester MT;
	text-shadow:2px 4px 3px green;
	font-size:35;
   }
ab{
    font-family:Agency FB;
	font-size:25px;
    font-weight:"bold";
	margin-right:120px;
	text-shadow:2px 5px 8px grey; 
  }
akarhana{
    font-family:Agency FB;
	font-size:25px;
    font-weight:"italic";
	margin-right:120px;
	text-shadow:2px 5px 8px red; 
  }     
</style>
<title>Change Password</title></head>
<body>
<img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemvati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>
<p align='center'><b>(A Central University)</b></p>
<p align="center">
<ax>Hostel management System</ax></p><br><br>
<akarhana>Change your password :</akarhana>
<?php
include "conn.php";
$db->query("use hms");
session_start();
$user=$_SESSION["user"];
$a=mysqli_fetch_assoc($db->query("select pass from students where uidai='".$user."'"));
@$po=$_POST["po"];
@$p1=$_POST["pn1"];
@$p2=$_POST["pn2"];
if(!$po)
{
echo '<form method="POST" action="" align="center"><table border=1 align="center"><tr><td><ab>Enter old password</ab></td><td><input type="password" name="po" /></td></tr></table><br><input type="submit" class="button" value="Submit"/></form>';
}
if($po==$a["pass"])
{
  if($p1=="" && $p2=="" || !($p1==$p2))
  {echo '<form method="POST" action=""><table><tr><td><ab>Enter new password</ab></td><td><input type="password" name="pn1" /></td></tr><tr><td><ab>Confirm new password</ab></td><td><input type="password" name="pn2" /></td></tr></table><input type="hidden" name="po" value="'.$po.'"/><input type="submit" class="button" value="Change"/></form>';}
    if($p1==$p2)
	{		$pass=$p1;
      if($pass)
      {
        $db->query("update students set pass='".$pass."' where uidai like'".$user."'");
        echo"Password Changed successfuly.<a href='home.php'>Back to Home</a>";
      }
	}  
	else
		echo "New passwords entered do not match.";
}
else
{   if($po)
	echo"Old Password is not correct.<a href='changepass.php'>Try Again</a>";}	
?>
</body>
</html>