<?php
echo '<form action="" method="POST"><table align="left"><tr>
<td>Select a Hostel :</td><td>
<select name="hostel" >';
include "conn.php";
$db->query("use hms");
$st=$db->query("select Hcode,Name from hostels");
while($c=mysqli_fetch_assoc($st)){
	if($c['Hcode']==$hostel)
	{
		echo"<option value='".$c['Hcode']."' selected>".$c['Name']."</option>";
	}
	else
	{
		echo"<option value='".$c['Hcode']."'>".$c['Name']."</option>";
	}
	
	$i++;
}
echo '</select></td></tr>
<tr><td>Number of Seats to add :</td><td><input type="text" name="seat" /></td></tr></table><br><br><br>
<p align="left"><input type="submit" class="button" name="vacant" Value="Add seats" /></p>
</form>';
$a=1;$b=10;
$c=$a/$b;
echo $c%2;
@$Hcode=$_POST["hostel"];
@$n=$_POST["seat"];
if($n)
{
for($i=1;$i<$n+1;$i++){
include "conn.php";
$result1= $db->query("use hms");
$c=$i/10;
if($c%2==0)
{$query= $db->query("insert into seats (Hcode,Seat)
         values('".$Hcode."','0".$i."A')");
$query1= $db->query("insert into seats (Hcode,Seat)
values('".$Hcode."','0".$i."B')");}
else
    {$query= $db->query("insert into seats (Hcode,Seat)
                        values('".$Hcode."','".$i."A')");
    $query1= $db->query("insert into seats (Hcode,Seat)
	values('".$Hcode."','".$i."B')");}
		 }
echo $db->error;	 
$j=$i-1;
echo '        <•>'.$j.' Seats added to '.$Hcode.'<br><br></a>';
$db->close();
}
else
	echo"";
?>