<?php 
//LOAD THE POST DATA INTO PHP VARIABLES 
$first_name = $_POST[firstname];
$last_name = $_POST[lastname];
$department = $_POST[department];
$phone = $_POST[phone];
$photo = $_POST[photo];

//MAKE PHOTO PATH AND NAME
$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
echo $ext;

$filename = 'employees/'.$first_name. $last_name.'.'.$ext;
echo $filename;

//VERIFY THE IMAGE IS VALID
$validImage = true;

//check to see image is missing
if ($_FILES['photo']['size'] == 0) {
    echo 'OOPS -- You did not select an image!';
    $validImage = false;
};

//check to see image too large
if ($_FILES['photo']['size'] > 204800) {
    echo 'OOPS -- That file size is bigger than 200KB.';
    $validImage = false;
};

//check to see file type 
if ($_FILES['photo']['type'] == 'image/gif' || $_FILES['photo']['type'] == 'image/jpeg' || $_FILES['photo']['type'] == 'image/pjpeg' || $_FILES['photo']['type'] == 'image/png') {
    //that must be a proper format
} else {
    //tell user not correct
    echo 'OOPS -- That file size is in the wrong format.';
    $validImage = false;
};

if ($validImage == true) {
    //upload the file
    $tmp_name = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp_name ,$filename);
    @unlink($_FILES['photo']['tmp_name']);
} else {
    //try again
    echo '<a href="index.html">Please try Again</a>';
};
?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Assignment 5</title>
	<meta content="The HTML5 Herald" name="description">
	<meta content="SitePoint" name="author">
	<link href="main.css" rel="stylesheet">
</head>
<body>
<h1>Test Upload Page</h1> 
    
<?php 
    
echo '<img src="'.$filename.'" alt="photo">';  
    
echo '<br>size--'.$_FILES['photo']['size'];
echo '<br>type--'.$_FILES['photo']['type'];
echo '<br>temp--'.$_FILES['photo']['tmp_name'];
echo '<br>name--'.$_FILES['photo']['name'];
    
?>
    
    
</body>
</html> 
