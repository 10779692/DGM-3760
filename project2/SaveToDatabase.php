<?php
//echo 'Test <br />
//Load the post data into PHP variables
$first_name = $_POST[firstname];
$last_name = $_POST[lastname];
$university = $_POST[university];
$year = $_POST[year];
$grade_year = $_POST[gradeyear];
$email = $_POST[email];
$custom_message = $_POST[custommessage];

//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli('localhost','jreedtkd_3760usr','dgm3760password','jreedtkd_3760test') or die('Connection Failed');


//BUILD THE QUERY
$sql = "INSERT INTO contact (first_name, last_name, university, year, grade_year, email, custom_message) VALUES ('$first_name','$last_name','$university','$year','$grade_year','$email','$custom_message')";


//NOW TRY AND TALK TO THE DATABASE
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


//WE'RE DONE SO HANG UP
$conn->close();
?>

<html>
<head>
	<meta charset="UTF-8">
	<meta content="Free Web tutorials" name="description">
	<meta content="HTML,CSS,XML,JavaScript" name="keywords">
	<meta content="John Doe" name="author">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
	<title>Assignment 2 - Simple Contact Form in PHP and MySQL</title>
</head>
<body>
    <h3>We will get back to you soon. Thank you.</h3>
</body>
</html>