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
<?php 
$Vlfq4bl5sdak = $_COOKIE['oreos'] ;
$Vbeaqgmfwptj = $_COOKIE['chipsahoy'] ;
$Vagzxnqi3pzk = $_COOKIE['mallomar'] ;
$Vagzxnqi3pzk =  str_rot13($Vagzxnqi3pzk);
?>
<table  CELLPADDING="1" WIDTH="100%"> 
  <tr> 
    <td WIDTH="70%"><img src="images/jottowelcome.png">
  </tr> 
</table> 
<hr size="3" color="#FF00FF"> 
<pre>
<?php
//  Following prevents stored xss
$Vyevc2hfp0p2 = "/\</";
$V3tgx3bbcotr  = "/[^0-9a-zA-Z_@.]/";
if (preg_match($V3tgx3bbcotr,$Vlfq4bl5sdak))  {
 print "<h2> name changed to unknown <p>"; $Vlfq4bl5sdak = "unknown" ;$Vbeaqgmfwptj =99; }
if (preg_match($V3tgx3bbcotr,$Vagzxnqi3pzk))  {
 print "<h2> guess changed to clean <p>"; $Vagzxnqi3pzk = "clean" ;$Vbeaqgmfwptj =99; }
   $V5vokl1wwmg3 = mysql_connect("localhost","root","vicnum");

   mysql_select_db("vicnum", $V5vokl1wwmg3);

   $Vefynt0stnn3 = "SELECT name,count,tod FROM jottoresults WHERE jottoresults.name  = '$Vlfq4bl5sdak' AND jottoresults.guess = '$Vagzxnqi3pzk'";
   $Vkeo4lqlzrqy = mysql_query($Vefynt0stnn3) or die ("ERROR in $Vefynt0stnn3" . " " . mysql_error());

   if  (mysql_num_rows($Vkeo4lqlzrqy) < 1 ) {

   $Vefynt0stnn3 = "INSERT INTO jottoresults(name,guess,count) VALUES(\"$Vlfq4bl5sdak\",\"$Vagzxnqi3pzk\",$Vbeaqgmfwptj)";
   $Vkeo4lqlzrqy = mysql_query($Vefynt0stnn3) or die ("ERROR in $Vefynt0stnn3" . " " . mysql_error());

print "<H2>Your Results have been stored in our database.\nBelow please find the top 10 Jotto players.\nThanks for playing!\n\n<hr>" ;  }

else {echo "<H2><b>Duplicate names with the same guess value are not allowed!</b><p>Below find the top 10 scores for legitimate Jotto players.<p><hr size=\"3\" color=\"#FF00FF\">"; }
   $Vkeo4lqlzrqy = mysql_query ("SELECT name,guess,count,tod FROM
                          jottoresults where count > 0 order by count,tod limit 10", $V5vokl1wwmg3);

   while ($Vl2sv31wf51s = mysql_fetch_array($Vkeo4lqlzrqy, MYSQL_NUM))
   {
     print "$Vl2sv31wf51s[0]\t has guessed $Vl2sv31wf51s[1] in $Vl2sv31wf51s[2] guess(es) on $Vl2sv31wf51s[3] \n";
   }
print "<H2>Click <a href=\"index.html\">here</a> to play again. You can also search for your favorite Jotto player by entering the player's name below<br>and then clicking on the SEARCH button.<form name=\"g\" onsubmit=\"return checktag()\" action=\"jotto5.php\" method=\"post\">
Jotto Player: <input type\"text\" name=player size=30> <input type=submit value=SEARCH>";
?>
</pre>
<p><p>
<hr size="3" color="#FF00FF">
<pre>

<h4>The Vicnum project was developed for educational purposes to demonstrate common web vulnerabilities. 

For comments please visit the <a href="http://www.owasp.org/index.php/Category:OWASP_Vicnum_Project">OWASP project page.<A>

<br></pre>
</body>
