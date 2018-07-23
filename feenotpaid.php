<?php
@$user=$_SESSION['user'];
@$cstudents=$_POST['cstudents'];
@$feenotpaid=$_POST['feenotpaid'];
@$lastyr=$_POST['lastyr'];
@$applicants=$_POST['Applicants'];
@$all=$_POST['all'];
$user=strtoupper($user);
     //fee defaulter list
echo"<br><p align='center'><b>Fee Defaulter List</b></p><Hr width=30%><br>";
if($user!=='ADMIN' && $user!=='admin')
echo "<p align='center'>Hostel : ".$user."</p>"; 
echo"<br><table border=1 align='center'><tr>";
if($user=='ADMIN' || $user=='admin')
	echo "<th>Hostel</th>";
echo"<th>Room Number</th><th>Name</th><th>Mobile</th><th>UIDAI</th><th>Address</th><th>Next Fee Submission Date</th><th>Current Status</th></tr>";

include "conn.php";
$db->query("use hms");
$today=date("c");
$t=date("Y");
$i=1;
if($user!=="ADMIN" && $user!=="admin")
   $uu=$db->query("select * from seats where Hcode='".$user."'");
else
$uu=$db->query("select * from seats ORDER BY Hcode");

if(mysqli_num_rows($uu)>0){
while($u=mysqli_fetch_assoc($uu))
{

if($u["uidai"]){
$x=mysqli_fetch_assoc($db->query("select fdate from fee where uidai='".$u['uidai']."'"));
$n=mysqli_fetch_assoc($db->query("select * from students where uidai=".$u['uidai'].""));
$qq=mysqli_fetch_assoc($db->query("select * from hostels where Hcode='".$u['Hcode']."'"));
$y=explode("-",$x["fdate"]);
@$yr=$y[0]+1;
@$dt=$y[1]."-".$y[2];
$fd=$yr."-".$dt;
if($yr==$t-1 || $yr==$t)
{
if($fd<$today)
{
	echo"<tr>";
	if($user=='ADMIN' || $user=='admin')
	echo "<td>".$qq["Name"]."</td>";
	echo "<td>".$u["Seat"]."</td><td>".$n['Name']."</td><td>".$n['Mobile']."</td><td>".$u['uidai']."</td><td>".$n['Address']."</td><td>".$fd."</td><td>Not Paid</td></tr>";
$i++;
	}
}

}}
echo "<br></table>";
}
else
	echo"No fee Defaulter";
?>