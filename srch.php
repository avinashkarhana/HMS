<?php
@$cstudents=$_POST['cstudents'];
@$feenotpaid=$_POST['feenotpaid'];
@$lastyr=$_POST['lastyr'];
@$search=$_POST['Student'];
@$applicants=$_POST['Applicants'];
@$nvapplicants=$_POST['NVApplicants'];
@$verified=$_POST['Verified'];
@$addseat=$_POST['addseat'];
@$chdetails=$_GET['chdetails'];
if(!$chdetails)
	@$chdetails=$_POST['chdetails'];
if(@$nvapplicants)
{
include "nvapplicants.php";
}
else
	echo"";
if(@$feenotpaid)
{
include "feenotpaid.php";
}
else
	echo"";
if(@$applicants)
{
include "applicants.php";
}
else
	echo"";
if(@$verified)
{
include "verified.php";
}
else
	echo"";
if(@$cstudents)
{
include "cstudents.php";
}
else
	echo"";
if(@$lastyr)
{
include "lastyr.php";
}
else
	echo"";
if(@$addseat)
{
include "add seat.php";
}
else
	echo"";
if(@$chdetails)
{
include "chdetails.php";
}
else
	echo"";
if(@$search)
{
header("Location: /hms/index.php");
}
else
	echo"";
?>