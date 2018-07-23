<?php
@$searchin=$_POST['searchin'];
@$searchterm=$_POST['searchterm'];
echo '<abc>User :  </abc>'.$user.'<table align="right"><tr><td><form action="logout.php" method="POST"><input class="button" type="submit" value="Logout" /></form></td></tr></table>';
echo"_warden";
echo '<br><br><br><table align="center">
<tr><td><form action="" method="POST"><input class="button" type="submit" name="Student" value="Student Search" /></form></td><td><form action="" method="POST"><input class="button" type="submit" name="Verified" value="Verified List" /></form></td><td><form action="" method="POST"><input class="button" type="submit" name="Applicants" value="All Applicants" /></form></td><td><form action="hostel.php" method="POST"><input class="button" type="submit" name="hostel" value="Rooms Details And Vacant Seats" /></form></td><td><form action="seat_swap.php" method="POST"><input class="button" type="submit" name="swap" value="Hostel Rooms Swap" /></form></td><td><form action="" method="POST"><input class="button" type="submit" name="all" value="All students in Hostel" /></form></td><td><form action="" method="POST"><input class="button" type="submit" name="cstudents" value="Particular Course Students" /></form></td><td><form action="" method="POST"><input class="button" type="submit" name="lastyr" value="Final year student list and seat clearing" /></form></td><td><form action="" method="POST"><input class="button" type="submit" name="feenotpaid" value="Fee Defaulters" /></form></td><td><form action="haffairs.php.php" method="POST"><input class="button" type="submit" value="Hostel affairs" /></form></td></tr>
</table><form action="reports.php" method="POST"><input class="button" type="submit" value="Reports Section" /></form>';

echo '<form action="" method="POST">
Search among all students on basis of :<br>
<select name="searchin" >
 <option value="Name" '; 
 if($searchin=="Name")
	 echo "Selected";
 else
	 echo "";
 echo'>Name</option>
 <option value="Mobile" '; 
 if($searchin=="Mobile")
	 echo "Selected";
 else
	 echo "";
 echo'>Mobile</option>
 <option value="Address" '; 
 if($searchin=="Address")
	 echo "Selected";
 else
	 echo "";
 echo'>Address</option>
 <option value="Course" '; 
 if($searchin=="Course")
	 echo "Selected";
 else
	 echo "";
 echo'>Course</option>
 <option value="email" '; 
 if($searchin=="email")
	 echo "Selected";
 else
	 echo "";
 echo'>Email</option> 
 <option value="Batch" '; 
 if($searchin=="Batch")
	 echo "Selected";
 else
	 echo "";
 echo'>Batch</option>
 <option value="uidai" '; 
 if($searchin=="uidai")
	 echo "Selected";
 else
	 echo "";
 echo'>UIDAI</option>
</select><br><br>
Search term:<br>
<input type="text" name="searchterm" value="'.$searchterm.'"/><br><br>
<input class="button" type="submit" Value="Search" /><br>
</form>
<hr><hr>';
if($searchin&&$searchterm)
{
include "conn.php";
$usedatabase=$db->query("use hms");
 $sql="SELECT * FROM students WHERE $searchin like '%$searchterm%' AND Hostel like '".$user."'";
 $result=mysqli_query($db,$sql);
 echo "<p align='center'><ab>Search Results</ab></p><hr width=30% solid cyan>";
 if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result))
	{
	$sql2=mysqli_query($db,'select Course_name,Duration from courses where Course_code="'.$row["course"].'"');
	$row2=mysqli_fetch_assoc($sql2);
	$b=$row["Batch"]+$row2["Duration"];
	if($row['status']==1)
 {$status="Verify";}
 else
 {$status="Agreeing";}
	echo "<table align='right'><tr><td><img src='/hms/img/".$row["uidai"]."p.jpg' alt='".$row["Name"]."'><form action='student_application_form.php' method='POST'><input type='hidden' name='uidai' value='".$row['uidai']."' /><input class='button' type='submit' value='Application Form' /></form></td></tr></table><br>".$status." Date : ".$row["Date"]."<br>Name : ".$row["Name"]."<br>Phone : ".$row["Mobile"]."<br>Email : ".$row["email"]."<br>UIDAI : ".$row["uidai"]."<br>Address : ".$row["Address"]."<br>Course : ".$row["course"]." ".$row2["Course_name"]."(".$row2["Duration"]." years )<br>Batch : ".$row["Batch"]."-".$b."<br>Status : ".$row["status"]."<br>Hostel : ".$row["Hostel"]."<br>Hostel Room : ".$row['seat']."<br><br><br>";
	}	
}
else
    echo '<br><br>No records found';
}
else
	echo"";

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
	echo "<table align='right'><tr><td><img src='/hms/img/".$row["uidai"]."p.jpg' alt='".$row["Name"]."'><form action='student_application_form.php' method='POST'><input type='hidden' name='uidai' value='".$row['uidai']."' /><input class='button' type='submit' value='Application Form' /></form></td></tr></table><br>Hostel : ".$row["Hostel"]."<br>Hostel Room : ".$row["seat"]."<br>Name : ".$row["Name"]."<br>Phone : ".$row["Mobile"]."<br>Email : ".$row["email"]."<br>UIDAI : ".$row["uidai"]."<br>Address : ".$row["Address"]."<br>Course : ".$row["course"]." ".$row2["Course_name"]."(".$row2["Duration"]." years )<br>Batch : ".$row["Batch"]."<br>Status : ".$row["status"]."<br>Category : ".$row["Category"]."<br><br><br>";
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