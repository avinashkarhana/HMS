<?php    
	echo '<form action="hostelaffairs.php" method="POST"><table align="left"><tr>
	<td>Select a Hostel :</td><td>
	<select name="hostel" >';
	ob_start();
	include "conn.php";
	$db->query("use hms");
	$st=$db->query("select Hcode,Name from hostels");
	@$Hcode=$_GET['hostel'];
	@$saved=$_GET['saved'];
	if(!$Hcode)
	  @$Hcode=$_POST["hostel"];
	if(!$Hcode)
	  @$Hcode=$_POST["hostel"];
    @$save=$_POST['save'];
	@$warden1=$_POST['warden1'];
	@$warden2=$_POST['warden2'];
	@$w1mobile=$_POST['w1mobile'];
	@$w2mobile=$_POST['w2mobile'];
    @$caretaker=$_POST['caretaker'];
    @$ctmobile=$_POST['ctmobile'];
	@$save_error=$_GET['save_error'];
	if(mysql_num_rows($st)>2){
	while($c=mysqli_fetch_assoc($st)){
		if($c['Hcode']==$Hcode)
		{
			echo"<option value='".$c['Hcode']."' selected>".$c['Name']."</option>";
		}
		else
		{
			echo"<option value='".$c['Hcode']."'>".$c['Name']."</option>";
		}
		
		$i++;
	}}
	echo '</select></td></tr></table><br><br><br>
	<p align="left"><input type="hidden" name="chdetails" value="chdetails" /><input type="submit" class="button" name="hselect" Value="Select" /></p>
	</form>';
	if($Hcode)
	{
		include "conn.php";
		$databaseuse= $db->query("use hms");
		$query= $db->query("select * from hostels where Hcode='".$Hcode."'");
		$x=mysqli_fetch_assoc($query);
		echo "<div style='border:1px solid #A0A0A0;border-radius:5px;background-color:#B8D8F9;'><form action='hostelaffairs.php' method='post'>
		<b>Warden-1 Name</b><br><input type='text' name='warden1' value='".$x['warden1']."' /><br>
		<b>Warden-1 contact Number</b><br><input type='number' min=7000000000 max=9999999999 name='w1mobile' value='".$x['w1mobile']."' /><br><br>
		<b>Warden-2 Name</b><br><input type='text' name='warden2' value='".$x['warden2']."' /><br>
		<b>Warden-2 contact Number</b><br><input type='number' min=7000000000 max=9999999999 name='w2mobile' value='".$x['w2mobile']."' /><br><br>
		<b>Care-taker Name</b><br><input type='text' name='caretaker' value='".$x['caretaker']."' /><br>
		<b>Care-taker contact Number</b><br><input type='number' min=7000000000 max=9999999999 name='ctmobile' value='".$x['ctmobile']."' /><br><br><br><input type='hidden' name='chdetails' value='chdetails' /><input type='hidden' name='hostel' value='".$Hcode."' /><br><input type='submit' class='button' name='save' value='Save' /></form><br><br><br><br>";
		if($saved)
			 echo"<b>UPDATED SUCCESSFULY !</b></div>";
		elseif($save_error)
		     echo "<b>Sorry ! something went wrong, can't save</b>";
		else
			 echo"</div>";
		$db->close();
	}
	echo "xx-".$save."-xx";
    if($save)
    {
		include "conn.php";
		$db->query("use hms");
		if($db->query("update hostels set warden1='".$warden1."' , w1mobile='".$w1mobile."' , warden2='".$warden2."' , w2mobile='".$w2mobile."' , caretaker='".$caretaker."' , ctmobile='".$ctmobile."' where Hcode='".$Hcode."' "))
			header("Location: /hms/hostelaffairs.php?saved=saved&hostel=".$Hcode."&chdetails=chdetails");
		else
			header("Location: /hms/hostelaffairs.php?save_error=save_error&hostel=".$Hcode."&chdetails=chdetails");
		$db->close();
    }
	
	 
?>