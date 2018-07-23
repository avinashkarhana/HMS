<html><head>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<title>Report</title>
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
</style></head><body><?php
session_start();
@$user=$_SESSION['user'];
@$cstudents=$_POST['cstudents'];
@$feenotpaid=$_POST['feenotpaid'];
@$lastyr=$_POST['lastyr'];
@$applicants=$_POST['Applicants'];
@$all=$_POST['all'];
@$uidai=$_POST['uidai'];
$user=strtoupper($user);
$uidai=strtoupper($uidai);
if(@$all)
{
	//all student list
echo"<br><p align='center'><b>All Students in Hostel List</b></p><Hr width=30%><br><p align='center'>Hostel : ".$uidai."</p><br><table border=1 align='center'><tr><th>Room Number</th><th>Name</th><th>Mobile</th><th>UIDAI</th><th>Address</th><th>Course</th><th>Batch</th></tr>";

include "conn.php";
$usedatabase=$db->query("use hms");
 $sql="SELECT * FROM students WHERE Hostel='".$uidai."' order by seat,course,Name";
 $result=mysqli_query($db,$sql);
 if(mysqli_num_rows($result)>0)
 {
	while($row=mysqli_fetch_assoc($result))
	{
	$sql2=mysqli_query($db,'select Course_name,Duration from courses where Course_code="'.$row["course"].'"');
	$row2=mysqli_fetch_assoc($sql2);
	echo "<tr><td>".$row["seat"]."</td><td> ".$row["Name"]. "</td><td>" .$row["Mobile"]." </td><td> ".$row["uidai"]." </td><td> ".$row["Address"]." </td><td> ".$row["course"]." ".$row2["Course_name"]."(".$row2["Duration"]." years ) </td><td> ".$row["Batch"]." </td></tr><br>";
	}
	echo "</table>";
	
 }	
  else
	echo '<br><br>No records found';

}
else
	echo"";
if(@$feenotpaid)
{
     //fee defaulter list
echo"<br><p align='center'><b>Fee Defaulter List</b></p><Hr width=30%><br>";
if($uidai!=='ADMIN' && $uidai!=='admin')
echo "<p align='center'>Hostel : ".$uidai."</p>"; 
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
   $uu=$db->query("select * from seats where Hcode='".$uidai."'");
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

}
else
	echo"";
if(@$applicants)
{
     //all applicant list
	 echo"<br><p align='center'><b>All Applicant List</b></p><Hr width=30%><br><br>";
	 
	 include "conn.php";
     $usedatabase=$db->query("use hms");
     $sql="SELECT * FROM students where status!='4' order by Name";
     $result=mysqli_query($db,$sql);
     $i=1;
 if(mysqli_num_rows($result)>0){
	 echo"<table border=1 align='center'><tr><th>Serial</th><th>Name</th><th>Course</th><th>Batch</th><th>Status</th></tr>";
	while($row=mysqli_fetch_assoc($result))
	{
	$sql2=mysqli_query($db,'select Course_name,Duration from courses where Course_code="'.$row["course"].'"');
	$row2=mysqli_fetch_assoc($sql2);
	echo "
	<td>".$i."</td><td>".$row["Name"]."</td><td>".$row["course"]." ".$row2["Course_name"]." (".$row2["Duration"]." years )</td><td>".$row["Batch"]."</td><td>".$row["status"]."</td></tr>";
	$i++;
    }	}
else 
 echo "No applicants";	

echo"<br></table>";

}
else
	echo"";
