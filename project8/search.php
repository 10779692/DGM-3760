<?php
require_once('variables.php');
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli(HOST,USER,PASSWORD,DB_NAME) or die('Connection Failed');
//BUILD THE QUERY FOR AN INNER JOIN
$sql = "SELECT * FROM dgm_emphasis ORDER BY value";
//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($conn, $sql) or die ('Query Failed');
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
            <span>Search by Crime</span>
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
                  <li class="nav-item active">
                     <a class="nav-link" href="search.php">Search By Cellblock</a>
                  </li>
               </ul>
            </div>
         </nav>
         <!--- CATEGORIES --->
         <div id="formBorder">
             <?php
             while($row = mysqli_fetch_array($result)) {
                 echo '<button><a href="index.php?emphasis='.$row['emphasis_id'].'">';
                 echo $row['value'];
                 echo '</a></button><br><br>';
             };
             ?>   
         </div>
      </div>
       <?php
       //WERE DONE SO CLOSE THE DATABSE
       $conn->close();
       ?>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   </body>
</html>