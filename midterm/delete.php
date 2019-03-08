<?php

require_once('variables.php');

//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli(HOST,USER,PASSWORD,DB_NAME) or die('Connection Failed');
        
//--------------------------------- DELETE SELECTED RECORDS -------------------------------
if(isset($_POST['submit'])) {
    foreach($_POST['todelete'] as $delete_id) {
        //echo $delete_id;
        $query = "DELETE FROM employee_directory WHERE id='$delete_id'";
        
        //NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection, $query) or die ('Query Failed');
    }; // close for each
}; // end of the if statement

//WE'RE DONE SO HANG UP
$dbconnection->close();

?>