<?php
//LOAD THE POST DATA INTO PHP VARIABLES
$first = $_POST['first'];
$last = $_POST['last'];
$gender = $_POST['gender'];
$website = $_POST['website'];
$emphasis = $_POST['emphasis'];
require_once('variables.php');
//BUILD THE DATABASE CONNECTION
$conn = new mysqli(HOST,USER,PASSWORD,DB_NAME) or die('Connection Failed');
//BUILD THE QUERY
$sql = "INSERT INTO dgm_student (first, last, gender, website, emphasis) VALUES ('$first','$last','$gender','$website','$emphasis')";
//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($conn,$sql) or die ('Query Failed');

//-----------------------------UPDATE SOFTWARE SKILLS--------------------------------
//this is the id of the user just added
$recent_id = mysqli_insert_id($conn);

//loop through the array
foreach($_POST['packages'] as $package_id) {

//BUILD SELECT QUERY
$sql = "INSERT INTO dgm_softwareskill (id, package_id) VALUES ($recent_id, $package_id)";
//NOW TRY AND DELETE THE RECORD
$result = mysqli_query($conn, $sql) or die ('update software skill failed');
};//end for each

//WE'RE DONE SO HANG UP
$conn->close();
?>

<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="main.css">
      <title>Project 8</title>
   </head>
   <body>
      <div id="wrap">
         <div id="header">
            <h1>Criminal Database</h1>
            <span>Inmate Added</span>
         </div>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="new.php">Add New Criminal</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="search.php">Search By Cellblock</a>
                  </li>
               </ul>
            </div>
         </nav>
         <!--- CATEGORIES --->
         <div id="formBorder">
            <h4>A new inmate has been added to the database</h4>
             <a href="new.php">Add another inmate?</a><br>
             <a href="index.php">Return to the home page</a>    
         </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>