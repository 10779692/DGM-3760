<?php 
$subject = $_POST[subject];
$message = $_POST[message];
$from = "10779692@my.uvu.edu";
    
    
    
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli('localhost','jreedtkd_3760usr','dgm3760password','jreedtkd_3760test') or die('Connection Failed');

// BUILD THE QUERY
$sql = "SELECT * FROM newsletter";
    
    
//NOW TRY AND TALK TO THE DATABASE


//DISPLAY WHAT WE FOUND
$result = mysqli_query($conn, $sql) or die ('Query Failed');

while ($row = mysqli_fetch_array($result)) {
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $to = $row['email'];
    $newMessage = "Dear $first_name $last_name, $message";
    
    mail($to, $subject, $newMessage, 'From:' . $from );
    
    echo 'Message Sent to' . $to . '<br>';
};

//WE'RE DONE SO HANG UP
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta content="Free Web tutorials" name="description">
	<meta content="HTML,CSS,XML,JavaScript" name="keywords">
	<meta content="John Doe" name="author">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
	<title>Assignment 3</title>
</head>
<body>
	<h2>You have sent an email to a million people. Congrats!</h2>
</body>
</html>