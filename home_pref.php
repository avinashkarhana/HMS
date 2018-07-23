<html>
<head>
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
 ab{
      font-family:Agency FB;
	  font-size:25px;
	  font-weight:"bold";
	  margin-right:120px;
	  text-shadow:2px 5px 8px grey; 
   } 
    abc{
      font-family:Agency FB;
	  font-size:25px;
	  font-weight:"bold";
	  margin-right:10px;
	  text-shadow:2px 5px 8px grey; 
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
avi{
	font-family:Gloucester MT;
	text-shadow:2px 4px 3px green;
	font-size:35;
   }
</style>
<title>Hostel management Sysytem</title>
</head>
<body>
<img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemvati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>
<p align='center'><b>(A Central University)</b></p><br>
<p align="center">
<ax>Hostel management System</ax></p><br><br><br> 
<?php 
include "logincheck.php";
@$user=$_SESSION['user'];
echo '<abc>User</abc>'.$user.'<table align="right"><tr><td><form action="logout.php" method="POST"><input type="submit" class="button" value="Logout" /></form></td></tr></table><br><table align="center">
<tr><td><form action="home.php" method="POST"><input type="submit" class="button" value="Applicant Details" /></form></td><td><form action="home_pref.php" method="POST"><input type="submit" class="button" value="Hostel Prefrences" /></form></td><td><form action="application_form.php" method="POST"><input type="submit" class="button" value="Application Form" /></form></td></tr>
</table>';
echo "<br><br><p align='center'><ab>Fill Hostel Prefrences :</ab></p>"; ?>
<form action="pref_sv.php" method="POST">
<table align="center">
<tr><td><ab>Prefrence 1</ab></td><td>
<?php
include "conn.php";
$db->query("use hms");
$p=$db->query('select p1,p2,p3 from students where uidai like"'.$user.'"');
$r=mysqli_fetch_assoc($p); 
echo '<select name="pref1" id="pref1" required >';
?>
<?php
$p1=$db->query('select Sex from students where uidai like"'.$user.'"');
$r1=mysqli_fetch_assoc($p1);
$result=$db->query('select Hcode,Name from hostels where type="'.$r1[Sex].'"');
while($row1=mysqli_fetch_assoc($result)){
	if($row1[Hcode]==$r[p1])
	  echo"<option value='".$row1[Hcode]."' selected>".$row1[Name]."</option>";
    else
	  echo"<option value='".$row1[Hcode]."'>".$row1[Name]."</option>";
}
?>
</select></td></tr><br>
<tr><td><ab>Prefrence 2</ab></td><td>
<?php
include "conn.php";
$db->query("use hms");
$p=$db->query('select p1,p2,p3 from students where uidai like"'.$user.'"');
$r=mysqli_fetch_assoc($p); 
echo '<select name="pref2" id="pref2" required >';
?>
<?php
$p1=$db->query('select Sex from students where uidai like"'.$user.'"');
$r1=mysqli_fetch_assoc($p1);
$result=$db->query('select Hcode,Name from hostels where type="'.$r1[Sex].'"');
while($row1=mysqli_fetch_assoc($result)){
	if($row1[Hcode]==$r[p2])
	  echo"<option value='".$row1[Hcode]."' selected>".$row1[Name]."</option>";
    else
	  echo"<option value='".$row1[Hcode]."'>".$row1[Name]."</option>";
}
?>
</select></td></tr><br>
<tr><td><ab>Prefrence 3</ab></td><td>
<?php
include "conn.php";
$db->query("use hms");
$p=$db->query('select p1,p2,p3 from students where uidai like"'.$user.'"');
$r=mysqli_fetch_assoc($p); 
echo '<select name="pref3" id="pref3" required >';
?>
<?php
$p1=$db->query('select Sex from students where uidai like"'.$user.'"');
$r1=mysqli_fetch_assoc($p1);
$result=$db->query('select Hcode,Name from hostels where type="'.$r1[Sex].'"');
while($row1=mysqli_fetch_assoc($result)){
	if($row1[Hcode]==$r[p3])
	  echo"<option value='".$row1[Hcode]."' selected>".$row1[Name]."</option>";
    else
	  echo"<option value='".$row1[Hcode]."'>".$row1[Name]."</option>";
}
?>
</select></td></tr><br></table><br><?php
echo'<input type="hidden" name="user" value="'.$user.'" />';?>
<p align="center"><input type="submit" class="button" value="Update" /></p>
</form>
</body>
</html>