<?php 
require_once('variables.php');
$name = $_POST[name];
$area = $_POST[area];
$phone = $_POST[phone];
$email = $_POST[email];
$comment = $_POST[comment];
$photo = $_POST[photo];
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli(HOST,USER,PASSWORD,DB_NAME) or die('Connection Failed');
// BUILD THE QUERY
$sql = "SELECT * FROM employee_directory WHERE id=19";
//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($conn, $sql) or die ('Query Failed');
?>




<?php 
while($row = mysqli_fetch_array($result)) {
echo '<h4 class="card-title"><a href="#">'.$row['name'] .'</a></h4><br>';
echo '<p class="card-text">'.$row['area'] .'</p>';
echo '<p class="card-text">'.$row['phone'] .'</p>';
echo '<p class="card-text">'.$row['email'] .'</p>';
};
?> 