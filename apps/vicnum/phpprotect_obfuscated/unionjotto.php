<?php

$V52lltk52lbr = $_POST['player'] ;
$Vxkazvqwcoon = $_COOKIE['unionname'] ;
if($Vxkazvqwcoon == "") $Vxkazvqwcoon = "blank"  ;

$Vpj3dgmrp2h4 = "/<>/";
if (preg_match($Vpj3dgmrp2h4,$Vxkazvqwcoon))  {
$Vxkazvqwcoon = "XSS_unknown" ; }
?>
<!DOCTYPE HTML PUBLIC
                 "-//W3C//DTD HTML 4.01 Transitional//EN"
                 "http://www.w3.org/TR/html401/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Jotto results from the database</title>
 
</head>
<body background="images/ctech.png" text=navy>
<table  CELLPADDING="1" WIDTH="100%"> 
  <tr> 
    <td WIDTH="80%"><img src="images/jottowelcome.png">
  </tr> 
</table> 
<hr size="3" color="#FF00FF"> 
<h2><u>Search Results</u></h2>
<pre>

<?php 

echo "<h3>You are   $Vxkazvqwcoon :" ;
echo "<h3>You have requested results for Jotto player $V52lltk52lbr :" ;

   $V5vokl1wwmg3 = mysql_connect("localhost","root","vicnum");
   mysql_select_db("vicnum", $V5vokl1wwmg3);

   $Vefynt0stnn3 = "SELECT * FROM jottoresults ";
   $Vnfhnsysrmes = mysql_query($Vefynt0stnn3) or die ("ERROR in $Vefynt0stnn3" . " " . mysql_error());
   $Vmhvalwr14bi = mysql_num_rows($Vnfhnsysrmes);
 

   $Vefynt0stnn3 = "SELECT name,guess,count,tod FROM jottoresults WHERE name  = '$V52lltk52lbr'";
   $Vkeo4lqlzrqy = mysql_query($Vefynt0stnn3) or die ("ERROR in $Vefynt0stnn3" . " " . mysql_error());

   if  (mysql_num_rows($Vkeo4lqlzrqy) > $Vmhvalwr14bi ) {
   $Vefynt0stnn3 = "INSERT INTO unionresults(name,unionquery) VALUES(\"$Vxkazvqwcoon\",\"$V52lltk52lbr\")";
   $Vgpee1j4230o = mysql_query($Vefynt0stnn3) or die ("ERROR in $Vefynt0stnn3" . " " . mysql_error());
	}   

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

<h4>Jotto is part of the Vicnum project which was developed for educational purposes to demonstrate common web vulnerabilities. 

For comments please visit the <a href="http://www.owasp.org/index.php/Category:OWASP_Vicnum_Project">OWASP project page.<A>

<br></pre>
</body>

