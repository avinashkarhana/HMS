<html>
<head>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<style>
input[type=text], select , input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
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
 ab{
      text-align:center;
   	  font-family:Agency FB;
	  font-size:25px;
	  font-weight:"bold"; 
   } 
  az{
      text-align:center;
   	  font-family:Agency FB;
	  font-size:30px;
	  font-weight:"bold";
      text-shadow:2px 5px 8px pink;
   } 
 ax{
      border:2px solid lime;
	  background: cyan;
	  border-radius:40px;
	  box-shadow:8px 4px 7px green;
	  padding:10px;
	  width: 5%;
      font:Agency FB;
	  font-size:15px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px yellow; 
}
    karhana{
      border:2px solid red;
	  background: magneta;
	  border-radius:40px;
	  box-shadow:4px 5px 2px gold;
	  padding:10px;
	  width: 5%;
      align: left;
	  font:Agency FB;
	  font-size:15px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px grey; 
      -webkit-transition: width 2s, height 4s;
	  transition: width 2s;
}
    avinash{
      border:2px solid red;
	  background: magneta;
	  border-radius:40px;
	  box-shadow:4px 5px 2px gold;
	  padding:10px;
	  align: right;
	  width: 5%;
      font:Agency FB;
	  font-size:15px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px grey; 
      -webkit-transition: width 2s, height 4s;
	  transition: width 2s;
}
avi{
	font-family:Gloucester MT;

	font-size:35;
   }
.button{
    background-color: #518BC7;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
<title>Hostel management Sysytem</title>
<script>
function showpass() {
    var p = document.getElementById('pass');
  if(p.getAttribute('type')=='password') 
  p.setAttribute('type', 'text');
  else
    p.setAttribute('type', 'password');
}
</script>

<link rel="stylesheet" href="css/button_style.css">
	  <script src='js/jquery.min.js'></script>
      <script src="js/index.js"></script>

<script src="//use.edgefonts.net/alex-brush;aguafina-script;smythe;fondamento;glass-antiqua;almendra-sc;coustard;dorsa;qwigley;antic;abel;advent-pro;arizonia;kelly-slab.js"></script>
</head>
<body>
<?php
session_start();
@$user=$_SESSION['user'];
if(!$user)
echo "";
else
{
	include"conn.php";
	$db->query("use hms");
	$a=$db->query("select uidai from students");
	$b=$db->query("select user from users");
	while($row=mysqli_fetch_assoc($a))
	{
		if($user==$row['uidai'])
			header("Location: /hms/home.php");
		else
			echo "";
	}
	while($row1=mysqli_fetch_assoc($b))
	{
	if($user==$row1['user'])
		    header("Location: /hms/warlogin.php");
	else
			echo "";	
	}
}
?>
<img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemvati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>
<p align='center'><b>(A Central University)</b></p><br>
<p align="center"><ax>Hostel management System</ax></p><br>
	<p align="center"><ab>Login</ab></p>
	<div style="position :relative;
    width: 100%;height:340px;">
		<div style="position: absolute;margin-left: 20px; width: 194px; height: 286px; border-radius: 8px; background-color: #C6C6E4; padding: 20px; top: 5px;">
		  <p style="font-family: advent-pro,sans-serif;">Do you have questions like :</p>
		  <p style="font-family: kelly-slab,serif;">♦ Why all this ?</p>
		  <p style="font-family: kelly-slab,serif;">♦ How to ?</p>
		  <p style="font-family: kelly-slab,serif;">Or Any other query.</p>
		  <p style="font-family: kelly-slab,serif;">If 'YES' go</p>
		  <a href="Why HMS.htm" class="boton" alt="Why HMS" style="font-family: arizonia,cursive;font-size: 30;">here</a>
		</div>
	<div style="position: absolute; width: 25%; border-radius: 5px; left: 36%; background-color: #f2f2f2; padding: 20px; top: 60px; height: 211px;">
	<form action="login.php" method="POST">
<table align="center">
<tr><td><img src="img/user.png" height=37 width=37 alt="Username" /></td><td><input type="text" name="uidai" placeholder="Username..." autocomplete="on" autofocus required/></td></tr>
	<tr><td><img src="img/pass.png" alt="Password" height=37 width=37 /></td><td><input type="password" id="pass" name="pass" placeholder="Password..." style="position: " required /></td></tr></table><img src="img/eye.png" style="display: block; float: right; width: 29px; cursor: pointer; height: 26px;" onClick="showpass()" /><c style="margin-top:4px;float:right;font-size:15;color:#1F91FF;cursor:pointer;" onClick="showpass()">Show Password  </c>
	
<p align="center"><br><br><ab><input type="submit"  class="button" Value="Login" /></ab></p>
</form></div></div><div style="position: absolute;display: block
; padding: 40px;">
	<karhana><a href="register.php">Student Register</a></karhana><avinash><a href="forgot_pass.php">Forgot Password</a></avinash></div>
</body>
</html>