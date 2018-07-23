<html>
<head>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" /><title>Register</title>
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

 ab{
      font-family:Agency FB;
	  font-size:25px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px grey; 
   } 
 ac{
      font-family:Comic Sans;
	  font-size:40px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px gold; 
   }  
   avi{
	font-family:Gloucester MT;
	text-shadow:2px 4px 3px green;
	font-size:35;
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
<img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemvati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>
<p align='center'><b>(A Central University)</b></p><br><br><br><br>
<p align="center"><ac>Register for Hostel Allotment</ac></p><hr solid>
<form action="reg.php" method="POST">
<table align="center">
<tr><td><ab>Name</ab></td><td><select name="sex" id="sex" required><option value="Male">Mr.</option><option value="Female">Ms.</option></select><input type="text" name="Name" autocomplete="on" autofocus required/></td></tr>
<tr><td><ab>Aadhar Number(Username)</ab></td><td><input type="number" max="999999999999" min="100000000000" name="uidai" placeholder="12 digit UIDAI" required autocomlete="on" /></td></tr>
<tr><td><ab>Password</ab></td><td><input type="password" name="pass" autocomplete="no" placeholder="********" required /></td></tr>
<tr><td><ab>Mobile</ab></td><td><input type="number" max="9999999999" min="7000000000" name="Phone" required autocomlete="on" /></td></tr>
<tr><td><ab>Category</ab></td><td> 
<select name='Category' id='Category' required>
<option value="GEN">GEN</option>
<option value="OBC">OBC</option>
<option value="SC">SC</option>
<option value="ST">ST</option>
</select></td></tr>
<tr><td><ab>Email</ab></td><td><input type="email" name="Email" required autocomlete="on" /></td></tr>
<tr><td><ab>Course</ab></td><td> 
<select name='Course' id='Course' required>
<option value="Nil">Select one</option>
<?php
include "conn.php";
$db->query("use hms");
$result=$db->query("select Course_code,Course_name from courses");
while($row=mysqli_fetch_assoc($result)){
    echo"<option value='".$row[Course_code]."'>".$row[Course_name]."</option>";
	$today=date("Y");
}
?>
</select></td></tr>
<tr><td><ab>Batch Start Year</ab></td><td><input type="number" min="1997"<?php echo'max="'.$today.'"'; ?>name="Batch" required autocomlete="on" />(eg. 2001)</td></tr>		
<tr><td><ab>UG(for PG applicants)/10+2(for UG applicants) Marks Details </ab></td><td>Obtained Marks :<input type="number" name="omarks" required /><br>Total Marks :<input type="number" name="tmarks" required/>(Percentage[%] from this will be automatically calculated.)</td></tr>

<!--- Omarks<tmarks javascript --->
<script>

</script>

</table><br><p align="center"><input class="button" type="submit" Value="Register" /></p>
<?php
@$user=$_SESSION['user'];
if(!$user)
echo "";
else
{
	include"conn.php";
	$db->query("use hms");
	$a=$db->query("select uidai from students");
	$b=$db->query("select user from users");
	while($row=mysqli_fetch_assoc($a))
	{
		if($user==$row['uidai'])
			header("Location: /hms/home.php");
		else
			echo "";
	}
	while($row1=mysqli_fetch_assoc($b))
	{
	if($user==$row1['user'])
		    header("Location: /hms/warlogin.php");
	else
			echo "";	
	}
} 
?>
</form>
</body>
</html>