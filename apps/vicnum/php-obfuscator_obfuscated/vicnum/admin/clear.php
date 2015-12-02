<?php
?>
<!DOCTYPE HTML PUBLIC
                 "-//W3C//DTD HTML 4.01 Transitional//EN"
                 "http://www.w3.org/TR/html401/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Clearing Vicnum database  </title>
 
</head>
<body>
<pre>

<?php  echo '<h3>database is being cleared ....'; $sp5b2588 = mysql_connect('localhost', 'root', 'vicnum'); mysql_select_db('vicnum', $sp5b2588); $sp1cf139 = 'DELETE  FROM results '; $sp85efff = mysql_query($sp1cf139) or die("ERROR in {$sp1cf139}" . ' ' . mysql_error()); echo '<h3>database cleared ...'; ?>
</pre>
<p><p>
<hr size="3" color="#FF00FF">
<pre>




<h4>The Vicnum project was developed for educational purposes to demonstrate common web vulnerabilities. 

For comments please visit the <a href="http://www.owasp.org/index.php/Category:OWASP_Vicnum_Project">OWASP project page.<A>

<br></pre>
</body>
<?php 