if(@$cstudents)
{
    //Course student list
	
	@$hostelc=$_POST['hostelc'];
	if($user!=='admin' && $user!=='ADMIN')
	{
			$user=strtoupper($user);
			@$crs=$_POST['Course'];
			if(!$crs)
			{
				echo '<abc>Select a course to check number of students in hostel : </abc>';
				echo'<form action="" method="POST"><select name="Course" id="Course" required>';
				include "conn.php";
				$db->query("use hms");
				if($crs){$res=mysqli_fetch_assoc($db->query("select Course_name from courses where Course_code='".$crs."'"));}
				else{echo"";}
				$result=$db->query("select Course_code,Course_name from courses");
				while($row=mysqli_fetch_assoc($result))
				{
					if($row[Course_code]==$crs)
					   echo"<option value='".$row[Course_code]."' selected>".$row[Course_name]."</option>";
					else
					   echo"<option value='".$row[Course_code]."'>".$row[Course_name]."</option>";

				}
				echo '</select><input type="hidden" name="cstudents" value="cstudents"><input type="hidden" name="uidai" value="'.$uidai.'" /><input type="submit" class="button" value="Check" /></form><br>';
			}
			if($crs)
			{   include "conn.php";
				$db->query("use hms");
				$res=mysqli_fetch_assoc($db->query("select Course_name from courses where Course_code='".$crs."'"));
				$ax=mysqli_fetch_assoc($db->query("select count(Name) from students where Hostel='".$user."' AND course='".$crs."'"));
				$s=$db->query("select * from students where course='".$crs."' AND Hostel='".$user."' order by Name");
				$i=1;
				echo"<br><p align='center'><b>Students of ".$res['Course_name']."</b> in Hostel</b></p><Hr width=30%><br><p align='center'>Hostel : ".$uidai."</p><br><table border=1 align='center'><tr><th>Serial</th><th>Name</th><th>Mobile</th><th>E-Mail</th><th>UIDAI</th><th>Father Name</th><th>Seat Number</th></tr>";
				while($ss=mysqli_fetch_assoc($s))
				{
					$sn=mysqli_fetch_assoc($db->query("select Seat from seats where Hcode='".$user."' AND uidai='".$ss['uidai']."'"));
					echo '<tr><td>'.$i.'.</td><td><b><i>'.$ss['Name'].'</i></b></td><td>'.$ss['Mobile'].'</td><td>'.$ss['email'].'</td><td>'.$ss['uidai'].'</td><td>'.$ss['Fname'].'</td><td>'.$sn['Seat'].'</td></tr>'; 
					$i++;
				}
				
			}
			else
			   echo"";
			echo"<br></table>";

	}
	else
		{       @$crs=$_POST['Course'];
				if(!$crs)
				{
					echo '<form action="" method="POST"><table align="left"><tr>
					<td>Select a Hostel for student check as per Course :</td><td>
					<select name="hostelc" >';
					include "conn.php";
					$db->query("use hms");
					$st=$db->query("select Hcode,Name from hostels");
					while($c=mysqli_fetch_assoc($st))
					{
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
					<p align="left"><input type="hidden" name="cstudents" value="cstudents"><input type="submit" class="button" name="hostelset" Value="Select" /></p></form>';
					if($hostelc)
					{
						echo '<abc>Select a course to check number of students in hostel : </abc>';
						echo'<form action="" method="POST" target="left"><select name="Course" id="Course" required>';
						include "conn.php";
						$db->query("use hms");
						if($crs){$res=mysqli_fetch_assoc($db->query("select Course_name from courses where Course_code='".$crs."'"));}
						else{echo"";}
						$result=$db->query("select Course_code,Course_name from courses");
						while($row=mysqli_fetch_assoc($result))
						{
							if($row[Course_code]==$crs)
							   echo"<option value='".$row[Course_code]."' selected>".$row[Course_name]."</option>";
							else
							   echo"<option value='".$row[Course_code]."'>".$row[Course_name]."</option>";

						}
						echo '</select><input type="hidden" name="cstudents" value="cstudents"><input type="hidden" name="uidai" value="'.$hostelc.'" /><input type="hidden" name="hostelc" value="'.$hostelc.'"><input type="submit" class="button" value="Check" /></form><br>';
					}
				}
				if($crs)
				{   include "conn.php";
					$db->query("use hms");
					$res=mysqli_fetch_assoc($db->query("select Course_name from courses where Course_code='".$crs."'"));
					$ax=mysqli_fetch_assoc($db->query("select count(Name) from students where Hostel='".$hostelc."' AND course='".$crs."'"));
					$s=$db->query("select * from students where course='".$crs."' AND Hostel='".$hostelc."' order by Name");
					$i=1;
					echo"<br><p align='center'><b>Students of ".$res['Course_name']."</b> in hostel</b></p><Hr width=30%><br><p align='center'>Hostel : ".$uidai."</p><br><table border=1 align='center'><tr><th>Serial</th><th>Name</th></th><th>Mobile</th><th>E-Mail</th><th>UIDAI</th><th>Father Name</th><th>Seat Number</th></tr></tr>";
					while($ss=mysqli_fetch_assoc($s))
					{
						$sn=mysqli_fetch_assoc($db->query("select Seat from seats where Hcode='".$hostelc."' AND uidai='".$ss['uidai']."'"));
						echo '<tr><td>'.$i.'.</td><td><b><i>'.$ss['Name'].'</i></b></td><td>'.$ss['Mobile'].'</td><td>'.$ss['email'].'</td><td>'.$ss['uidai'].'</td><td>'.$ss['Fname'].'</td><td>'.$sn['Seat'].'</td></tr>';
						$i++;
					}
				}
				else
				echo"";
				echo"<br></table>";

	}
}
else
	echo"";
if(@$lastyr)
{
    //final year sudent list
	
	if($user=="admin" or $user=="ADMIN")
{
@$hostelc=$_POST['hostelc'];
if(!$hostelc){
echo '<form action="" method="POST" target="left"><table align="left"><tr>
<td>Select a Hostel for last year student check:</td><td>
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
<p align="left"><input type="hidden" name="lastyr" value="lastyr"><input type="submit" class="button" name="hostelset" Value="Select" /></p>
</form>';}
if($hostelc){
include "conn.php";
$t=date("Y");
$usedatabase=$db->query("use hms");
$sql="SELECT * FROM students WHERE Hostel='".$hostelc."'";
 $result=mysqli_query($db,$sql);
 echo"<br><p align='center'><b>Final Year Student list</b></p><Hr width=30%><br><p align='center'>Hostel : ".$hostelc."</p><br><table border=1 align='center'><tr><th>Seat</th><th>Name</th><th>Mobile</th><th>UIDAI</th><th>Course</th><th>Batch</th></tr>";
 $x1=0;
 if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result))
	{
	$sql2=mysqli_query($db,'select Course_name,Duration from courses where Course_code="'.$row["course"].'"');
	$row2=mysqli_fetch_assoc($sql2);
	$b=$row["Batch"]+$row2["Duration"];
    if($b==($t+1) or $b==$t){
	echo "<tr><td>".$row['seat']."</td><td>".$row["Name"]."</td><td>".$row["Mobile"]."</td><td>".$row["uidai"]."</td><td>".$row["course"]." ".$row2["Course_name"]."(".$row2["Duration"]." years )</td><td>".$row["Batch"]."-".$b."</td></tr>";
	$x1=1; }
}
if($x1!==1)
echo 'No Final Year Students.';
}
}}	
else
{

include "conn.php";
$t=date("Y");
$usedatabase=$db->query("use hms");
$sql="SELECT * FROM students WHERE Hostel like '".$user."'";
 $result=mysqli_query($db,$sql);
 $x1=0;
 echo"<br><p align='center'><b>Final Year Student list</b></p><Hr width=30%><br><p align='center'>Hostel : ".strtoupper($user)."</p><br><table border=1 align='center'><tr><th>Seat</th><th>Name</th><th>Mobile</th><th>UIDAI</th><th>Course</th><th>Batch</th></tr>";
	while($row=mysqli_fetch_assoc($result))
	{
	$sql2=mysqli_query($db,'select Course_name,Duration from courses where Course_code="'.$row["course"].'"');
	$row2=mysqli_fetch_assoc($sql2);
	$b=$row["Batch"]+$row2["Duration"];
	if($row['status']>0)
 {$status="Verify";}
 else
 {$status="Agreeing";}
    if($b==($t+1) or $b==$t){
	echo "<tr><td>".$row['seat']."</td><td>".$row["Name"]."</td><td>".$row["Mobile"]."</td><td>".$row["uidai"]."</td><td>".$row["course"]." ".$row2["Course_name"]."(".$row2["Duration"]." years )</td><td>".$row["Batch"]."-".$b."</td></tr>";
	$x1=1;
 }
	}
if($x1!=1)
echo '<br>No Final Year Student';
}
	echo"<br></table>";
	
	
	
}
else
	echo"";
?>
</body>
</html>