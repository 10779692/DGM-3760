<?php
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$university = $_POST['university'];
$year = $_POST['year'];
$grade_year = $_POST['gradeyear'];
$email = $_POST['email'];
$custom_message = $_POST['custommessage'];

$dbc = mysqli_connect('https://weblanguages2.jreedtkd.com/project2','jreedtkd_weblang','Kickbutt123','jreedtkd_weblang') or die('Error connecting to mySQL server');

$query = "INSERT INTO jreedtkd_weblang (first_name, last_name, university, year, grade_year, email, custom_message)" . "VALUES ('$first_name', '$last_name', '$university', '$year', '$grade_year', '$email', '$custom_message')";

$result = mysqli_query($dbc,$query) or die('Error querying database');
mysqli_close($dbc);

echo 'Thanks for submitting the form. We will be in touch with you very soon. Have a wonderful day!';
?>