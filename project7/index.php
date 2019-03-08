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
         <h1>Main Menu</h1>
         <br>
          <center><button type="submit" class="btn btn-primary" value="map" name="submit"><a href="map.php" style="color:#fff;">Map Location</a></button></center><br>
          <center><button type="submit" class="btn btn-primary" value="schedule" name="submit"><a href="schedule.php" style="color:#fff;">Our Schedule</a></button></center><br>
          <center><button type="submit" class="btn btn-primary" value="events" name="submit"><a href="events.php" style="color:#fff;">List of Events</a></button></center><br>
          <center><button type="submit" class="btn btn-primary" value="contact" name="submit"><a href="contact.php" style="color:#fff;">Contact Information</a></button></center>
         
      </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> 
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
      <script src="script.js"></script>
   </body>
</html>
