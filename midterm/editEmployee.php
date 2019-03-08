<?php 
//LOAD THE POST DATA INTO PHP VARIABLES 
$name = $_POST[name];
$area = $_POST[area];
$phone = $_POST[phone];
$email = $_POST[email];
$comment = $_POST[comment];
$photo = $_POST[photo];

//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli('localhost','jreedtkd_3760usr','dgm3760password','jreedtkd_3760test') or die('Connection Failed');
//BUILD THE QUERY
$sql = "UPDATE employee_directory (name, area, phone, email, comment, photo) VALUES ('$name','$area','$phone','$email','$comment', '$photo')";
//NOW TRY AND TALK TO THE DATABASE
if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
//WE'RE DONE SO HANG UP
$conn->close();
?>
