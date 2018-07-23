<html>
<head>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<style>
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
#avinash:hover{
	width:500px;
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

echo '<abc>User :  </abc>'.$user.'<table align="right"><tr><td><form action="logout.php" method="POST"><input type="submit" class="button" class="button" value="Logout" /></form></td></tr></table>';
echo"_warden";
echo '<br><br><br><table align="center">
<tr><td><form action="warlogin.php" method="POST"><input type="submit" class="button" name="Student" value="Student Search" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="Verified" value="Verified List" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="Applicants" value="All Applicants" /></form></td><td><form action="hostel.php" method="POST"><input type="submit" class="button" name="hostel" value="Rooms Details And Vacant Seats" /></form></td><td><form action="seat_swap.php" method="POST"><input type="submit" class="button" name="swap" value="Hostel Rooms Swap" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="all" value="All students in Hostel" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="cstudents" value="Particular Course Students" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="lastyr" value="Final year student list and seat clearing" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="feenotpaid" value="Fee Defaulters" /></form></td></tr>
</table><form action="reports.php" method="POST"><input class="button" type="submit" value="Reports Section" /></form>';
$user=strtoupper($user);
include "conn.php";
$db->query("use hms");
$c=$db->query("select Seat from seats");
echo "<form action='swap.php' method='POST'>
	 <table align='center'><tr><th>Seat I</th><th>Seat II</th></tr>
	 <tr><td><select name='seat1'>";
while($d=mysqli_fetch_assoc($c))
{ echo $d["Seat"];echo $db->error;
	$e=mysqli_fetch_assoc($db->query("select uidai from seats where Seat like '".$d["Seat"]."'"));
	 { echo $e["uidai"];echo $db->error;
		 $f=mysqli_fetch_assoc($db->query("select Name from students where uidai like '".$e["uidai"]."'"));
		 if($e["uidai"]=='')
		      echo '<option value="'.$d["Seat"].'-'.$e["uidai"].'">'.$d["Seat"].'-Vacant</option>';
		 else	 
              echo '<option value="'.$d["Seat"].'-'.$e["uidai"].'">'.$d["Seat"].'-'.$e["uidai"].'-'.$f["Name"].'</option>';
	 }	
}
echo'</select></td>';
$m=$db->query("select Seat from seats");
echo "<td><select name='seat2'>";
while($x=mysqli_fetch_assoc($m))
{ echo $x["Seat"];echo $db->error;
	$y=mysqli_fetch_assoc($db->query("select uidai from seats where Seat like '".$x["Seat"]."'"));
	 { echo $y["uidai"];echo $db->error;
		 $z=mysqli_fetch_assoc($db->query("select Name from students where uidai like '".$y["uidai"]."'"));
		 if($y["uidai"]=='')
		      echo '<option value="'.$x["Seat"].'-'.$y["uidai"].'">'.$x["Seat"].'-Vacant</option>';
		 else	 
              echo '<option value="'.$x["Seat"].'-'.$y["uidai"].'">'.$x["Seat"].'-'.$y["uidai"].'-'.$z["Name"].'</option>';
	 }	
}
echo'</select></td></tr></table><p align="center"><input type="submit" class="button" name="submit" value="Swap" /></p></form>';



@$all=$_POST["all"];
if($all)
{
include "conn.php";
$usedatabase=$db->query("use hms");
 $sql="SELECT * FROM students WHERE Hostel like '".$user."'";
 $result=mysqli_query($db,$sql);
 echo "<p align='center'><ab>All Students in Hostel</ab></p><hr width=30% solid cyan>";
 if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result))
	{
	$sql2=mysqli_query($db,'select Course_name,Duration from courses where Course_code="'.$row["course"].'"');
	$row2=mysqli_fetch_assoc($sql2);
	echo "<table align='right'><tr><td><img src='/hms/img/".$row["uidai"]."p.jpg' alt='".$row["Name"]."'><form action='student_application_form.php' method='POST'><input type='hidden' name='uidai' value='".$row['uidai']."' /><input type='submit' class='button' value='Application Form' /></form></td></tr></table><br>Hostel : ".$row["Hostel"]."<br>Hostel Room : ".$row["seat"]."<br>Name : ".$row["Name"]."<br>Phone : ".$row["Mobile"]."<br>Email : ".$row["email"]."<br>UIDAI : ".$row["uidai"]."<br>Address : ".$row["Address"]."<br>Course : ".$row["course"]." ".$row2["Course_name"]."(".$row2["Duration"]." years )<br>Batch : ".$row["Batch"]."<br>Status : ".$row["status"]."<br>Category : ".$row["Category"]."<br><br><br>";
	}	
}
  else
	echo '<br><br>No records found';
}
else
 echo"";
$user=strtoupper($user);
include "conn.php";
$usedatabase=$db->query("use hms");
$usc=mysqli_fetch_assoc($db->query("select count(serial) from complaints where status=0 AND Hcode='".$user."'"));
$upc=mysqli_fetch_assoc($db->query("select count(serial) from complaints where status=1 AND Hcode='".$user."'"));
if($usc["count(serial)"]!=0 or $upc["count(serial)"]!=0){
echo"<div id='avinash'>".$usc["count(serial)"]." Complaints Not Taken under Cosideration(or solved)<br>".$upc["count(serial)"]." Complaints under process<br><q><a href='hcomplaints.php'>Check out Complaints</a></q></div>";}
else
	echo"<div id='avinash'>No Complaints<br><a href='hcomplaints.php'>Check Complaints Section</a></div>";
mysqli_close($db);
include "srch.php";
?>
</body>
</html>