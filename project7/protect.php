<?php
//make sure the user is logged in before going any further
if (!isset($_COOKIE['username'])) {
echo '<p style="text-align:center; color: #000000;">Please <a href="login.php" style="color:#000000;">log in</a> to access this page.</p>'; 
exit();
} //end if
?>