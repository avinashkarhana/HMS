<html>
<head>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<title>Application Form</title>
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

avi{
	font-family:Gloucester MT;
	text-shadow:2px 4px 3px green;
	font-size:35;
   }
avinash{
        font-family:Agency FB;
	    text-shadow:2px 4px 3px cyan;
	    font-size:25;
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
</style>
</head>
<body>
<?php
include "logincheck.php";

@$user=$_SESSION['user'];
if(!$user)
 echo"*";
else
{
	include"conn.php";
	$db->query("use hms");
	$a=$db->query("select uidai from students");
	while($row=mysqli_fetch_assoc($a))
	{
		if($user==$row['uidai'])
			header("Location: /hms/home.php");
	}
}

@$uidai=$_POST["uidai"];
if($uidai){
include "conn.php";
$db->query("use hms");
$result=$db->query("select * from students,courses where students.course = courses.Course_code AND uidai='".$uidai."'");
while($row=mysqli_fetch_assoc($result))
{
$p1=mysqli_fetch_assoc($db->query("select Name from hostels where Hcode='".$row["p1"]."'"));
$p2=mysqli_fetch_assoc($db->query("select Name from hostels where Hcode='".$row["p2"]."'"));
$p3=mysqli_fetch_assoc($db->query("select Name from hostels where Hcode='".$row["p3"]."'"));
$ss=@$row[Sex];
if($ss=="M")
{$s="son";}	
else
{$s="daughter";}
echo '<img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemvati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>';
$sign="img/".$uidai."s.jpg";
echo"<p align='center'><b>(A Central University)</b></p><br>
<p align='center'><avinash>Hostel Application Form-2016</avinash></p><br>
<table align='center' border='1px'>
<tr>
  <td>Name of the student
  </td>
  <td>".@$row[Name]."
  </td>
  <td width='165' rowspan='15' valign='top'>
  <img src='img/".$uidai."p.jpg' height='180' width='140'>
  </td>
 </tr>
  <tr>
  <td>Father's Name
  </td>
  <td>".@$row[Fname]."
  </td>
 </tr>
 <tr>
  <td>Mother's Name
  </td>
  <td>".@$row[Mname]."
  </td>
 </tr>
 <tr>
  <td>Course
  </td>
  <td>".@$row[Course_name]."
  </td>
 </tr>
 <tr>
  <td>Batch
  </td>
  <td>".@$row[Batch]."
  </td>
 </tr>
 <tr><td>Permanent Address
  </td>
  <td>".@$row[Address]."
  </td>
 </tr>
  <td>Gaurdian's Mobile
  </td>
  <td>".@$row[Gmobile]."
  </td>
 </tr>
 <tr>
  <td>Sex
  </td>
  <td>".@$row[Sex]."
  </td>
 </tr>
 <tr>
  <td>
  Cast Category
  </td>
  <td>".@$row[Category]."
  </td>
 </tr>
 <tr>
  <td>UIDAI
  </td>
  <td>".@$row[uidai]."
  </td>
 </tr>
 <tr>
  <td>Email
  </td>
  <td>".@$row[email]."
  </td>
 </tr><tr>
 <td>Mobile
  </td>
  <td>".@$row[Mobile]."
  </td></tr>
</tbody></table><br><p align='center'><avinash>Hostel Prefrences</avinash></p>
<table align='center' border=1><tr><th>Preference 1</th><th>Preference 2</th><th>Preference 3</th></tr>
<tr><td>".$p1['Name']."</td><td>".$p2['Name']."</td><td>".$p3['Name']."</td></tr></table>
<p align='center'>Declaration:</p>
<p>I <b>".@$row[Name]."</b> ".$s." of <b>".@$row[Fname]." </b> hereby declare that all
the statements and entries made in this application are true, complete and
correct to the best of my knowledge and belief. In the event of any information
being found false or incorrect or ineligibility being detected 
my Application may be cancelled, by the Authorities.</p><br>";
$vdate=$row['vdate'];
$status=@$row[status];
if($user=="admin")
{
if($status=="2"or $status=="3" or $status=="4")
{ echo"Date and time: ".$vdate."<br>Verified";  }
else
{ 
echo'<form action="verify.php" method="POST"><input type="hidden" name="uidai" value="'.$uidai.'"><input type="submit" class="button" value="Verify" /></form>'; }}
else
{
if($status=="2"or $status=="3" or $status=="4")
  echo "Date and time: ".$vdate."<br><b>Verified</b>";
else
  echo "<b>Not Verified Yet</b>";
}
echo'<p align="right"><img src="'.$sign.'" align="right"></p><br><br><br><p align="right">Signature of the Student</p><br>'; 
echo"<table align='right'><tr><td>Name</td><td>".@$row[Name]."</td></tr></table><br>
<p align='right'>(Application not
signed by the candidate liable to be rejected.)</p><br>
<p align='right'>Verified by</p><br>
<p align='center'>Signature of Cheif Warden</p>";}
}
else
	echo"Please go back and select a student.";
?></body>
</html>