<?php
$XVWA_WEBROOT = '/var/www/html/xvwa';
$host = "localhost";
$dbname = 'xvwa';
$user = 'root';
$pass = 'root';
$conn = mysql_connect($host,$user,$pass);
$conn1 = new mysqli($host, $user, $pass, $dbname);
?>