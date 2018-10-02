<?php 
            //BUILD THE DATABASE CONNECTION WITH host, user, pass, database
            $conn = new mysqli('localhost','jreedtkd_3760usr','dgm3760password','jreedtkd_3760test') or die('Connection Failed');
            //---------- if user has filled out the form and clicked the submit button then do this stuff
                    if (isset($_POST['submit'])) {
                        // Grab the date from the global POST array and remove commas etc.
                        $firstname = mysqli_real_escape_string($conn,trim($_POST[firstname]));
                        $lastname = mysqli_real_escape_string($conn,trim($_POST[lastname]));
                        $username = mysqli_real_escape_string($conn,trim($_POST[username]));
                        $password1 = mysqli_real_escape_string($conn,trim($_POST[password1]));
                        $password2 = mysqli_real_escape_string($conn,trim($_POST[password2]));
                        
                        
                        //DOUBLE CHECK TO MAKE SURE THAT ALL FORM FIELDS HAVE VALUES
                        if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
                        
                        //Make sure someone isn't already registered using this username
                            $sql = "SELECT * FROM users WHERE username = '$username'";
                            $alreadyexists = mysqli_query($conn,$sql) or die ('Query Failed');
                            
                            if(mysqli_num_rows($alreadyexists) == 0) {
                                
                                
                                //INSERT INTO DATABASE
                                $sql = "INSERT INTO users (firstname, lastname, username, password, date) VALUES ('$firstname', '$lastname', '$username', SHA('$password1'), NOW() )";
                                
                                
                                if ($conn->query($sql) === TRUE) {
        
                                 } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                                  }
                                //CONFIRM MESSAGE
                                $feedback = '<p style="color:#fff;text-align:center;">Your new account has successfully been created.</p><p style="color:#fff;text-align:center;">Return to the <a href="index.php">main page</a>.</p>';
                                
                                // make the cookie
                                setcookie('username', $username, time() + (60*60*24*30)); // cookie expires in 30 days
                                setcookie('firstname', $firstname, time() + (60*60*24*30)); // cookie expires in 30 days
                                setcookie('lastname', $lastname, time() + (60*60*24*30)); // cookie expires in 30 days
                                
                                // CLOSE THE CONNECTION
                                $conn->close();
                                
                                
                                // EXIT THE PAGE
                                //exit();
                                
                            } else {
                              $feedback = '<p class="error" style="color: #fff; text-align: center;" >An account with that username already exists. Please try again.</p>';  
                        } //end of user exists check
                            
                        } //end of the if statement
                        
                    }// end of isset
                    
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
         <h1>Sign Up</h1>
          <?php echo $feedback; ?>
         <h5>Registration Information</h5>
         <br>
         
         <form method="POST" action="">
            <div class="form-group">
               <input type="text" name="firstname" class="form-control" id="exampleInputFirstName1" placeholder="First Name" required value="<?php if (!empty($firstname)) echo $firstname; ?>">
            </div>
            <br>
            <div class="form-group">
               <input type="text" name="lastname" class="form-control" id="exampleInputLastName1" placeholder="Last Name" required value="<?php if (!empty($lastname)) echo $lastname; ?>">
            </div>
            <br>
            <div class="form-group">
               <input type="text" name="username" class="form-control" id="exampleInputUserName1" placeholder="User Name" required value="<?php if (!empty($username)) echo $username; ?>">
            </div>
            <br>
            <div class="form-group">
               <input type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <br>
            <div class="form-group">
               <input type="password" name="password2" class="form-control" id="exampleInputPassword2" placeholder="Password (Retype)" required>
            </div>
            <br>
            <br>
            <center><button type="submit" class="btn btn-primary" value="Sign Up" name="submit">Sign Up Now</button></center>
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