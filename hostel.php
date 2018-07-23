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
echo '<abc>User :  </abc>'.$user.'<table align="right"><tr><td><form action="logout.php" method="POST"><input type="submit" class="button" value="Logout" /></form></td></tr></table>';
echo"_warden";
echo '<br><br><br><table align="center">
<tr><td><form action="warlogin.php" method="POST"><input type="submit" class="button" name="Student" value="Student Search" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="Verified" value="Verified List" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="Applicants" value="All Applicants" /></form></td><td><form action="hostel.php" method="POST"><input type="submit" class="button" name="hostel" value="Rooms Details And Vacant Seats" /></form></td><td><form action="seat_swap.php" method="POST"><input type="submit" class="button" name="swap" value="Hostel Rooms Swap" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="all" value="All students in Hostel" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="cstudents" value="Particular Course Students" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="lastyr" value="Final year student list and seat clearing" /></form></td><td><form action="" method="POST"><input type="submit" class="button" name="feenotpaid" value="Fee Defaulters" /></form></td></tr>
</table><form action="reports.php" method="POST"><input class="button" type="submit" value="Reports Section" /></form>';
$user=strtoupper($user);
echo '<table align="left"><tr><form action="" method="POST">
<td>Select a Room for details :</td><td>
<select name="seat" >';
include "conn.php";
@$seat=$_POST['seat'];
$db->query("use hms");
$st=$db->query("select Seat from seats where Hcode like '".$user."'");
$i=1;
$n=1;
while($c=mysqli_fetch_assoc($st)){
$n++;
}
while($i<$n/2)
{   if($seat==$i)
	    echo"<option value='".$i."' selected>".$i."</option>";
    else
		echo"<option value='".$i."'>".$i."</option>";
	$i++;
}
echo '</select></td>
<tr><td><p align="left"><input type="submit" class="button" Value="Search" /></td></tr></p>
</form></tr></table>
<table align="right">
<tr><td><form action="" method="POST"><input type="submit" class="button" name="vacant" value="Vacant Seats" /></form></td></tr>
</table><br><br><br>
<hr><hr>';
@$vacant=$_POST['vacant'];
if($vacant)
{
	 echo "<p align='center'><bb>Vacant Seats :  </bb>";
     include "conn.php";
     $usedatabase=$db->query("use hms");
     $avi=mysqli_query($db,"select Seat from seats where uidai like '' AND Hcode like '".$user."' ");$x=0;$y="No Seats";
	 while($ak=mysqli_fetch_assoc($avi)){ $x=$x+1; $y=$x; }
	 echo $y."<hr width=30% solid cyan></p><p align='center'>For Name wise checking of vacant Seat please use seat swap button to Check.</p>";
}
if($seat)
{
	
 echo "<p align='center'><ab>Search Results</ab></p><hr width=30% solid cyan>";
include "conn.php";
$usedatabase=$db->query("use hms");
 $sql3=mysqli_query($db,"select uidai from seats where Seat='".$seat."A' ");
 $sql4=mysqli_query($db,"select uidai from seats where Seat='0".$seat."A' ");
 $sql99=mysqli_query($db,"select uidai from seats where Seat='".$seat."B' ");
 $sql88=mysqli_query($db,"select uidai from seats where Seat='0".$seat."B' ");
 
 while($row3=mysqli_fetch_assoc($sql3))
 {	 
 $sql="SELECT * FROM students WHERE uidai='".$row3["uidai"]."'";
 @$result=mysqli_query($db,$sql);
 
 if(@mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result))
	{
	$sql2=mysqli_query($db,'select Course_name,Duration from courses where Course_code="'.$row["course"].'"');
	$row2=mysqli_fetch_assoc($sql2);
	echo "<br><table align='right'><tr><td><img src='/hms/img/".$row["uidai"]."p.jpg' alt='".$row["Name"]."'><form action='student_application_form.php' method='POST'><input type='hidden' name='uidai' value='".$row['uidai']."' /><input type='submit' class='button'  value='Application Form' /></form><form action='clrseat.php' method='POST'><input type='hidden' name='uidai' value='".$row['uidai']."' /><input type='submit' class='button'  value='Clear this Seat' /></form></td></tr></table><br>Room Number : ".$seat."<br>Name : ".$row["Name"]."<br>Phone : ".$row["Mobile"]."<br>Email : ".$row["email"]."<br>UIDAI : ".$row["uidai"]."<br>Address : ".$row["Address"]."<br>Course : ".$row["course"]." ".$row2["Course_name"]."(".$row2["Duration"]." years )<br>Batch : ".$row["Batch"]."<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	}	
}

else
	echo '';
}
 while($row4=mysqli_fetch_assoc($sql4))
 {	 
 $sql5="SELECT * FROM students WHERE uidai='".$row4["uidai"]."'";
 $result5=mysqli_query($db,$sql5);
 if(@mysqli_num_rows($result5)>0){
	while($row1=mysqli_fetch_assoc($result5))
	{
		$sql2=mysqli_query($db,'select Course_name,Duration from courses where Course_code="'.$row1["course"].'"');
	$row2=mysqli_fetch_assoc($sql2);
	echo "<br><table align='right'><tr><td><img src='/hms/img/".$row1["uidai"]."p.jpg' alt='".$row1["Name"]."'><form action='student_application_form.php' method='POST'><input type='hidden' name='uidai' value='".$row1['uidai']."' /><input type='submit' class='button'  value='Application Form' /></form><form action='clrseat.php' method='POST'><input type='hidden' name='uidai' value='".$row4['uidai']."' /><input type='submit' class='button'  value='Clear this Seat' /></form></td></tr></table><br>Room Number : ".$seat."<br>Name : ".$row1["Name"]."<br>Phone : ".$row1["Mobile"]."<br>Email : ".$row1["email"]."<br>UIDAI : ".$row1["uidai"]."<br>Address : ".$row1["Address"]."<br>Course : ".$row1["course"]." ".$row2["Course_name"]."(".$row2["Duration"]." years )<br>Batch : ".$row1["Batch"]."<br><br><br><br><br><br>";
	}	
}

else
	echo '';

}
while(@$row99=mysqli_fetch_assoc($sql99))
 {	 
 $sql9="SELECT * FROM students WHERE uidai='".$row99["uidai"]."'";
 @$result9=mysqli_query($db,$sql9);
 
 if(@mysqli_num_rows($result9)>0){
	while($row9=mysqli_fetch_assoc($result9))
	{
		$sql2=mysqli_query($db,'select Course_name,Duration from courses where Course_code="'.$row9["course"].'"');
	$row2=mysqli_fetch_assoc($sql2);
	echo "<br><table align='right'><tr><td><img src='/hms/img/".$row9["uidai"]."p.jpg' alt='".$row9["Name"]."'><form action='student_application_form.php' method='POST'><input type='hidden' name='uidai' value='".$row9['uidai']."' /><input type='submit' class='button'  value='Application Form' /></form><form action='clrseat.php' method='POST'><input type='hidden' name='uidai' value='".$row99['uidai']."' /><input type='submit' class='button'  value='Clear this Seat' /></form></td></tr></table><br>Room Number : ".$seat."<br>Name : ".$row9["Name"]."<br>Phone : ".$row9["Mobile"]."<br>Email : ".$row9["email"]."<br>UIDAI : ".$row9["uidai"]."<br>Address : ".$row9["Address"]."<br>Course : ".$row9["course"]." ".$row2["Course_name"]."(".$row2["Duration"]." years )<br>Batch : ".$row9["Batch"]."<br><br><br><br><br><br>";
	}	
}

else
	echo '';
}
while(@$row88=mysqli_fetch_assoc($sql88))
 {	 
 $sql="SELECT * FROM students WHERE uidai='".$row88["uidai"]."'";
 @$result8=mysqli_query($db,$sql);
 
 if(@mysqli_num_rows($result8)>0){
	while($row8=mysqli_fetch_assoc($result8))
	{
		$sql2=mysqli_query($db,'select Course_name,Duration from courses where Course_code="'.$row8["course"].'"');
	$row2=mysqli_fetch_assoc($sql2);
	$sql2=mysqli_query($db,'select Course_name,Duration from courses where Course_code="'.$row8["course"].'"');
	$row2=mysqli_fetch_assoc($sql2);
	echo "<br><table align='right'><tr><td><img src='/hms/img/".$row8["uidai"]."p.jpg' alt='".$row8["Name"]."'><form action='student_application_form.php' method='POST'><input type='hidden' name='uidai' value='".$row8['uidai']."' /><input type='submit' class='button'  value='Application Form' /></form><form action='clrseat.php' method='POST'><input type='hidden' name='uidai' value='".$row8['uidai']."' /><input type='submit' class='button'  value='Clear this Seat' /></form></td></tr></table><br>Room Number : ".$seat."<br>Name : ".$row8["Name"]."<br>Phone : ".$row8["Mobile"]."<br>Email : ".$row8["email"]."<br>UIDAI : ".$row8["uidai"]."<br>Address : ".$row8["Address"]."<br>Course : ".$row8["course"]." ".$row2["Course_name"]."(".$row2["Duration"]." years )<br>Batch : ".$row8["Batch"]."<br><br><br><br><br><br>";
	}	
}

else
	echo '';
}
}
else
	mysqli_close($db);
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
	echo "<table align='right'><tr><td><img src='/hms/img/".$row["uidai"]."p.jpg' alt='".$row["Name"]."'><form action='student_application_form.php' method='POST'><input type='hidden' name='uidai' value='".$row['uidai']."' /><input type='submit' class='button'  value='Application Form' /></form></td></tr></table><br>Hostel : ".$row["Hostel"]."<br>Hostel Room : ".$row["seat"]."<br>Name : ".$row["Name"]."<br>Phone : ".$row["Mobile"]."<br>Email : ".$row["email"]."<br>UIDAI : ".$row["uidai"]."<br>Address : ".$row["Address"]."<br>Course : ".$row["course"]." ".$row2["Course_name"]."(".$row2["Duration"]." years )<br>Batch : ".$row["Batch"]."<br>Status : ".$row["status"]."<br>Category : ".$row["Category"]."<br><br><br>";
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