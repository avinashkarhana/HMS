<html>
<head>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<style>
 ab{
      font-family:Agency FB;
	  font-size:25px;
	  font-weight:"bold";
	  margin-right:120px;
	  text-shadow:2px 5px 8px grey; 
   } 
    abc{
      font-family:Agency FB;
	  font-size:25px;
	  font-weight:"bold";
	  margin-right:10px;
	  text-shadow:2px 5px 8px grey; 
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
avi{
	font-family:Gloucester MT;
	text-shadow:2px 4px 3px green;
	font-size:35;
   }
</style>
<title>Hostel management Sysytem</title>
</head>
<body>
<img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemvati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>
<p align='center'><b>(A Central University)</b></p><br>
<p align="center">
<ax>Hostel management System</ax></p><br><br><br> 
<?php 
include "logincheck.php";
@$user=$_SESSION['user'];
echo '<abc>User</abc>'.$user.'<table align="right"><tr><td><form action="logout.php" method="POST"><input type="submit" value="Logout" /></form></td></tr></table><br><table align="center">
<tr><td><form action="home.php" method="POST"><input type="submit" value="Applicant Details" /></form></td><td><form action="seatselect.php" method="POST"><input type="submit" value="Select Hostel Seat" /></form></td><td><form action="application_form.php" method="POST"><input type="submit" value="Application Form" /></form></td></tr>
</table>';
echo "<br><br><p align='center'><ab>Select your hostel seat <br><br><br></ab></p>"; 

include "conn.php";
$db->query("use hms");
$hs=mysqli_fetch_assoc($db->query('select Hostel from students where uidai="'.$user.'" '));
$xxxx='select * from hostels where Hcode="'.$hs["Hostel"].'" ';
echo$xxxx;
$aa=mysqli_fetch_assoc($db->query('select * from hostels where Hcode="'.$hs["Hostel"].'" '));
if($aa["Type"]=='M')
	$x="Mr.";
else
	$x="Mrs.";

echo 'You have been alloted <b>'.$aa["Name"].'</b><p align="right">Your Hostel Warden are 1.<b>'.$x.''.$aa["warden1"].'</b><br>2.<b>'.$x.''.$aa["warden2"].'</b></p><table align="left"><tr><form action="setseat.php" method="POST">
<td>Select a seat :</td><td>
<select name="seat" >';

$st=$db->query('select Seat from seats where Hcode like "'.$hs["Hostel"].'" AND uidai like "" ');

while($c=mysqli_fetch_assoc($st)){
	    echo"<option value='".$c["Seat"]."' selected>".$c["Seat"]."</option>";
}
echo '</select></td>
<tr><td><p align="left"><input type="hidden" name="hostelc" value="'.$hs["Hostel"].'" /><input type="submit" Value="Select" /></td></tr></p>
</form></tr></table>';
?>
</form>
</body>
</html>