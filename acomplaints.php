<html>
<head>
<style>
input[type=text], select , input[type=password] , input[type=number] , input[type=email]{
    padding: 4px 7px;
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
      font-family:Courier;
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
 transition: width 2s;}
 #avinashk{
	  float:right;
      border:2px solid blue;
	  background: cyan;
	  border-radius:40px;
	  box-shadow:8px 4px 7px green;
	  padding:10px;
	  width:500px;
	  font-size:20px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px yellow; 
	  transition: width 2s;
}
#avinash:hover{
width:500px;}
#avinashk:hover{
	width:700px;
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
if($user!=="admin" && $user!=="ADMIN")
	header("Location: /hms/");

echo '<abc>User :  </abc>'.$user.'<table align="right"><tr><td><form action="logout.php" method="POST"><input type="submit" class="button" value="Logout" /></form></td></tr></table>';
echo '<br><br><br><table align="center">
<tr><td><form action="warlogin.php" method="POST"><input type="submit" class="button" name="Student" value="Student Search" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="Verified" value="Verified List" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="NVApplicants" value="Non Verified Applicant" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="Applicants" value="All Applicant" /></form></td><td><form action="croomdetails.php" method="POST"><input type="submit" class="button" name="hostel" value="Hostel Rooms Detail" /></form></td><td><form action="cseat_swap.php" method="POST"><input type="submit" class="button" name="swap" value="Hostel Rooms Swap" /></form></td><td><form action="vacant.php" method="POST"><input type="submit" class="button" name="vacant" value="Vacant Seats" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="cstudents" value="Particular Course Students" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="lastyr" value="Final year student list and seat clear" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="feenotpaid" value="Fee Defaulters" /></form></td></tr>
</table>';

