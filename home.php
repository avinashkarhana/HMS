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
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
 ab{
      font-family:Agency FB;
	  font-size:25px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px grey; 
   } 
    abc{
      font-family:Agency FB;
	  font-size:25px;
	  font-weight:"bold";
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
	  text-shadow:2px 5px 8px yellow; 
}
	#warden_d:hover{
		background-color: #551A8B;
	box-shadow: 2px 3px 8px blue;
	}
	
	#warden_d:after {
    content: "";
    background: #f1f1f1;
    display: block;
    position: absolute;
    opacity: 0;
    transition: all 0.8s
}

#warden_d:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
}

	
	#warden_d{
    background-color: #6534AC;
    border: none;
    color: white;
    padding:7px 8px; 
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
	margin-top: -15px;
}
	#hostel_d{border:2px solid blue;
	  background: cyan;
	  border-radius:40px;
	  box-shadow:8px 4px 7px green;
	  padding:10px;
	  font-size:15px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px yellow; }
 #avinash{
      border:2px solid blue;
	  background: cyan;
	  border-radius:40px;
	  box-shadow:8px 4px 7px green;
	  padding:10px;
	  font-size:15px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px yellow; 
}
avi{
	font-family:Gloucester MT;
	
	font-size:35;
   }
</style>
<script>
function show(){
var x = document.getElementById('hostel_d');
if(x.style.display=="none")
	x.style.display="block";
else
	x.style.display="none";
}
</script>
<title>Hostel management Sysytem</title>
</head>
<body>
<img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemvati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>
<p align='center'><b>(A Central University)</b></p>
<p align="center">
<ax>Hostel management System</ax></p> 
<?php 
include "logincheck.php";

@$user=$_SESSION['user'];
if(!$user)
 header("Location: /hms/index.php");
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

include "conn.php";
@$user=$_SESSION['user'];
$db->query("use hms");
$result=$db->query("select * from students where uidai like'".$user."'");
@$a=mysqli_fetch_assoc($result);
@$aa=mysqli_fetch_assoc($db->query("select * from hostels where Hcode='".$a["Hostel"]."'"));
@$zz=mysqli_fetch_assoc($db->query("select Seat from seats where uidai='".$user."'"));
$hn=mysqli_fetch_assoc($db->query("select * from hostels where Hcode='".$a["Hostel"]."'"));
echo '<abc>User </abc>'.$user.'<table align="right"><tr><td><form action="logout.php" method="POST"><input class="button" type="submit" value="Logout" /></form></td></tr></table><br><table align="center">
<tr><td><form action="home.php" method="POST"><input class="button" type="submit" value="Applicant Details" /></form></td>';
if($a["status"]==2 or $a["status"]==3 or $a["status"]==4)
	echo"";
else
    echo '<td><form action="home_pref.php" method="POST"><input class="button" type="submit" value="Hostel Prefrences" /></form></td>';
if($a["status"]==4 and !$a["seat"])
	echo '<td><form action="seatselect.php" method="POST"><input class="button" type="submit" value="Select Hostel seat" /></form></td>';
else
    echo'';
echo '<td><form action="application_form.php" method="POST"><input class="button" type="submit" value="Application Form" /></form></td><td><form action="changepass.php" method="POST"><input class="button" type="submit" value="Change Password" /></form></td>';
if($a["status"]==4 and $a["seat"])
	echo'<td><form action="helpdesk.php" method="POST"><input class="button" type="submit" value="Help Desk" /></form></td><td><button id="warden_d" onClick="show()"> Warden And caretaker info</button></td>';
echo'</tr></table><div id="hostel_d" style="display:none;">Hostel: <b>'.$aa['Name'].'</b><br>Warden 1 : <b>'.$hn['warden1'].'</b><br>Warden 1 Contact Nos : <b>'.$hn['w1mobile'].'</b><br>Warden 2 : <b>'.$hn['warden2'].'</b><br>Warden 2 Contact Nos : <b>'.$hn['w2mobile'].'</b><br><br>Care-Taker : <b>'.$hn['caretaker'].'</b><br>Care-Taker Contact Nos: <b>'.$hn['ctmobile'].'</b></div>';
if($a["status"]==3 or $a["status"]==4)
{if($a["Hostel"])
{
echo"<div id='avinash'><p>Important :<br><br>Alloted Hostel is <b>".$hn["Name"]."</b><br>";
if($a["status"]==3)
{echo"Please Submit fees amount of Rs.".$hn["fees"]."";}
if($a["seat"])
	echo "Hostel Alloted Seat is <b>".$a["seat"]."</b><br><br>Current Seat is <b>".$zz["Seat"]."</p></div>";
else
    echo "</div>";
}}
else
	echo"";
if($a["status"]==2 or $a["status"]==3 or $a["status"]==4)
	$editable="disabled";
else
	$editable="nodisabled";
if($editable=="nodisabled")
	$pic_edit_visible="block";
else
	$pic_edit_visible="none";
