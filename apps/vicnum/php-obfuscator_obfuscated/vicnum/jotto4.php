<?php
?>
<!DOCTYPE HTML PUBLIC
                 "-//W3C//DTD HTML 4.01 Transitional//EN"
                 "http://www.w3.org/TR/html401/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Writing Jotto results to database</title>
</script> 
<script language="JavaScript"> 
function checktag(){
var RE = /^.?'/;
 if (RE.test(document.g.player.value)) {
  alert("Invalid characters entered ");
	return false;
 } else {
  	return true;
 }
}
</script> 

</head>
<body background="images/ctech.png" text=navy>
<?php  $sp3050d4 = $_COOKIE['oreos']; $sp65e572 = $_COOKIE['chipsahoy']; $spb48e0c = $_COOKIE['mallomar']; $spb48e0c = str_rot13($spb48e0c); ?>
<table  CELLPADDING="1" WIDTH="100%"> 
  <tr> 
    <td WIDTH="70%"><img src="images/jottowelcome.png">
  </tr> 
</table> 
<hr size="3" color="#FF00FF"> 
<pre>
<?php  $sp6e77b1 = '/\\</'; $spd0aa77 = '/[^0-9a-zA-Z_@.]/'; if (preg_match($spd0aa77, $sp3050d4)) { print '<h2> name changed to unknown <p>'; $sp3050d4 = 'unknown'; $sp65e572 = 99; } if (preg_match($spd0aa77, $spb48e0c)) { print '<h2> guess changed to clean <p>'; $spb48e0c = 'clean'; $sp65e572 = 99; } $sp5b2588 = mysql_connect('localhost', 'root', 'vicnum'); mysql_select_db('vicnum', $sp5b2588); $sp1cf139 = "SELECT name,count,tod FROM jottoresults WHERE jottoresults.name  = '{$sp3050d4}' AND jottoresults.guess = '{$spb48e0c}'"; $sp85efff = mysql_query($sp1cf139) or die("ERROR in {$sp1cf139}" . ' ' . mysql_error()); if (mysql_num_rows($sp85efff) < 1) { $sp1cf139 = "INSERT INTO jottoresults(name,guess,count) VALUES(\"{$sp3050d4}\",\"{$spb48e0c}\",{$sp65e572})"; $sp85efff = mysql_query($sp1cf139) or die("ERROR in {$sp1cf139}" . ' ' . mysql_error()); print '<H2>Your Results have been stored in our database.
Below please find the top 10 Jotto players.
Thanks for playing!

<hr>'; } else { echo '<H2><b>Duplicate names with the same guess value are not allowed!</b><p>Below find the top 10 scores for legitimate Jotto players.<p><hr size="3" color="#FF00FF">'; } $sp85efff = mysql_query('SELECT name,guess,count,tod FROM
                          jottoresults where count > 0 order by count,tod limit 10', $sp5b2588); while ($spa05ab6 = mysql_fetch_array($sp85efff, MYSQL_NUM)) { print "{$spa05ab6['0']}\t has guessed {$spa05ab6['1']} in {$spa05ab6['2']} guess(es) on {$spa05ab6['3']} \n"; } print '<H2>Click <a href="index.html">here</a> to play again. You can also search for your favorite Jotto player by entering the player\'s name below<br>and then clicking on the SEARCH button.<form name="g" onsubmit="return checktag()" action="jotto5.php" method="post">
Jotto Player: <input type"text" name=player size=30> <input type=submit value=SEARCH>'; ?>
</pre>
<p><p>
<hr size="3" color="#FF00FF">
<pre>

<h4>The Vicnum project was developed for educational purposes to demonstrate common web vulnerabilities. 

For comments please visit the <a href="http://www.owasp.org/index.php/Category:OWASP_Vicnum_Project">OWASP project page.<A>

<br></pre>
</body>
<?php 