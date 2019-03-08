<?php
   // default message to the user
   $feedback = '<p style="text-align:center;"><a href="signup.php" style="color:#fff;">Create an Account</a></p>';
   // if the user isn't logged in, try to log them in
   
   if (isset($_POST['submit'])) {
   //BUILD THE DATABASE CONNECTION WITH host, user, pass, database
   $conn = new mysqli('localhost','jreedtkd_3760usr','dgm3760password','jreedtkd_3760test') or die('Connection Failed');
    
   //Grab the user-entered log in data    
   $username = mysqli_real_escape_string($conn, trim($_POST[username]));  
   $password = mysqli_real_escape_string($conn, trim($_POST[password]));
       
   //look up the username and password in the database   
   $sql = "SELECT * FROM users WHERE username = '$username' AND password = SHA('$password') "; 
       
   $data = mysqli_query($conn,$sql) or die ('Query Failed');
       
       
   if (mysqli_num_rows($data) == 1) {
       $row = mysqli_fetch_array($data);
       
       // make the cookie
       setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30)); // cookie expires in 30 days
       setcookie('firstname', $row['firstname'], time() + (60 * 60 * 24 * 30)); // cookie expires in 30 days
       setcookie('lastname', $row['lastname'], time() + (60 * 60 * 24 * 30)); // cookie expires in 30 days
       
       header('Location: index.php');
       
       
   } else {
       $feedback = '<p style="text-align:center; color: #fff;">Could not find an account for '.$_POST[username].'. Would you like to <a href="signup.php" style="color: #fff;">create a new account?</a></p>';
       
       
   } // end if 
       
   }//end POST
   ?>
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
         <h1>Log In</h1>
         <h5>Log in to an existing account</h5>
         <?php echo $feedback;?>
         <br>
         <form method="POST" action="login.php">
            <div class="form-group">
               <input type="text" name="username" class="form-control" id="exampleInputUserName1" placeholder="User Name" required value="<?php if (!empty($username)) echo $username; ?>">
            </div>
            <br>
            <div class="form-group">
               <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <br>
            <br>
            <center><button type="submit" class="btn btn-primary" value="Log In" name="submit">Log In</button></center>
            <br>
            <p style="text-align: center;"><a href="index.php" style="color:#fff;">Cancel</a></p>
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