<!DOCTYPE HTML PUBLIC
                 "-//W3C//DTD HTML 4.01 Transitional//EN"
                 "http://www.w3.org/TR/html401/loose.dtd">
<html>
<?php 
$Vegtsmeoqhyk = $_GET["admin"] ;
$Vxkazvqwcoon = $_GET["unionname"] ;
setcookie("unionname",$Vxkazvqwcoon) ;
?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Union Challenge result</title>
</head>
<body background="images/ctech.png" text=navy>
<table  CELLPADDING="1" WIDTH="100%"> 
  <tr> 
    <td WIDTH="80%"><img src="images/unionwelcome.png">
  </tr> 
</table> 
<hr size="3" color="#FF00FF"> 
<pre>
<?php 
print "<H2> $Vxkazvqwcoon,\n" ;  
   $V5vokl1wwmg3 = mysql_connect("localhost","root","vicnum");
   mysql_select_db("vicnum", $V5vokl1wwmg3);
   $Vefynt0stnn3 = "SELECT name,tod FROM unionresults ";
   $Vkeo4lqlzrqy = mysql_query($Vefynt0stnn3) or die ("ERROR in $Vefynt0stnn3" . " " . mysql_error());

   if  (mysql_num_rows($Vkeo4lqlzrqy) < 1 ) {

print "<H2>No one has successfully completed the Union Challenge\n" ;  }

else {
   if ($Vegtsmeoqhyk=="Q") {$Vkeo4lqlzrqy = mysql_query ("SELECT name,unionquery,tod FROM
                          unionresults order by tod ", $V5vokl1wwmg3);
   		while ($Vl2sv31wf51s = mysql_fetch_array($Vkeo4lqlzrqy, MYSQL_NUM))
   		{
     		print "<H2>$Vl2sv31wf51s[0]\t used $Vl2sv31wf51s[1] on $Vl2sv31wf51s[2] \n";
   		}	
		   }
   else {$Vkeo4lqlzrqy = mysql_query ("SELECT name,tod FROM
                          unionresults order by tod ", $V5vokl1wwmg3);
	 }
   		while ($Vl2sv31wf51s = mysql_fetch_array($Vkeo4lqlzrqy, MYSQL_NUM))
   		{
     		print "<H2>$Vl2sv31wf51s[0]\t completed the challenge on $Vl2sv31wf51s[1] \n";
   		}
   	}
?>
<hr size="3" color="#FF00FF">
<H2>You can search for your favorite Guessnum player by entering the player's name below<br>and then clicking on the SEARCH button.<form action="unionguessnum.php" method="post">
Guessnum Player: <input type=text name=player size=50> <input type=submit value=SEARCH>
</form>
</pre>
<hr size="3" color="#FF00FF">
<pre>

<H2>You can also search for your favorite Jotto player by entering the player's name below<br>and then clicking on the SEARCH button.<form action="unionjotto.php" method="post">
Jotto Player: <input type=text name=player size=50> <input type=submit value=SEARCH>
</form>
<hr size="3" color="#FF00FF">
<h4>The Union Challenge is part of the Vicnum project which was developed for educational purposes to demonstrate common web vulnerabilities. 

For comments please visit the <a href="http://www.owasp.org/index.php/Category:OWASP_Vicnum_Project">OWASP project page.<A>

<br></pre>
</body>
