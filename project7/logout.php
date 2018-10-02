<?php
// delete the cookies by setting their expiration dates
setcookie('username','',time()-3600);
setcookie('firstname','',time()-3600);
setcookie('lastname','',time()-3600);

//redirect to the home page
header('Location: login.php');


?>