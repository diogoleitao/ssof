<?php

$V52lltk52lbr = $_POST['player'] ;
?>
<!DOCTYPE HTML PUBLIC
                 "-//W3C//DTD HTML 4.01 Transitional//EN"
                 "http://www.w3.org/TR/html401/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Guessnum results from the database</title>
 
</head>
<body background="images/ctech.png" text=navy>
<table  CELLPADDING="1" WIDTH="100%"> 
  <tr> 
    <td WIDTH="80%"><img src="images/guessnumwelcome.png">
  </tr> 
</table> 
<hr size="3" color="#FF00FF"> 
<h2><u>Search Results</u></h2>
<pre>

<?php 

echo "<h3>You have requested results for Guessnum player $V52lltk52lbr :" ;

   $V5vokl1wwmg3 = mysql_connect("localhost","root","vicnum");
   mysql_select_db("vicnum", $V5vokl1wwmg3);

   $Vefynt0stnn3 = "SELECT name,guess,count,tod FROM guessnumresults WHERE name  = '$V52lltk52lbr'";
   $Vkeo4lqlzrqy = mysql_query($Vefynt0stnn3) or die ("ERROR in $Vefynt0stnn3" . " " . mysql_error());

   if  (mysql_num_rows($Vkeo4lqlzrqy) > 0 ) {
   while ($Vl2sv31wf51s = mysql_fetch_array($Vkeo4lqlzrqy, MYSQL_NUM))
   {

      print "\n\n";

     print "$Vl2sv31wf51s[0] has guessed $Vl2sv31wf51s[1] in $Vl2sv31wf51s[2] guess(es) on $Vl2sv31wf51s[3] \n";
   }
}
else
{
echo ' but no entries were found.<br><p>' ;
}
?>
</pre>
<hr size="3" color="#FF00FF">
 <a href="index.html">Play Again</a>
<p><p>
<hr size="3" color="#FF00FF">
<pre>

<h4>Guessnum is part of the Vicnum project which was developed for educational purposes to demonstrate common web vulnerabilities. 

For comments please visit the <a href="http://www.owasp.org/index.php/Category:OWASP_Vicnum_Project">OWASP project page.<A>

<br></pre>
</body>
