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
avi{
	font-family:Gloucester MT;
	
	font-size:35;
   }
avinash{
        font-family:Agency FB;
	    text-shadow:2px 4px 3px cyan;
	    font-size:25;
	   }	
</style>
</head>
<body>
<?php
@$noticeread=$_GET['noticeread'];
if($noticeread!=="yes")
{
echo "<div style='position:absolute;border-color:red;left:10%;top:10%; height:80%;width:80%; z-index:10;padding:10px; background-color:cyan; border-radius:30px;box-shadow:4px 8px 9px 6px grey'>
<p align='right'><a href='application_form.php?noticeread=yes' alt='Close'><img src='img/close_icon.png' /></a></p>
<p align='center'><U><b><avinash>Important Notice</avinash></b></U></p><br>
Please read these instructions carefully :<br>

For application form verification applicant must submit a hardcopy of this application form with respective document's hardcopy, failing to do this will lead to cancellation of application.<br>
<br>
•> Documents <br>
    1.) Cast Certificate<br>
    2.) UG Score Card (for PG applicanta)  or  10+2 score card (for UG applicants)<br>
    3.) Addhar Card<br>
    4.) University ID card or Course / Admission fee slip.<br>
<br>
<avik>**Applicant must submit these document's hardcopy and print of this application form as per given time for last date of application after that date no form verification will be entertained.
</avik><br><br>
Application form will be visible after you close this NOTICE.
<br>•To take print out of this application form press 'CTRL+P'.

</div>";
}
?>
<div style="position: relative;
width:100%;height:100%; z-index:5;">

<?php
include "logincheck.php";

@$user=$_SESSION['user'];
if(!$user)
 echo"*";
else
{
	include"conn.php";
	$db->query("use hms");
	$b=$db->query("select user from users");
	while($row=mysqli_fetch_assoc($b))
	{
		if($user==$row['user'])
			header("Location: /hms/warlogin.php");
	}
}

@$user=$_SESSION['user'];
include "conn.php";
$db->query("use hms");
$result=$db->query("select * from students,courses where students.course = courses.Course_code AND uidai='".$user."'");
while($row=mysqli_fetch_assoc($result))
{
$p1=mysqli_fetch_assoc($db->query("select Name from hostels where Hcode='".$row["p1"]."'"));
$p2=mysqli_fetch_assoc($db->query("select Name from hostels where Hcode='".$row["p2"]."'"));
$p3=mysqli_fetch_assoc($db->query("select Name from hostels where Hcode='".$row["p3"]."'"));
$ss=@$row["Sex"];
if($ss=="M")
{$s="son";}	
else
	$s="daughter";
echo '
<img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemvati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>';
$sign="img/".$user."s.jpg";
echo"<p align='center'><b>(A Central University)</b></p><br>
<p align='center'><avinash>Hostel Application Form-2016</avinash></p><br>
<table align='center' border='1px'>
<tr>
  <td>Name of the student
  </td>
  <td>".@$row[Name]."
  </td>
  <td width='165' rowspan='15' valign='top'>
  <img src='img/".$user."p.jpg' height='180' width='140'>
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
 </tr><tr>
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
$date=@$row[Date];
if($row["status"]==0)
{  echo'<form action="iagree.php" method="POST"><input type="submit" class="button" value="I Agree" /> <input type="hidden" name="user" value="'.$user.'"></form>';}
else
	echo"Date and time: ".$date."";
echo'<p align="right"><img src="'.$sign.'" align="right"></p><br><br><br><p align="right">Signature of the Student</p>'; 
echo"<table align='right'><tr><td>Name:</td><td>".@$row[Name]."</td></tr></table><br>
<p align='right'>(Application not
signed by the candidate liable to be rejected.)</p>
<p align='right'>Verified by</p>
<p align='center'>Signature of Cheif Warden</p>";}
?></body>
</html>