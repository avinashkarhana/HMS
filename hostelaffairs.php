<html>
<head>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<style>
 #avinash{
      border:2px solid blue;
	  background: cyan;
	  border-radius:40px;
	  box-shadow:8px 4px 7px green;
	  padding:10px;
	  width:350px;
	  font-size:15px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px yellow; 
	  transition: width 2s;
}

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
 abc{
      font-family:Agency FB;
	  font-size:25px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px grey; 
   } 
    bb{
      font-family:Agency FB;
	  font-size:18px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px grey; 
   } 
    ab{
      font-family:Harrington;
	  font-size:30px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px blue; 
   } 
 ax{
      border:2px solid lime;
	  background: cyan;
	  border-radius:40px;
	  box-shadow:8px 4px 7px green;
	  padding:10px;
	  width: 300px;
      text-align:center;
	  font-size:25px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px yello; 
      -webkit-transition: width 2s, height 4s;
	  transition: width 2s;
	  p
}
 akarhana{
      border:2px solid lime;
	  background: GREY;
	  border-radius:40px 30px 70px 20px;
	  box-shadow:8px 4px 7px red;
	  padding:10px;
	  width: 300px;
      text-align:center;
	  font-size:20px;
	  font-weight:"Italic";
	  text-shadow:2px 5px 8px blue;
}
avi{
	font-family:Gloucester MT;
	text-shadow:2px 4px 3px green;
	font-size:35;
   }
</style>
<title>Hostel management Sysytem - Warden Login</title>
</head>
<body>
<img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemvati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>
<p align='center'><b>(A Central University)</b></p>
<p align="center">
<ax>Hostel management System</ax></p>
<?php
include "logincheck.php";

@$user=$_SESSION['user'];
if(!$user)
 header("Location: /hms/index.php");
else
{   
    include 'conn.php';
    $db->query('use hms');
	$y=$db->query('select * from students');
	while($x=mysqli_fetch_assoc($y))
	{
	  if($user==$x['uidai'])
	    header("Location: /hms/");
    }
}
	

echo '<abc>User :  </abc>'.$user.'<table align="right"><tr><td><form action="logout.php" method="POST"><input type="submit" class="button" value="Logout" /></form></td></tr></table>';
echo '<br><br><br><table align="center">
<tr><td><form action="" method="POST"><input type="submit" class="button" name="Student" value="Home" /></form></td>';
if($user=="admin" ){
echo'<td><form action="hostelaffairs.php" method="POST"><input type="submit" class="button" name="addseat" value="Add seats to a hostel" /></form></td><td><form action="hostelaffairs.php" method="POST"><input type="submit" class="button" name="chdetails" value="Change Hostel Details (like Warden or Care-Taker)" /></form></td></tr></table><form action="reports.php" method="POST"><input type="submit" class="button" value="Reports Section" /></form>';}
else
  { echo'</tr></table><form action="reports.php" method="POST"><input type="submit" class="button" value="Reports Section" /></form>';
     
	@$saved=$_GET["saved"];
	include "conn.php";
	$databaseuse= $db->query("use hms");
	$query= $db->query("select * from hostels where Hcode='".strtoupper($user)."'");
	$x=mysqli_fetch_assoc($query);
	echo "<div style='border:1px solid #A0A0A0;border-radius:5px;background-color:#B8D8F9;'><form action='hostelaffairs.php' method='post'><b>Care-taker Name</b><br><input type='text' name='caretaker' value='".$x['caretaker']."' /><br><b>Care-taker contact Number</b><br><input type='number' min=7000000000 max=9999999999 name='ctmobile' value='".$x['ctmobile']."' /><br><br><br><br><input type='submit' class='button' name='save' value='Save' /></form><br><br><br><br>";
	if($saved)
	     echo"<b>UPDATED SUCCESSFULY !</b></div>";
	 else
		 echo"</div>";
	@$save=$_POST['save'];
	@$caretaker=$_POST['caretaker'];
	@$ctmobile=$_POST['ctmobile'];
	if($save)
	{
		include "conn.php";
		$db->query("use hms");
		if($db->query("update hostels set caretaker='".$caretaker."' , ctmobile='".$ctmobile."' where Hcode='".strtoupper($user)."' "))
			header("Location: /hms/hostelaffairs.php?saved=saved");
		else
			echo "<br><br><br><br>Sorry ! something went wrong, can't save";
		$db->close();
	}
  }
include "srch.php";
?>
</body>
</html>