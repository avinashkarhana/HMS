<?php
if($user=="admin" || $user=="ADMIN")
{
@$hostelc=$_POST['hostelc'];
echo '<form action="" method="POST"><table align="left"><tr>
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
</form>';
if($hostelc){
include "conn.php";
$t=date("Y");
$usedatabase=$db->query("use hms");
$sql="SELECT * FROM students WHERE Hostel='".$hostelc."'";
 $result=mysqli_query($db,$sql);
 echo "<p align='center'><ab>Search Results</ab></p><hr width=30% solid cyan>";
 if(mysqli_num_rows($result)>0){
	 $x1=1;
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
	echo "<table align='right'><tr><td><img src='/hms/img/".$row["uidai"]."p.jpg' alt='".$row["Name"]."'><form action='student_application_form.php' method='POST'><input type='hidden' name='uidai' value='".$row['uidai']."' /><input type='submit' class='button' value='Application Form' /></form><form action='clrseat.php' method='POST'><input type='hidden' name='uidai' value='".$row['uidai']."' /><input type='submit' class='button' value='Clear Seat' /></form></td></tr></table><br>".$status." Date : ".$row["Date"]."<br>Name : ".$row["Name"]."<br>Phone : ".$row["Mobile"]."<br>Email : ".$row["email"]."<br>UIDAI : ".$row["uidai"]."<br>Address : ".$row["Address"]."<br>Course : ".$row["course"]." ".$row2["Course_name"]."(".$row2["Duration"]." years )<br>Batch : ".$row["Batch"]."-".$b."<br>Status : ".$row["status"]."<br>Hostel : ".$row["Hostel"]."<br>Hostel Room : ".$row['seat']."<br><br><br>";
 }
else
 $x1=0;	}
if($x1==0)
echo 'No Final Year Students.';
echo"";}
else
    echo '<br><br>No Final Year Students';
}
}	
else
{

include "conn.php";
$t=date("Y");
$usedatabase=$db->query("use hms");
$sql="SELECT * FROM students WHERE Hostel like '".$user."'";
 $result=mysqli_query($db,$sql);
 $x1=0;
 echo "<p align='center'><ab>Search Results</ab></p><hr width=30% solid cyan>";
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
	echo "<table align='right'><tr><td><img src='/hms/img/".$row["uidai"]."p.jpg' alt='".$row["Name"]."'><form action='student_application_form.php' method='POST'><input type='hidden' name='uidai' value='".$row['uidai']."' /><input type='submit' class='button' value='Application Form' /></form><form action='clrseat.php' method='POST'><input type='hidden' name='uidai' value='".$row['uidai']."' /><input type='submit' class='button' value='Clear Seat' /></form></td></tr></table><br>".$status." Date : ".$row["Date"]."<br>Name : ".$row["Name"]."<br>Phone : ".$row["Mobile"]."<br>Email : ".$row["email"]."<br>UIDAI : ".$row["uidai"]."<br>Address : ".$row["Address"]."<br>Course : ".$row["course"]." ".$row2["Course_name"]."(".$row2["Duration"]." years )<br>Batch : ".$row["Batch"]."-".$b."<br>Status : ".$row["status"]."<br>Hostel : ".$row["Hostel"]."<br>Hostel Room : ".$row['seat']."<br><br><br>";
	$x1=1;
 }
	}
if($x1!=1)
echo '<br>No Final Year Student';
}
?>