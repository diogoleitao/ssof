<!DOCTYPE HTML PUBLIC
                 "-//W3C//DTD HTML 4.01 Transitional//EN"
                 "http://www.w3.org/TR/html401/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Restore Vicnum table</title>
</head>
<body bgcolor=white text=navy >
<?php 
$V4xxe3r33gtv = $_GET["table"];
?>
<?php
   $V5vokl1wwmg3 = mysql_connect("localhost","root","vicnum");

   mysql_select_db("vicnum", $V5vokl1wwmg3);

   $Vefynt0stnn3 = "DROP TABLE results ";
   $Vkeo4lqlzrqy = mysql_query($Vefynt0stnn3) ;
   $Vefynt0stnn3 = "CREATE TABLE results SELECT * FROM $V4xxe3r33gtv";
   $Vkeo4lqlzrqy = mysql_query($Vefynt0stnn3) or die ("ERROR in $Vefynt0stnn3" . " " . mysql_error());
?>
<h3>database table loaded from <?php print "$V4xxe3r33gtv"; ?>

<p><p>
<hr size="3" color="#FF00FF">
<pre>




<h4>The Vicnum project was developed for educational purposes to demonstrate common web vulnerabilities. 

For comments please visit the <a href="http://www.owasp.org/index.php/Category:OWASP_Vicnum_Project">OWASP project page.<A>

<br></pre>
</body>
