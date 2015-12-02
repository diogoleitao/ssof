<?php
?>
<!DOCTYPE HTML PUBLIC
                 "-//W3C//DTD HTML 4.01 Transitional//EN"
                 "http://www.w3.org/TR/html401/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Vicnum players  who have clearly hacked </title>
</head>
<body bgcolor=white text=navy >

<h2><u>Vicnum Players with a guess count of zero and a guess value > 999</u></h2>
<hr size="3" color="#FF00FF"></h2>

<pre>
<?php  $sp5b2588 = mysql_connect('localhost', 'root', 'vicnum'); mysql_select_db('vicnum', $sp5b2588); $sp85efff = mysql_query('SELECT name,guess,count,tod FROM
                          results WHERE (count =0  AND guess>999) order by tod', $sp5b2588); $sp65e572 = mysql_num_rows($sp85efff); print "<H2>Below are all {$sp65e572} Vicnum players in the database who have clearly hacked the game.\n<hr>"; while ($spa05ab6 = mysql_fetch_array($sp85efff, MYSQL_NUM)) { print "{$spa05ab6['0']} has guessed {$spa05ab6['1']} in {$spa05ab6['2']} guesses on {$spa05ab6['3']} \n"; } ?>
</pre>
<p><p>
<hr size="3" color="#FF00FF">
<pre>


<h4>The Vicnum project was developed for educational purposes to demonstrate common web vulnerabilities. 

For comments please visit the <a href="http://www.owasp.org/index.php/Category:OWASP_Vicnum_Project">OWASP project page.<A>
<br></pre>
</body>
<?php 