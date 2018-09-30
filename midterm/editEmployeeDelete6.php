<?php 
require_once('authorize.php');
require_once('variables.php');
$id = $_POST[id];
$name = $_POST[name];
$area = $_POST[area];
$phone = $_POST[phone];
$email = $_POST[email];
$comment = $_POST[comment];
$photo = $_POST[photo];

//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli(HOST,USER,PASSWORD,DB_NAME) or die('Connection Failed');



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM employee_directory WHERE id=6";


if ($conn->query($sql) === TRUE) {
    echo "Employee deleted successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 

//WE'RE DONE SO HANG UP
$conn->close();
?>