<nav>
<p style="text-align:right; color:#fff;">Hello,
<?php
  if (isset($_COOKIE['username'])) {
      echo $_COOKIE['firstname'].' '.$_COOKIE['lastname'];
      echo ' | <a href="logout.php" style="text-align: right; color:#fff;">Signout</a>';
  } else {
      //show menu to log in
      echo '<a href="login.php" style="text-align: right; color:#fff;">Please Login</a>';
  } 
?>    
</p>
</nav>