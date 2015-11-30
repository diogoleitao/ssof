<!DOCTYPE HTML PUBLIC
                 "-//W3C//DTD HTML 4.01 Transitional//EN"
                 "http://www.w3.org/TR/html401/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Writing Guessnum results to the database</title>
</head>
<body background="images/ctech.png" text=navy>
<?php 
$Vlfq4bl5sdak = substr($_COOKIE['Milano'],14) ;
$Vbeaqgmfwptj = substr($_COOKIE['Brussels'],14) ;
$Vagzxnqi3pzk = substr($_COOKIE['Geneva'],14) ;
?>
<table  CELLPADDING="1" WIDTH="100%"> 
  <tr> 
    <td WIDTH="80%"><img src="images/guessnumwelcome.png">
  </tr> 
</table> 
<hr size="3" color="#FF00FF"> 
<pre>
<?php

$Vyevc2hfp0p2 = "/\</";
if (preg_match($Vyevc2hfp0p2,$Vlfq4bl5sdak))  {
 print "<h2> name changed to unknown <p>"; $Vlfq4bl5sdak = "unknown" ;$Vbeaqgmfwptj =99; }
   $V5vokl1wwmg3 = mysql_connect("localhost","root","vicnum");

   mysql_select_db("vicnum", $V5vokl1wwmg3);

   $Vefynt0stnn3 = "SELECT name,count,tod FROM guessnumresults WHERE name  = '$Vlfq4bl5sdak' AND guess = '$Vagzxnqi3pzk'";
   $Vkeo4lqlzrqy = mysql_query($Vefynt0stnn3) or die ("ERROR in $Vefynt0stnn3" . " " . mysql_error());

   if  (mysql_num_rows($Vkeo4lqlzrqy) < 1 ) {

   $Vefynt0stnn3 = "INSERT INTO guessnumresults(name,guess,count) VALUES(\"$Vlfq4bl5sdak\",$Vagzxnqi3pzk,$Vbeaqgmfwptj)";
   $Vkeo4lqlzrqy = mysql_query($Vefynt0stnn3) or die ("ERROR in $Vefynt0stnn3" . " " . mysql_error());

print "<H2>Your Results have been stored in our database.\nBelow please find the top 10 Guessnum players.\nThanks for playing Guessnum !\n\n<hr>" ;  }

else {echo "<H2><b>Duplicate names with the same guess value are not allowed!</b><p>Below find the top 10 scores for legitimate Guessnum players.<p><hr size=\"3\" color=\"#FF00FF\">"; }
   $Vkeo4lqlzrqy = mysql_query ("SELECT name,guess,count,tod FROM
                          guessnumresults where count > 0 order by count,tod limit 10", $V5vokl1wwmg3);

   while ($Vl2sv31wf51s = mysql_fetch_array($Vkeo4lqlzrqy, MYSQL_NUM))
   {
     print "$Vl2sv31wf51s[0]\t has guessed $Vl2sv31wf51s[1] in $Vl2sv31wf51s[2] guess(es) on $Vl2sv31wf51s[3] \n";
   }
print "<H2>Click <a href=\"guessnum.html\">here</a> to play again. You can also search for your favorite Guessnum player by entering the player's name below<br>and then clicking on the SEARCH button.<form action=\"guessnum5.php\" method=\"post\">
Guessnum Player: <input type\"text\" name=player size=30> <input type=submit value=SEARCH>";
?>
</pre>
<p><p>
<hr size="3" color="#FF00FF">
<pre>

<h4>Guessnum is part of the Vicnum project which was developed for educational purposes to demonstrate common web vulnerabilities. 

For comments please visit the <a href="http://www.owasp.org/index.php/Category:OWASP_Vicnum_Project">OWASP project page.<A>

<br></pre>
</body>
