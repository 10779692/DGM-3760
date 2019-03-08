<?php
require_once('variables.php');
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli(HOST,USER,PASSWORD,DB_NAME) or die('Connection Failed');
//GET THE EMPHASIS NAMES FROM THE DATABASE
$sql = "SELECT * FROM dgm_emphasis";
$resultEmphasis = mysqli_query($conn, $sql) or die ('Query Failed');
//GET THE SOFTWARE NAMES FROM THE DATABASE
$sql = "SELECT * FROM dgm_packages ORDER BY package ASC";
$resultPackage = mysqli_query($conn, $sql) or die ('Query Failed');
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
            <span>Add a New Criminal</span>
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
                  <li class="nav-item active">
                     <a class="nav-link" href="new.php">Add New Criminal</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="search.php" >Search By Cellblock</a>
                  </li>
               </ul>
            </div>
         </nav>
         <!--- FORM --->
         <form action="saveToDatabase.php" method="POST">
            <br> 
            <div id="formBorder">
               <div class="form-group">
                  <!--- FORM GROUP 1 --->
                  <h4>Personal Information</h4>
                  <label for="exampleInputEmail1"></label>
                  <input type="text" class="form-control" name="first" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                  <input type="text" class="form-control" name="last" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                  <input type="text" class="form-control" name="website" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Inmate ID">
               </div>
            </div>
            <!--- FORM GROUP 2 --->
            <br>
            <div id="formBorder">
               <h4>Gender</h4>
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="1" checked>
                  <label class="form-check-label" for="exampleRadios1">
                  Male
                  </label>
               </div>
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="2">
                  <label class="form-check-label" for="exampleRadios2">
                  Female
                  </label>
               </div>
            </div>
            <br>
            <!--- FORM GROUP 3 --->
            <div id="formBorder">
               <h4>Cell Block</h4>
               <select name="emphasis" class="form-control form-control-sm">
                   <?php
                while($row = mysqli_fetch_array($resultEmphasis)) {
                   echo '<option value="'.$row['emphasis_id'].'">'.$row['value'].'</option>';
                };
                ?>
               </select>
            </div>
            <br>
            <!--- FORM GROUP 4 --->
            <div id="formBorder">
               <h4>Crimes Committed</h4>
                <?php
                while($row = mysqli_fetch_array($resultPackage)) {
                    echo '<input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="'.$row['package_id'].'" name="packages[]" aria-label="..."> '.$row['package'].'<br>';
                }
                ?>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Add New Inmate</button>
         </form>
      </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   </body>
</html>