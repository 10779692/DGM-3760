<?php
//echo 'Test <br />
//Load the post data into PHP variables
$id = $_POST[id];
$name = $_POST[name];
$topic = $_POST[topic];
$comment = $_POST[comment];
$date = $_POST[date];

require_once('variables.php');
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli(HOST,USER,PASSWORD,DB_NAME) or die('Connection Failed');


//BUILD THE QUERY
$sql = "INSERT INTO blog (id, name, topic, comment, date) VALUES ('$id','$name','$topic','$comment','$date')";


//NOW TRY AND TALK TO THE DATABASE
if ($conn->query($sql) === TRUE) {
    echo "New comment added successfully";
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
	<title>Assignment 6 - Adding a Comment to a Blog Post</title>
</head>
<body>
    <h3>We will get back to you soon. Thank you.</h3>
</body>
</html>