<!DOCTYPE HTML PUBLIC
                 "-//W3C//DTD HTML 4.01 Transitional//EN"
                 "http://www.w3.org/TR/html401/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>View Vicnum table</title>
</head>
<body bgcolor=white text=navy >
<?php 
$V4xxe3r33gtv = $_GET["table"];
?>
<pre>
<?php
   $V5vokl1wwmg3 = mysql_connect("localhost","root","vicnum");

   mysql_select_db("vicnum", $V5vokl1wwmg3);

   $Vkeo4lqlzrqy = mysql_query ("SELECT name,guess,count,tod FROM
                          $V4xxe3r33gtv where count > 0 order by count,tod asc", $V5vokl1wwmg3);
   $Vbeaqgmfwptj = mysql_num_rows($Vkeo4lqlzrqy); 

print "<H2>Below please find all $Vbeaqgmfwptj Vicnum players in table $V4xxe3r33gtv\n<hr>" ;
   
   while ($Vl2sv31wf51s = mysql_fetch_array($Vkeo4lqlzrqy, MYSQL_NUM))
   {

     print "$Vl2sv31wf51s[0] has guessed $Vl2sv31wf51s[1] in $Vl2sv31wf51s[2] guess(es) on $Vl2sv31wf51s[3] \n";
   }

?>
</pre>
<p><p>
<hr size="3" color="#FF00FF">
<pre>




<h4>The Vicnum project was developed for educational purposes to demonstrate common web vulnerabilities. 

For comments please visit the <a href="http://www.owasp.org/index.php/Category:OWASP_Vicnum_Project">OWASP project page.<A>


<br></pre>
</body>