@$hostelc=$_POST['hostelc'];
echo '<form action="" method="POST"><table align="left"><tr>
<td>Select a Hostel to check complaints :</td><td>
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
if($hostelc){
$hostelc=strtoupper($hostelc);
@$pc=$_POST['pc'];
@$upc=$_POST['upc'];
@$sc=$_POST['sc'];
@$sp=$_POST['sp'];
@$mup=$_POST['mup'];
@$mserial=$_POST['mserial'];
@$sserial=$_POST['sserial'];
if($sp && $sserial)
{
	include "conn.php";
    $usedatabase=$db->query("use hms");
	$db->query("update complaints set status=2 where serial=".$sserial."");
}
if($sp && $mserial)
{
	include "conn.php";
    $usedatabase=$db->query("use hms");
	$db->query("update complaints set status=2 where serial=".$mserial."");
}
if($mup && $mserial)
{
	include "conn.php";
    $usedatabase=$db->query("use hms");
	$db->query("update complaints set status=1 where serial=".$mserial."");
}

echo'<br><br><abc>Complaints Section</abc><br><br><form action="" method="POST"><input type="hidden" name="hostelc" value="'.$hostelc.'">';
if(!$pc)
	echo"<input type='submit' class='button' name='pc' value='Pending Complaints' /> ";
if(!$upc)
	echo"<input type='submit' class='button' name='upc' value='Under Process Complaints' /> ";
if(!$sc)
	echo"<input type='submit' class='button' name='sc' value='Sorted out Complaints' /> ";
$i=1;
if($pc)
{
	include "conn.php";
    $usedatabase=$db->query("use hms");
	$ppc=$db->query("select * from complaints where status=0 AND Hcode='".$hostelc."'");
	$count=mysqli_fetch_assoc($db->query("select count(serial) from complaints where status=0 AND Hcode='".$hostelc."'"));
    if($count['count(serial)']!=0){
    echo"<br><bb>Pending Complaints</bb><br>";
	while($ppcc=mysqli_fetch_assoc($ppc))
	{   $type=mysqli_fetch_assoc($db->query("select ctype from complaint_type where c_code='".$ppcc['type']."'"));
        $z[$i]=$ppcc['serial'];
        if($ppcc["status"]==0)
		 $status="Pending";
	    if($ppcc["status"]==1)
		 $status="Under Process";
	    if($ppcc["status"]==2)
		 $status="Solved";
	  $name=mysqli_fetch_assoc($db->query("select Name from students where uidai='".$ppcc['uidai']."'"));
	  $seat=mysqli_fetch_assoc($db->query("select Seat from seats where uidai='".$ppcc['uidai']."'"));
	echo"<br><br>Complaint number : ".$ppcc['serial']."<br>Complaint Date : ".$ppcc['Date']."<br>Complaint type : ".$type['ctype']."<br>Complaint Description : ".$ppcc['description']."<br>Complaint for Hostel : ".$ppcc['Hcode']."<br>Complaint Status : ".$status."<br><form action='' method='POST'><input type='hidden' name='mserial' value='".$z[$i]."'><input name='mup' type=submit value='Mark Under process' />";
	if($ppcc['type']=='sujjestion')
		echo"<input name='sp' type=submit value='Opt out' /></form><br>";
	else
		echo"</form><br>";
	$i++;
	}}
	  else
		  echo"<br><br>No complaints pending left.";
}
if($upc)
{
		include "conn.php";
    $usedatabase=$db->query("use hms");
	$uppc=$db->query("select * from complaints where status=1 AND Hcode='".$hostelc."'");
	$count=mysqli_fetch_assoc($db->query("select count(serial) from complaints where status=1 AND Hcode='".$hostelc."'"));
    if($count['count(serial)']!=0){
    echo"<br><bb>Complaints Under Process</bb><br>";
	while($uppcc=mysqli_fetch_assoc($uppc))
	{   $type=mysqli_fetch_assoc($db->query("select ctype from complaint_type where c_code='".$uppcc['type']."'"));
        if($uppcc["status"]==0)
		 $status="Pending";
	    if($uppcc["status"]==1)
		 $status="Under Process";
	    if($uppcc["status"]==2)
		 $status="Solved";
	  $name=mysqli_fetch_assoc($db->query("select Name from students where uidai='".$uppcc['uidai']."'"));
	  $seat=mysqli_fetch_assoc($db->query("select Seat from seats where uidai='".$uppcc['uidai']."'"));
	echo"<br><br>Complaint number : ".$uppcc['serial']."<br>Complaint Date : ".$uppcc['Date']."<br>Complaint type : ".$type['ctype']."<br>Complaint Description : ".$uppcc['description']."<br>Complaint for Hostel : ".$uppcc['Hcode']."<br>Complaint Status : ".$status."<br><form action='' method='POST'><input type='hidden' name='sserial' value='".$uppcc['serial']."'><input name='sp' type=submit value='Mark Solved' /></form><br>";}}
	 else
		  echo"<br><br>No complaints under process.";
	
}
if($sc)
{
   	include "conn.php";
    $usedatabase=$db->query("use hms");
	$ssc=$db->query("select * from complaints where status=2 AND Hcode='".$hostelc."'");
	$count=mysqli_fetch_assoc($db->query("select count(serial) from complaints where status=2 AND Hcode='".$hostelc."'"));
    if($count['count(serial)']!=0){
	echo"<br><br><bb>Solved out Complaints</bb><br>";
	while($scc=mysqli_fetch_assoc($ssc))
	{   $type=mysqli_fetch_assoc($db->query("select ctype from complaint_type where c_code='".$scc['type']."'"));
        if($scc["status"]==0)
		 $status="Pending";
	    if($scc["status"]==1)
		 $status="Under Process";
	    if($scc["status"]==2)
		 $status="Solved";
	  $name=mysqli_fetch_assoc($db->query("select Name from students where uidai='".$scc['uidai']."'"));
	  $seat=mysqli_fetch_assoc($db->query("select Seat from seats where uidai='".$scc['uidai']."'"));
	  echo"<br><br>Complaint number : ".$scc['serial']."<br>Complaint Date : ".$scc['Date']."<br>Complaint type : ".$type['ctype']."<br>Complaint Description : ".$scc['description']."<br>Complaint for Hostel : ".$scc['Hcode']."<br>Complaint Status : ".$status."<br>";
	}}
    else
		   echo"<br><br>No complaints solved yet.";	
}
echo"</form>";
//complaint counter
include "conn.php";
$usedatabase=$db->query("use hms");
$usc=mysqli_fetch_assoc($db->query("select count(serial) from complaints where status=0 AND Hcode='".$hostelc."'"));
$upc=mysqli_fetch_assoc($db->query("select count(serial) from complaints where status=1 AND Hcode='".$hostelc."'"));
if($usc["count(serial)"]!=0 or $upc["count(serial)"]!=0){
echo"<div id='avinash'>Hostel :".$hostelc."<br>".$usc["count(serial)"]." Complaints Not Taken under Cosideration(or solved)<br>".$upc["count(serial)"]." Complaints under process</div><br><br>";}
else
	echo"<div id='avinash'>No Complaints</div>";

@$all=$_POST["all"];
if($all)
{
include "conn.php";
$usedatabase=$db->query("use hms");
 $sql="SELECT * FROM students WHERE Hostel like '".$hostelc."'";
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
echo"";}

include "conn.php";
$usedatabase=$db->query("use hms");
$usc=mysqli_fetch_assoc($db->query("select count(serial) from complaints where status=0 "));
$upc=mysqli_fetch_assoc($db->query("select count(serial) from complaints where status=1 "));
if($usc["count(serial)"]!=0 or $upc["count(serial)"]!=0){
echo"<div id='avinash'>Over All : Including all hostels<br>".$usc["count(serial)"]." Complaints Not Taken under Cosideration(or solved)<br>".$upc["count(serial)"]." Complaints under process<br></div>";}
else
	echo"<div id='avinash'>No Complaints<br></div>";
echo"<div id='avinashk'><a href='capp.php'><font face='Harrington' >Complaint Report And Automated application generator</font></a></div>";
mysqli_close($db);
include "srch.php";
?>
</body>
</html>