echo'<br><br><table border=2px width="70%" align="center">
<tr><td><ab>Photo</ab></td><td><img src="/hms/img/'.$user.'p.jpg" /><aq style="display:'.$pic_edit_visible.'"><br>Upload photo(max. size 80kb)<br><form action="upload.php" method="POST" enctype="multipart/form-data"><input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="p" /><input type="file" id="file" name="file" /><input class="button" type="submit" value="Upload" /></form></aq></td></tr>
<tr><td><ab>Sign</ab></td><td><img src="/hms/img/'.$user.'s.jpg" /><br><aq style="display:'.$pic_edit_visible.'">Upload sign(max. size 20kb)<br><form action="upload.php" method="POST" enctype="multipart/form-data"><input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="s" /><input type="file" id="file" name="file" /><input class="button" type="submit" value="upload" /></form></aq></td></tr>
<tr><td><ad><form action="homeregsave.php" method="POST">
<ab>Name</ab></td><td><select name="Sex" id="sex" selected="'.@$a[Sex].'" '.$editable.' required><option value="Male">Mr.</option><option value="Female">Ms.</option></select><input type="text" '.$editable.' name="Name" value="'.@$a[Name].'" autocomplete="on" autofocus required/></td></tr>
<tr><td><ab>Aadhar Number(Username)</ab></td><td><input type="number" max="999999999999" min="100000000000" "false" name="uidai" value="'.@$a[uidai].'" '.$editable.' required autocomlete="on" /></td></tr>
<tr><td><ab>Mobile</ab></td><td><input type="number"  max="9999999999" min="7000000000" name="Phone" value="'.@$a[Mobile].'" required autocomlete="on" /></td></tr>
<tr><td><ab>Category</ab></td><td> 
<select name="Category" '.$editable.' id="Category" required>';
$result=$db->query('select Category from students where uidai="'.$user.'"');
$row1=mysqli_fetch_assoc($result);
$obc="OBC";
$sc="SC";
$st="ST";
$gen="GEN";
if($row1[Category]==$gen)
	  echo"<option value='".$gen."' selected >GEN</option>";
else
	  echo"<option value='".$gen."'>GEN</option>";
if($row1[Category]==$obc)
	  echo"<option value='".$obc."' selected >OBC</option>";
else
	  echo"<option value='".$obc."'>OBC</option>";
if($row1[Category]==$sc)
	  echo"<option value='".$sc."' selected >SC</option>";
else
	  echo"<option value='".$sc."'>SC</option>";  
if($row1[Category]==$st)
	  echo"<option value='".$st."' selected >ST</option>";
else
	  echo"<option value='".$st."'>ST</option>";
echo '</select></td></tr>
<tr><td><ab>Email</ab></td><td><input type="email" '.$editable.' name="Email" value="'.@$a[email].'" size=30 required autocomlete="on" /></td></tr>
<tr><td><ab>Course</ab></td><td> 
<select name="Course" '.$editable.' id="Course" selected="'.@$a[Course].'" required>';
include "conn.php";
$db->query("use hms");
$crs=$db->query("select Course from students where uidai=".$user."");
$c=mysqli_fetch_assoc($crs);
$result=$db->query("select Course_code,Course_name from courses");
while($row=mysqli_fetch_assoc($result)){
	if($row[Course_code]==$c[Course])
       echo"<option value='".$row[Course_code]."' selected>".$row[Course_name]."</option>";
    else
	   echo"<option value='".$row[Course_code]."'>".$row[Course_name]."</option>";

}
$t=date("Y");
echo "</select></td></tr>
<tr><td><ab>Batch</ab></td><td><input type='number' ".$editable." name='Batch' min='1998' max='".$t."' value='".@$a[Batch]."' required autocomlete='on' />(eg. 2001)</td></tr>
<tr><td><ab>UG(for PG applicants)/10+2(for UG applicants) Marks Details </ab></td><td>Obtained Marks :<input type='number' ".$editable." name='omarks'  value='".@$a[omarks]."' required /><br>Total Marks :<input type='number' name='tmarks' ".$editable."  value='".@$a[tmarks]."'  required/>(Percentage[%] from this will be automatically calculated after save.)</td></tr>		
<tr><td><ab>Percentage</ab></td><td>".@$a[percentage]."%(Calculated from given marks)</td></tr>
<tr><td><ab>Father's Name</ab></td><td><input type='text' name='Fname' ".$editable." value='".@$a[Fname]."' required /></td></tr>
<tr><td><ab>Mother's Name</ab></td><td><input type='text' name='Mname' ".$editable." value='".@$a[Mname]."' required /></td></tr>
<tr><td><ab>Address</ab></td><td><input type='text' name='Address' ".$editable."  value='".@$a[Address]."' size=52 required /></td></tr>
<tr><td><ab>Gardian's Mobile</ab></td><td><input type='number' max='99999
99999' min='7000000000' name='Gmobile' value='".@$a[Gmobile]."' required /></td></tr></table><br> <input type='hidden' name='user' value='".$user."' />
<p align='center'><input class='button' type='submit' Value='Save' /></p>
</form>";
echo"<br><br>Form Status : ".$a['status']."<br><font size=5 face='Agency FB'>If Status=0 then you have not agreed to form ,agree to it after filling outl all details and prefrence<br>If Status=1 then you have agreed to form ,but not verified by admin wait for verification<br>If Status=2 then you have not agreed to form and its also verified by admin<br>If Status=3 you have been alloted hostel but fee has not been paid<br>If Status=4 you have been alloted hostel And fee has been paid</font>";
?>
</body>
</html>