<?php 
require_once('authorize.php');
$id = $_GET['id'];
require_once('variables.php');
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli(HOST,USER,PASSWORD,DB_NAME) or die('Connection Failed');
//BUILD A SELECT QUERY
$sql = "UPDATE blog SET approved=1 WHERE id=$id";
//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($conn, $sql) or die ('Query Failed');

//RETURN TO THE APPROVE PAGE
header('Location: approve.php');
?>