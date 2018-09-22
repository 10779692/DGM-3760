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
    echo '<input type="checkbox" value = '.$row['id'].'" name="todelete[]"/>';
    echo $row['first_name'] .' '. $row['last_name'] .'<br>';
    echo '</label>';
};

//WE'RE DONE SO HANG UP
$dbconnection->close();
?>        

		<br><input id="button" type="submit" name="submit" value="Remove Employee" onclick="return confirm('Are you sure you want to delete selected employee?')">
		
        
	</form>
        <br><button onclick="myFunction()" id="button" type="submit"  value="Add Employee">Add Employee</button><br>
        <br><br><a href="submit.php" id="button"  style="text-decoration:none;font-size:11px;" type="submit" name="submit" value="View All Employees">View All Employees</a>
    
<div  id="myDIV" class="hidden_form">       
        
<div>
		<h3>Add Employee</h3>
		<form action="saveToDatabasePractice.php" enctype="multipart/form-data" id="travelInfo" method="post" name="travelInfo">
			First name:<br>
			<input id="namesAndPhone" name="firstname" type="text" value=""><br>
			Last name:<br>
			<input name="lastname" type="text" value=""><br>
			Phone:<br>
			<input name="phone" type="tel" value=""><br>
			<br>
			Department:<br>
			<select name="dept">
				<option value="internet_technologies">
					Internet Technologies
				</option>
				<option value="Video">
					Video
				</option>
				<option value="Audio">
					Audio
				</option>
				<option value="Design">
					Design
				</option>
			</select><br>
			Upload File:<br>
			<input name="photo" type="file"><br>
			<span>File must be saved as a .jpg file.</span><br>
			<span>Please crop to 150px wide X 200px tall before uploading</span><br>
			<br>
			<input type="submit" value="Submit">
		</form>
	</div>        
        </div> 
        
        
    </div>    
	<script src="script.js">
	</script>
</body>
</html>