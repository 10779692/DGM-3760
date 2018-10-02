<?php 
<?php include_once('navbar.php');
   //BUILD THE DATABASE CONNECTION WITH host, user, pass, database
   $conn = new mysqli('localhost','jreedtkd_3760usr','dgm3760password','jreedtkd_3760test') or die('Connection Failed');
   //---------- if user has filled out the form and clicked the submit button then do this stuff
           if (isset($_POST['submit'])) {
               // Grab the date from the global POST array and remove commas etc.
               $firstname = mysqli_real_escape_string($conn,trim($_POST['firstname']));
               $lastname = mysqli_real_escape_string($conn,trim($_POST['lastname']));
               $username = mysqli_real_escape_string($conn,trim($_POST['username']));
               $password1 = mysqli_real_escape_string($conn,trim($_POST['password1']));
               $password2 = mysqli_real_escape_string($conn,trim($_POST['password2']));
               
               
               //DOUBLE CHECK TO MAKE SURE THAT ALL FORM FIELDS HAVE VALUES
               if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
               
               //Make sure someone isn't already registered using this username
                   $sql = "SELECT * FROM `users` WHERE username = '$username'";
                   $alreadyexists = mysqli_query($conn,$sql) or die ('Query Failed');
                   
                   if(mysqli_num_rows($alreadyexists) == 0) {
                       
                       
                       //INSERT INTO DATABASE
                       $sql = "INSERT INTO `users` (firstname, lastname, username, password, date) VALUES ('$firstname', '$lastname','$username',SHA('$password1'),NOW())";
                       
                       //CONFIRM MESSAGE
                       echo '<p>Your new account has successfully been created.</p>';
                       echo '<p>Return to the <a href="index.php">main page.</a></p>';
                       
                       // CLOSE THE CONNECTION
                       $conn->close();
                       
                       
                       // EXIT THE PAGE
                       exit();
                       
                   } else {
                     echo '<p> class="error">An account with this username already exists. Please try again.</p>';  
               } //end of user exists check
                   
               } //end of the if statement
               
           }// end of isset
           
           ?>
