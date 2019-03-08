<?php include_once('protect.php');?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
      <!-- Bootstrap CSS -->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
      <link href="main.css" rel="stylesheet">
      <title>Project 7</title>
   </head>
   <body>
      <div id="wrap">
          <?php include_once('navbar.php'); ?>
         <h1>Report Outage</h1>
         <h5>Report an outage below</h5>
         <br>
         <form method="POST" action="#">
            <div class="form-group">
               <input type="text" name="name" class="form-control" id="exampleInputUserName1" placeholder="Your Name" required value="">
            </div>
             <br>
            <div class="form-group">
               <input type="text" name="number" class="form-control" id="exampleInputUserName1" placeholder="Customer Account Number" required value="">
            </div>
             <br>
             <div class="form-group">
               <input type="text" name="location" class="form-control" id="exampleInputUserName1" placeholder="Location" required value="">
            </div>
             <br>
            <div class="form-group">
               <input type="date" name="date" class="form-control" id="exampleInputUserName1" placeholder="Date" required value="">
            </div>
             <br>
            <div class="form-group">
               <input type="time" name="time" class="form-control" id="exampleInputUserName1" placeholder="Time" required value="">
            </div>
            <br>
            <br>
            <center><button type="submit" class="btn btn-primary" value="Report Outage" name="submit">Report Outage</button></center>
         </form>
      </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> 
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
      <script src="script.js"></script>
   </body>
</html>