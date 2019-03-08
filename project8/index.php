<?php
$sqladdition = '';
if (isset($_GET[emphasis])) {
    $sqladdition = "WHERE emphasis=$_GET[emphasis]";
}
require_once('variables.php');
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli(HOST,USER,PASSWORD,DB_NAME) or die('Connection Failed');
//BUILD THE QUERY FOR AN INNER JOIN
$sql = "SELECT * FROM dgm_student INNER JOIN dgm_emphasis ON (dgm_student.emphasis = dgm_emphasis.emphasis_id) $sqladdition ORDER BY last";
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
            <span>All Criminals</span>
         </div>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link active" href="index.php">Home</a>
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
             <?php
             if (mysqli_num_rows($result) == 0) {
                 echo'<p>Sorry, but no one matches the requested search.</p>';
             }
             ?>
             
            <?php
             //DISPLAY WHAT WE FOUND
             while($row = mysqli_fetch_array($result)) {
                 
                 echo '<div class="person" style="background-color:#fff;padding-top:20px;padding-bottom:6px;padding-left:20px;margin-top:15px;margin-bottom:15px;">';
                 echo '<h4 style="font-size: 20px;">'.$row['first'] .' '. $row['last']. '</h4>';
                 echo '<p>';
                 echo ($row['gender'] == 1 ? 'Inmate ' : 'Inmate ') . $row['last'];
                 echo ' is a felon at Utah State Prison located in cell block: '. $row['value']. '</p>';
                 echo '<p>';
                 echo  $row['last'];
                 echo ' commited the following crimes:</p>';
                 
                 //ASSIGN THE USER ID TO A VARIABLE
                 $theid = $row['id'];
                 
                 //BUILD ANOTHER INNER JOIN
                 $sql2 = "SELECT * FROM dgm_softwareskill INNER JOIN dgm_packages ON (dgm_softwareskill.package_id = dgm_packages.package_id) WHERE id=$theid";
                 
                 //NOW TRY AND TALK TO THE DATABASE
                 $resultPackage = mysqli_query($conn, $sql2) or die ('Package Query Failed');
                 
                 while ($row2 = mysqli_fetch_array($resultPackage)) {
                     echo '<p style="font-size:12px;color:#219b21;">'.$row2['package'].'</p>';
                 }//end packages
                 
                 echo '</div>';
                 
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
