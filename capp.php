<html><head><style>
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
   } </style><title>
<?php 
include "logincheck.php";
@$ec=$_POST['ec'];
@$cc=$_POST['cc'];
@$dfc=$_POST['dfc'];
@$scc=$_POST['scc'];
@$sgc=$_POST['sgc'];
@$sc=$_POST['sc']; 
$x=0;
if($ec)
{
 echo "Electricity Complaint";
 $x=1;
 $y="Electric";
}
elseif($cc)
{
 echo "Civi Complaint";
 $x=2;
 $y="Civil related";
}
elseif($dfc)
{
 echo "Damaged furniture Complaint";
 $y="Damaged furniture related";
 $x=6;
}
elseif($scc)
{
 echo "Sweeping And Cleanin Complaint";
 $y="Sweeping and Cleanin related";
 $x=7;
}
elseif($sgc)
{
 echo "Sports and Gam Equipment Complaint";
 $y="Sports and Gam Equipment related";
 $x=8;
}
elseif($sc)
{
 echo "Security Related Complaint";
 $y="Security Related";
 $x=9;
}
else
 echo"Complaint Report And Application Section";
?>
</title></head><Body>
<?php
@$ec=$_POST['ec'];
@$cc=$_POST['cc'];
@$dfc=$_POST['dfc'];
@$scc=$_POST['scc'];
@$sgc=$_POST['sgc'];
@$sc=$_POST['sc'];
if(!$ec && !$cc && !$dfc && !$scc && !$sgc && !$sc)
    { 
      if($user!='admin')
	  {
      echo "<abc>Complaint Report And automated Complaint Application Generator</abc><br><br><br>
      <table align='left'><tr>
	  <td><form action='' target ='left' method='POST'><input type='submit' class='button' name='ec' value='Eclectricity Related' /></form></td>
	  <td><form action='' target ='left' method='POST'><input type='submit' class='button' name='cc' value='Civil Related' /></form></td> 
	  <td><form action='' target ='left' method='POST'><input type='submit' class='button' name='dfc' value='Damaged Furniture Related' /></form></td> 
	  <td><form action='' target ='left' method='POST'><input type='submit' class='button' name='scc' value='sweeping And Cleaning Related' /></form></td> 
	  <td><form action='' target ='left' method='POST'><input type='submit' class='button' name='sgc' value='Sports And Game Equipment Related' /></form></td> 
	  <td><form action='' target ='left' method='POST'><input type='submit' class='button' name='sc' value='Security Related' /></form></td>
	  <td><form action='' target ='left' method='POST'><input type='submit' class='button' name='sc' value='Other' /></form></td>
      </tr></table><p align='right'>User : ".$user."</p><p align='right'>Hostel : ".strtoupper($user)."</p>";
	  }
	  else
	  {
		  @$hostelc=$_POST['hostelc'];
            if(!$hostelc)
			{
				echo '<form action="" method="POST"><table align="left"><tr>
				<td>Select a Hostel:</td><td>
				<select name="hostelc" >';
				include "conn.php";
				$db->query("use hms");
				$st=$db->query("select Hcode,Name from hostels");
				while($c=mysqli_fetch_assoc($st))
				{
					if($c['Hcode']==$hostelc)
					{
						echo"<option value='".$c['Hcode']."' selected>".$c['Name']."</option>";
					}
					else
					{
						echo"<option value='".$c['Hcode']."'>".$c['Name']."</option>";
					}
					
				}
				echo '</select></td></tr></table><br><p align="left"><input type="hidden" name="cstudents" value="cstudents"><input type="submit" class="button" name="hostelset" Value="Select" /></p></form>';
	        } 
			if($hostelc)
			{ 
			  echo "<abc>Complaint Report And automated Complaint Application Generator</abc><br><br><br>
			  <table align='left'><tr>
			  <td><form action='' target ='left' method='POST'><input type='submit' class='button' name='ec' value='Eclectricity Related' /><input type='hidden' name='hcode' value='".$hostelc."' /></form></td>
			  <td><form action='' target ='left' method='POST'><input type='submit' class='button' name='cc' value='Civil Related' /><input type='hidden' name='hcode' value='".$hostelc."' /></form></td> 
			  <td><form action='' target ='left' method='POST'><input type='submit' class='button' name='dfc' value='Damaged Furniture Related' /><input type='hidden' name='hcode' value='".$hostelc."' /></form></td> 
			  <td><form action='' target ='left' method='POST'><input type='submit' class='button' name='scc' value='Sweeping And Cleaning Related' /><input type='hidden' name='hcode' value='".$hostelc."' /></form></td> 
			  <td><form action='' target ='left' method='POST'><input type='submit' class='button' name='sgc' value='Sports And Game Equipment Related' /><input type='hidden' name='hcode' value='".$hostelc."' /></form></td> 
			  <td><form action='' target ='left' method='POST'><input type='submit' class='button' name='sc' value='Security Related' /><input type='hidden' name='hcode' value='".$hostelc."' /></form></td>
			  </tr></table><p align='right'><abc>User :</abc> ".$user."</p><p align='right'><abc>Hostel : </abc>".$hostelc."</p>";
            }
					
	  
      }
	} 
