<?php
?>
<!DOCTYPE HTML PUBLIC
                 "-//W3C//DTD HTML 4.01 Transitional//EN"
                 "http://www.w3.org/TR/html401/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Copying Vicnum table</title>
</head>
<body bgcolor=white text=navy >
<?php  $sp65d3b3 = $_GET['table']; $sp5b2588 = mysql_connect('localhost', 'root', 'vicnum'); mysql_select_db('vicnum', $sp5b2588); $sp1cf139 = "CREATE TABLE {$sp65d3b3}  like results"; $sp85efff = mysql_query($sp1cf139) or die("ERROR in {$sp1cf139}" . ' ' . mysql_error()); $sp1cf139 = "INSERT {$sp65d3b3}  SELECT * FROM results"; $sp85efff = mysql_query($sp1cf139) or die("ERROR in {$sp1cf139}" . ' ' . mysql_error()); ?>
<h3>database table copied to <?php  print "{$sp65d3b3}"; ?>

<p><p>
<hr size="3" color="#FF00FF">
<pre>




<h4>The Vicnum project was developed for educational purposes to demonstrate common web vulnerabilities. 

For comments please visit the <a href="http://www.owasp.org/index.php/Category:OWASP_Vicnum_Project">OWASP project page.<A>

<br></pre>
</body>
<?php 