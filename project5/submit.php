<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Assignment 6</title>
	<meta content="The HTML5 Herald" name="description">
	<meta content="SitePoint" name="author">
	<link href="main.css" rel="stylesheet">
</head>
<body>
    <div class="form_body">
        <h3>Employee Directory</h3>
	<form action="<?php $SERVER['PHP_SELF'];?>" method="POST">

<?php




//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','jreedtkd_3760usr','dgm3760password','jreedtkd_3760test') or die('Connection Failed');
        
//--------------------------------- DELETE SELECTED RECORDS -------------------------------
if(isset($_POST['submit'])) {
    foreach($_POST['todelete'] as $delete_id) {
        //echo $delete_id;
        $query = "DELETE FROM employee_simple WHERE id='$delete_id'";
        
        //NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection, $query) or die ('Query Failed');
    }; // close for each
}; // end of the if statement 

        
//------------------------------ DISPLAY REMAINING RECORDS --------------------------------
        
// BUILD THE QUERY
$query = "SELECT * FROM employee_simple";
        
//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection, $query) or die ('Query Failed');     

        
while($row = mysqli_fetch_array($result)) {
    echo '<label>';
    echo '<p  value = '.$row['id'].'" name="todelete[]"/>';
    echo $row['first_name'] .' '. $row['last_name'] .' '. $row['$filename'] .'<br>';
    echo '</label>';
};

//WE'RE DONE SO HANG UP
$dbconnection->close();
?> 

<br><input type="button" id="#button" style="background-color: #00294b;color: #fff;padding-top: 10px;padding-bottom: 10px;padding-left: 30px;padding-right: 30px;:hover:background-color: white; color: #fff; border: solid 1px #00294b;"value="Go Back" onclick="window.history.back()"> 

<script src="script.js">
	</script>
</body>
</html>