<?php
$spf97a4b = $_POST['player']; ?>
<!DOCTYPE HTML PUBLIC
                 "-//W3C//DTD HTML 4.01 Transitional//EN"
                 "http://www.w3.org/TR/html401/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Vicnum results from the database</title>
 
</head>
<body background="images/ctech.png" text=navy>
<table  CELLPADDING="1" WIDTH="100%"> 
  <tr> 
    <td WIDTH="70%"><img src="images/jottowelcome.png">
  </tr> 
</table> 
<hr size="3" color="#FF00FF"> 
<h2><u>Search Results</u></h2>
<pre>

<?php  echo "<h3>You have requested results for Jotto player {$spf97a4b} :"; $sp5b2588 = mysql_connect('localhost', 'root', 'vicnum'); mysql_select_db('vicnum', $sp5b2588); $sp1cf139 = "SELECT name,guess,count,tod FROM jottoresults WHERE jottoresults.name  = '{$spf97a4b}'"; $sp85efff = mysql_query($sp1cf139) or die("ERROR in {$sp1cf139}" . ' ' . mysql_error()); if (mysql_num_rows($sp85efff) > 0) { while ($spa05ab6 = mysql_fetch_array($sp85efff, MYSQL_NUM)) { print '

'; print "{$spa05ab6['0']} has guessed {$spa05ab6['1']} in {$spa05ab6['2']} guess(es) on {$spa05ab6['3']} \n"; } } else { echo ' but no entries were found.<br><p>'; } ?>
</pre>
<hr size="3" color="#FF00FF">
 <a href="index.html">Play Again</a>
<p><p>
<hr size="3" color="#FF00FF">
<pre>

<h4>The Vicnum project was developed for educational purposes to demonstrate common web vulnerabilities. 

For comments please visit the <a href="http://www.owasp.org/index.php/Category:OWASP_Vicnum_Project">OWASP project page.<A>

<br></pre>
</body>
<?php 