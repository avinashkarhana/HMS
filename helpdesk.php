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
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
 ab{
      font-family:Agency FB;
	  font-size:25px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px grey; 
   } 
    abc{
      font-family:Agency FB;
	  font-size:25px;
	  font-weight:"bold";
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
	  text-shadow:2px 5px 8px yellow; 
}
 #avinash{
      border:2px solid blue;
	  background: cyan;
	  border-radius:40px;
	  box-shadow:8px 4px 7px green;
	  padding:10px;
	  font-size:15px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px yellow; 
}
avi{
	font-family:Gloucester MT;
	
	font-size:35;
   }
</style>
<title>Hostel management Sysytem</title>
</head>
<body>
<img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemvati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>
<p align='center'><b>(A Central University)</b></p>
<p align="center">
<ax>Hostel management System</ax></p> 
<?php 
include "logincheck.php";
include "conn.php";
@$user=$_SESSION['user'];
$db->query("use hms");
$result=$db->query("select * from students where uidai like'".$user."'");
@$a=mysqli_fetch_assoc($result);
@$zz=mysqli_fetch_assoc($db->query("select Seat from seats where uidai='".$user."'"));
$hn=mysqli_fetch_assoc($db->query("select Name,fees from hostels where Hcode='".$a["Hostel"]."'"));
echo '<abc>User</abc> '.$user.'<table align="right"><tr><td><form action="logout.php" method="POST"><input class="button" type="submit" value="Logout" /></form></td></tr></table><br><table align="center">
<tr><td><form action="home.php" method="POST"><input class="button" type="submit" value="Applicant Details" /></form></td>';
if($a["status"]==2 or $a["status"]==3 or $a["status"]==4)
	echo"";
else
    echo '<td><form action="home_pref.php" method="POST"><input class="button" type="submit" value="Hostel Prefrences" /></form></td>';
if($a["status"]==4 and !$a["seat"])
	echo '<td><form action="seatselect.php" method="POST"><input class="button" type="submit" value="Select Hostel seat" /></form></td>';
else
    echo'';
echo '<td><form action="application_form.php" method="POST"><input class="button" type="submit" value="Application Form" /></form></td><td><form action="changepass.php" method="POST"><input class="button" type="submit" value="Change Password" /></form></td><td><form action="helpdesk.php" method="POST"><input class="button" type="submit" value="Help Desk" /></form></td></tr>
</table>';
if($a["status"]==3 or $a["status"]==4)
{if($a["Hostel"])
{
echo"<div id='avinash'><p>Important :<br><br>Alloted Hostel is <b>".$hn["Name"]."</b><br>";
if($a["status"]==3)
{echo"Please Submit fees amount of Rs.".$hn["fees"]."";}
if($a["seat"])
	echo "Hostel Alloted Seat is <b>".$a["seat"]."</b><br><br>Current Seat is <b>".$zz["Seat"]."</p></div>";
else
    echo "</div>";
}}
else
	echo"";
echo"<br><br>Student Help Desk:<br><br>";
@$pc=$_POST["pc"];
@$nc=$_POST["nc"];
$pcc=$db->query("select * from complaints where uidai='".$user."'");
$pcf=$db->query("select * from complaints where uidai='".$user."'");
$pcd=mysqli_fetch_assoc($pcc);
if(!$pc and !$nc){
echo '<form action="" method="POST"><input class="button" type="submit" name="nc" value="Register New Complaint" />  <input class="button" type="submit" name="pc" value="View Previous Compliants" /></form>';}
if($nc)
{   include "conn.php";
    $db->query("use hms");
	$ctt=$db->query("select * from complaint_type");
	echo'<form action="regcomplaint.php" method="POST">
	Select a Type : <select name="ctype" required>';
	while($ct=mysqli_fetch_assoc($ctt))
	{
	echo'<option value="'.$ct["c_code"].'" >'.$ct['ctype'].'</option>';
	}
    echo'</select><br>
	Description : <br><textarea name="cdesc" rows=10 cols=45></textarea><br><br><input type="hidden" name="hostel" value="'.$a['Hostel'].'" />
	<input class="button" type="submit" value="Submit" />
	</form>'; 
}
if($pc)
{   
if($pcd)
   {
	echo'<abc>Your Previous Compliants are :</abc><br>';
	while($pce=mysqli_fetch_assoc($pcf))
	{   if($pce["status"]==0)
		 $status="Pending";
	    if($pce["status"]==1)
		 $status="Under Process";
	    if($pce["status"]==2)
		 $status="Solved";
	 $pceh=mysqli_fetch_assoc($db->query("select * from hostels where Hcode='".$pce["Hcode"]."'"));
		echo '<br>##<br><font face="Courier">Complaint Number</font> : '.$pce["serial"].'<br><font face="Courier">Complaint Date</font> : '.$pce["Date"].'<br><font face="Courier">Complaint for Hostel</font> : '.$pceh["Name"].'<br><font face="Courier">Complaint type</font> : '.$pce["type"].'<br><font face="Courier">Complaint Description</font> : '.$pce["description"].'<br><font face="Courier">Complaint Status</font> : '.$status.'<br>';
	}
   }
else
    echo"<abc>No Previous Complaints</abc>";	
}
?>
</body>
</html>