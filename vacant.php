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
<title>Hostel management Sysytem - Warden Login</title>
</head>
<body>
<img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemwati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>
<p align='center'><b>(A Central University)</b></p>
<p align="center">
<ax>Hostel management System</ax></p>
<?php
include "logincheck.php";
echo '<abc>User :  </abc>'.$user.'<table align="right"><tr><td><form action="logout.php" method="POST"><input type="submit" class="button"  value="Logout" /></form></td></tr></table>';
echo '<br><br><br><table align="center">
<tr><td><form action="" method="POST"><input type="submit" class="button"  name="Vacant" value="Vacant" /></form></td><td><form action="/hms/warlogin.php" method="POST"><input type="submit" class="button"  name="Student" value="Student Search" /></form></td><td><form action="" method="POST"><input type="submit" class="button"  name="Verified" value="Verified List" /></form></td><td><form action="" method="POST"><input type="submit" class="button"  name="NVApplicants" value="Non Verified Applicants" /></form></td><td><form action="" method="POST"><input type="submit" class="button"  name="Applicants" value="All Applicants" /></form></td><td><form action="croomdetails.php" method="POST"><input type="submit" class="button"  name="hostel" value="Hostel Rooms Details" /></form></td><td><form action="cseat_swap.php" method="POST"><input type="submit" class="button"  name="swap" value="Hostel Rooms Swap" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="cstudents" value="Particular Course Students" /></form></td><td><form action="" method="POST"><input type="submit" class="button"  name="lastyr" value="Final year students and their seat clearing." /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="feenotpaid" value="Fee Defaulters" /></form></td></tr>
</table><form action="reports.php" method="POST"><input type="submit" class="button" value="Reports Section" /></form>';
@$hostel=$_POST['hostel'];
$user=strtoupper($user);
echo '<form action="" method="POST"><table align="left"><tr>
<td>Select a Hostel to check vacant seat:</td><td>
<select name="hostel" >';
include "conn.php";
$db->query("use hms");
$st=$db->query("select Hcode,Name from hostels");
while($c=mysqli_fetch_assoc($st)){
	if($c['Hcode']==$hostel)
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
<p align="left"><input type="submit" class="button"  name="vacant" Value="Check Number of Vacant Seats" /></p>
</form>
<br><br><br><hr><hr>';
@$vacant=$_POST['vacant'];
if($vacant)
{
	 @$hostel=$_POST['hostel'];
	 echo "<p align='center'><bb>Vacant Seats :  </bb>";
     include "conn.php";
     $usedatabase=$db->query("use hms");
     $avi=mysqli_query($db,"select Seat from seats where Hcode like '".$hostel."' AND uidai like '' ");$x=0;$y="No seats in Hostel";
	 while($ak=mysqli_fetch_assoc($avi)){ 
	 $x=$x+1;
	 $y=$x;
	 }
	 echo $y."<hr width=30% solid cyan></p>";
}
echo "<br><p align='right'><a href='allot.php'><akarhana>Allot Seats</akarhana></a></p>";
include "srch.php";
?>
</body>
</html>