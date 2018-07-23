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
	include"conn.php";
	$db->query("use hms");
	$a=$db->query("select uidai from students");
	while($row=mysqli_fetch_assoc($a))
	{
		if($user==$row['uidai'])
			header("Location: /hms/");
	}
}

echo '<abc>User :  </abc>'.$user.'<table align="right"><tr><td><form action="logout.php" method="POST"><input type="submit" class="button" value="Logout" /></form></td></tr></table>';
echo '<br><br><br><table align="center">
<tr><td><form action="" method="POST"><input type="submit" class="button" name="Student" value="Student Search" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="Verified" value="Verified List" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="NVApplicants" value="Non Verified Applicants" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="Applicants" value="All Applicants" /></form></td><td><form action="croomdetails.php" method="POST"><input type="submit" class="button" name="hostel" value="Hostel Rooms Detail" /></form></td><td><form action="cseat_swap.php" method="POST"><input type="submit" class="button" name="swap" value="Hostel Rooms Swap" /></form></td><td><form action="vacant.php" method="POST"><input type="submit" class="button" name="vacant" value="Vacant Seats" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="cstudents" value="Particular Course Students" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="lastyr" value="Final year student list and seat clear" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="feenotpaid" value="Fee Defaulters" /></form></td></tr>
</table><form action="reports.php" method="POST"><input type="submit" class="button" value="Reports Section" /></form>';
@$hostelc=$_POST['hostelc'];
echo '<form action="" method="POST"><table align="left"><tr>
<td>To swap seats Select a Hostel :</td><td>
<select name="hostelc" >';
include "conn.php";
$db->query("use hms");
$st=$db->query("select Hcode,Name from hostels");
while($c=mysqli_fetch_assoc($st)){
	if($c['Hcode']==$hostelc)
	{
		echo"<option value='".$c['Hcode']."' selected>".$c['Name']."</option>";
	}
	else
	{
		echo"<option value='".$c['Hcode']."'>".$c['Name']."</option>";
	}
	
	$i++;
}
echo '</select></td></tr></table><br>
<p align="left"><input type="submit" class="button" name="hostelset" Value="Select" /></p>
</form>';
if($hostelc)
{
include "conn.php";
$db->query("use hms");
$c=$db->query("select Seat from seats where Hcode like '".$hostelc."'");
echo "<form action='swap.php' method='POST'>
	 <table align='center'><tr><th>Seat I</th><th>Seat II</th></tr>
	 <tr><td><select name='seat1'>";
while($d=mysqli_fetch_assoc($c))
{ echo $d["Seat"];echo $db->error;
	$e=mysqli_fetch_assoc($db->query("select uidai from seats where Seat like '".$d["Seat"]."'"));
	 { echo $e["uidai"];echo $db->error;
		 $f=mysqli_fetch_assoc($db->query("select Name from students where uidai like '".$e["uidai"]."'"));
		 if($e["uidai"]=='')
		      echo '<option value="'.$d["Seat"].'-'.$e["uidai"].'">'.$d["Seat"].'-Blank</option>';
		 else	 
              echo '<option value="'.$d["Seat"].'-'.$e["uidai"].'">'.$d["Seat"].'-'.$e["uidai"].'-'.$f["Name"].'</option>';
	 }	
}
echo'</select></td>';
$m=$db->query("select Seat from seats where Hcode like '".$hostelc."'");
echo "<td><select name='seat2'>";
while($x=mysqli_fetch_assoc($m))
{ echo $x["Seat"];echo $db->error;
	$y=mysqli_fetch_assoc($db->query("select uidai from seats where Seat like '".$x["Seat"]."'"));
	 { echo $y["uidai"];echo $db->error;
		 $z=mysqli_fetch_assoc($db->query("select Name from students where uidai like '".$y["uidai"]."'"));
		 if($y["uidai"]=='')
		      echo '<option value="'.$x["Seat"].'-'.$y["uidai"].'">'.$x["Seat"].'-Blank</option>';
		 else	 
              echo '<option value="'.$x["Seat"].'-'.$y["uidai"].'">'.$x["Seat"].'-'.$y["uidai"].'-'.$z["Name"].'</option>';
	 }	
}
echo'</select></td></tr></table><p align="center"><input type="submit" class="button" name="submit" value="Swap" /></p></form>';
}

echo "<br><p align='right'><akarhana><a href='allot.php'>Allot Seats</a></akarhana></p>";

include "conn.php";
$usedatabase=$db->query("use hms");
$usc=mysqli_fetch_assoc($db->query("select count(serial) from complaints where status=0 "));
$upc=mysqli_fetch_assoc($db->query("select count(serial) from complaints where status=1 "));
if($usc["count(serial)"]!=0 or $upc["count(serial)"]!=0){
echo"<div id='avinash'>".$usc["count(serial)"]." Complaints Not Taken under Cosideration(or solved)<br>".$upc["count(serial)"]." Complaints under process<br><q><a href='acomplaints.php'>Check out Complaints</a></q></div>";}
else
	echo"<div id='avinash'>No Complaints<br><a href='acomplaints.php'>Check Complaints Section</a></div>";


include "srch.php";
?>
</body>
</html>