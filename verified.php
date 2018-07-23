<?php
include "conn.php";
$usedatabase=$db->query("use hms");
 $sql="SELECT * FROM students WHERE status='2' OR status='3'";
 $result=mysqli_query($db,$sql);
 echo "<p align='center'><ab>Verified Students List</ab></p><hr width=30% solid cyan>";
 if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result))
	{
	$sql2=mysqli_query($db,'select Course_name,Duration from courses where Course_code="'.$row["course"].'"');
	$row2=mysqli_fetch_assoc($sql2);
	echo "<table align='right'><tr><td><img src='/hms/img/".$row["uidai"]."p.jpg' alt='".$row["Name"]."'><form action='student_application_form.php' method='POST'><input type='hidden' name='uidai' value='".$row['uidai']."' /><input type='submit' class='button' class='button' value='Application Form' /></form></td></tr></table><br><table>
	<tr><td><bb>Date :</bb></td><td>".$row["Date"]."</td></tr>
	<tr><td><bb>Name :</bb></td><td>".$row["Name"]."</td></tr>
	<tr><td><bb>Phone :</bb></td><td>".$row["Mobile"]."</td></tr>
	<tr><td><bb>Email :</bb></td><td>".$row["email"]."</td></tr>
	<tr><td><bb>UIDAI :</bb></td><td>".$row["uidai"]."</td></tr>
	<tr><td><bb>Address :</bb></td><td>".$row["Address"]."</td></tr>
	<tr><td><bb>Course :</bb></td><td>".$row["course"]." ".$row2["Course_name"]." (".$row2["Duration"]." years )</td></tr>
	<tr><td><bb>Batch :</bb></td><td>".$row["Batch"]."</td></tr>
	<tr><td><bb>Status :</bb></td><td>".$row["status"]."</td></tr></table>
	<br><br><br>";
 }	}
else 
 echo "No applicants Verified Yet.";	
?>