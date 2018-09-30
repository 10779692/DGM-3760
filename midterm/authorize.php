<?php

$username = 'admin';
$password = 'abc123';



if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] !=$password)) {
   header('HTTP/1.1 401 Unauthorized');
   header('WWW-Authenticate: Basic realm="Up2date"');
   exit('Access Denied');
} //end if statement
    
    ?>