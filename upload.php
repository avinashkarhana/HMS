<?php
$kind=$_POST["kind"];
$user=$_POST["user"];
$target_dir = "img/";
$b=basename($_FILES["file"]["name"]);
$imageFileType = pathinfo($b,PATHINFO_EXTENSION);
if($kind=='p')
$target_file = $target_dir."".$user."p.jpg";
else
$target_file = $target_dir."".$user."s.jpg";
$uploadOk = 1; 
// Check if image file is a actual image or fake image 
if(isset($_POST["submit"])) { 
    $check = getimagesize($_FILES["file"]["tmp_name"]); 
    if($check !== false) { 
        echo "File is an image - " . $check["mime"] . "."; 
        $uploadOk = 1; 
    } else { 
        echo "File is not an image."; 
        $uploadOk = 0; 
    }
} 
// Check if file already exists 
if (file_exists($target_file)) {     echo "Sorry, file already exists."; 
    $uploadOk = 0; } 
// Check file size 
if($kind=='p')
{
	if ($_FILES["file"]["size"] > 80000) { 
    echo "Sorry, your photo file is too large.(Must be less than 80kb)"; 
    $uploadOk = 0; }
}
else
{   if ($_FILES["file"]["size"] > 20000) { 
    echo "Sorry, your sign file is too large.(Must be less than 20kb)"; 
    $uploadOk = 0; } 
} 
// Check if $uploadOk is set to 0 by an error 
if ($uploadOk == 0) { 
    echo "Sorry, your file was not uploaded.<br><a href='/hms/home.php'>Try Again</a>"; 
// if everything is ok, try to upload file 
} else { 
    if (move_uploaded_file($_FILES["file"]["tmp_name"],
$target_file)) { 
       if($kind=='p')
           echo "The photo has been uploaded.<br><a href='/hms/home.php'>Back to Home</a>"; 
	   else
		   echo "The sign has been uploaded.<br><a href='/hms/home.php'>Back to Home</a>"; 
    } else { 
        echo "Sorry, there was an error uploading your file.<br><a href='/hms/home.php'>Try Again</a>"; 
    }
} 
?>