else
    {    if($user='admin')
           $hcode=$_POST['hcode'];
	     else
		   $hcode=strtoupper($user);
         include "conn.php";
		 $usedatabase=$db->query("use hms");
		 $hn="SELECT * FROM hostels WHERE Hcode='".$hcode."'";
		 $hostelname=mysqli_fetch_assoc(mysqli_query($db,$hn));
		 if($hostelname['Type']=='M')
		 {$d='Sir';}
		 else
		 {$d='Madam';}
		 echo"<p align='left'>
		     To<br><br>
			 The Warden<br>
			 ".$hostelname['Name']."<br>
			 HNB Garhwal University, Srinagar (Garhwal)<br><br>
			 Subject : Complaints regarding ".$y." problems.<br><br>
             Respected ".$d."<br><br>
             This is to inform you about a problem we are facing in hostel.We request you to have a look at this and take appropriate steps to solve this out.<br>Details of problem are given below.<br>Hoping for a positive outcome.<br><br>
             Yours sincerely<br><br>
             Hostel resident students<br><br></p>
             ";
			if($x=='1' || $x=='2')
			{
			 include "conn.php";
			 $db->query("use hms");
             $v=mysqli_query($db,"SELECT c_code , ctype FROM complaint_type where c_cat='".$x."'");		 
             while($c=mysqli_fetch_assoc($v))
             {	include "conn.php";
                $db->query("use hms");
			    $as="SELECT * FROM complaints where type='".$c['c_code']."' AND Hcode='".$hcode."'";
                $q=$db->query($as);
				$zz=mysqli_num_rows($q);
				if($zz>0)
				{
			    $i=1;		 
				echo"".$c['ctype']." :<br>			 
				 <table border=1><tr><th>S.No</th><th>Complaint Number</th><th>Compliant type</th><th>Description</th><th>Student Name</th><th>Room 
				 Number</th><th>Student's number</th></tr>";
			 
			  while($w=mysqli_fetch_assoc($q))
			  {  
		         include "conn.php";
				 $db->query("use hms");
				 $m=mysqli_fetch_assoc($db->query("SELECT Seat FROM seats where uidai='".$w['uidai']."'"));
				 $a=mysqli_fetch_assoc($db->query("SELECT Name,Mobile FROM students where uidai='".$w['uidai']."'"));
				 echo"<tr><td>".$i."</td><td>".$w['serial']."</td><td>".$c['ctype']."</td><td>".$w['description']."</td><td>".$a['Name']."</td><td>".$m['Seat']."</td><td>".$a['Mobile']."</td></tr>";
				 $i++;
			  }
				echo"</table>";
				}
			 }
			} 
			if($x!=='1' || $x!=='2')
			{
			 include "conn.php";
			 $db->query("use hms");
             $v=mysqli_query($db,"SELECT * FROM complaint_type where c_code='".$x."'");	
             $i=0;			 
             while($c=mysqli_fetch_assoc($v))
             {	include "conn.php";
                $db->query("use hms");
			    $as="SELECT * FROM complaints where status!=2 AND type='".$c['c_code']."' AND Hcode='".$hcode."'";
                $q=$db->query($as);
				$zz=mysqli_num_rows($q);
				if($zz>0)
				{
			    $i=1;		 
				echo"".$c['ctype']." :<br>			 
				 <table border=1><tr><th>S.No</th><th>Complaint Number</th><th>Compliant type</th><th>Description</th>";
				 if($x==6)
				 echo"<th>Student Name</th><th>Seat Number</th><th>Student's number</th>";
				 
				 echo"</tr>";
			 
			    while($w=mysqli_fetch_assoc($q))
			     {  
					 include "conn.php";
					 $db->query("use hms");
					 $m=mysqli_fetch_assoc($db->query("SELECT Seat FROM seats where uidai='".$w['uidai']."'"));
					 $a=mysqli_fetch_assoc($db->query("SELECT Name,Mobile FROM students where uidai='".$w['uidai']."'"));
					 echo"<tr><td>".$i."</td><td>".$w['serial']."</td><td>".$c['ctype']."</td><td>".$w['description']."</td>";
					 if($x==6)
					 {echo"<td>".$a['Name']."</td><td>".$m['Seat']."</td><td>".$a['Mobile']."</td>";}
					 echo "</tr>";
					 $i++;
			     }
				echo"</table>";  
				}
			 }
			 if($i=='0')
				 echo"<abc><p align='center'><font size=120>No Complaints</font></abc><br>(Please do not take print of this as there is no complaint)</p>";
			}
			 
			 
			 
    }
if(!$ec && !$cc && !$dfc && !$scc && !$sgc && !$sc){
echo '<input type="submit" class="button" onClick="location.href=index.php" value="Home" />
<br><br><br><br><br><br><br><br><br><br><br><br><h1>* This Section is for application forwarding purpose.<br>* After clicking on Complaint type this will generate a application regarding complaints of that type , after that you can take print of that and forward that to respective dept.</h1>';
}
?>
</body>
</html>