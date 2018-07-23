<?php
@$hostelc=$_POST['hostelc'];
if($user!="ADMIN"){
$user=strtoupper($user);
@$crs=$_POST['Course'];
echo '<abc>Select a course to check number of students in hostel : </abc>';
echo'<form action="" method="POST"><select name="Course" id="Course" required>';
include "conn.php";
$db->query("use hms");
if($crs){$res=mysqli_fetch_assoc($db->query("select Course_name from courses where Course_code='".$crs."'"));}
else{echo"";}
$result=$db->query("select Course_code,Course_name from courses");
while($row=mysqli_fetch_assoc($result)){
	if($row[Course_code]==$crs)
       echo"<option value='".$row[Course_code]."' selected>".$row[Course_name]."</option>";
    else
	   echo"<option value='".$row[Course_code]."'>".$row[Course_name]."</option>";

}
echo '</select><input type="hidden" name="cstudents" value="cstudents"><input type="submit" class="button" class="button" value="Check" /></form><br>';
if($crs)
{
	$ax=mysqli_fetch_assoc($db->query("select count(Name) from students where Hostel='".$user."' AND course='".$crs."'"));
	echo 'There are <b>'.$ax['count(Name)'].' Students of '.$res['Course_name'].'</b> in hostel.<br><br><br>';
	$s=$db->query("select * from students where course='".$crs."' AND Hostel='".$user."'");
	$i=1;
	while($ss=mysqli_fetch_assoc($s))
	{
		$sn=mysqli_fetch_assoc($db->query("select Seat from seats where Hcode='".$user."' AND uidai='".$ss['uidai']."'"));
		echo $i.'. <b><i>'.$ss['Name'].'</i></b> (Seat Number : '.$sn['Seat'].')<form action="student_application_form.php" method="POST"><input type="hidden" name="uidai" value="'.$ss['uidai'].'"><input type="submit" class="button" class="button" value="Application Form" /></form> ';
		$i++;
	}
}
else
   echo"";
}
else
{
echo '<form action="" method="POST"><table align="left"><tr>
<td>Select a Hostel for student check as per Course :</td><td>
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
<p align="left"><input type="hidden" name="cstudents" value="cstudents"><input type="submit" class="button" class="button" name="hostelset" Value="Select" /></p>
</form>';
}
if($hostelc){
@$crs=$_POST['Course'];
echo '<abc>Select a course to check number of students in hostel : </abc>';
echo'<form action="" method="POST"><select name="Course" id="Course" required>';
include "conn.php";
$db->query("use hms");
if($crs){$res=mysqli_fetch_assoc($db->query("select Course_name from courses where Course_code='".$crs."'"));}
else{echo"";}
$result=$db->query("select Course_code,Course_name from courses");
while($row=mysqli_fetch_assoc($result)){
	if($row[Course_code]==$crs)
       echo"<option value='".$row[Course_code]."' selected>".$row[Course_name]."</option>";
    else
	   echo"<option value='".$row[Course_code]."'>".$row[Course_name]."</option>";

}
echo '</select><input type="hidden" name="cstudents" value="cstudents"><input type="hidden" name="hostelc" value="'.$hostelc.'"><input type="submit" class="button" class="button" value="Check" /></form><br>';
if($crs)
{
	$ax=mysqli_fetch_assoc($db->query("select count(Name) from students where Hostel='".$hostelc."' AND course='".$crs."'"));
	echo 'There are <b>'.$ax['count(Name)'].' Students of '.$res['Course_name'].'</b> in hostel.<br><br><br>';
	$s=$db->query("select * from students where course='".$crs."' AND Hostel='".$hostelc."'");
	$i=1;
	while($ss=mysqli_fetch_assoc($s))
	{
		$sn=mysqli_fetch_assoc($db->query("select Seat from seats where Hcode='".$hostelc."' AND uidai='".$ss['uidai']."'"));
		echo $i.'. <b><i>'.$ss['Name'].'</i></b> (Seat Number : '.$sn['Seat'].')<form action="student_application_form.php" method="POST"><input type="hidden" name="uidai" value="'.$ss['uidai'].'"><input type="submit" class="button" value="Application Form" /></form> ';
		$i++;
	}
}
else
echo"";}
?>