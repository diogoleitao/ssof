<!DOCTYPE HTML PUBLIC
                 "-//W3C//DTD HTML 4.01 Transitional//EN"
                 "http://www.w3.org/TR/html401/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>All Vicnum Players</title>
</head>
<body bgcolor=white text=navy >

<h2><u>All Vicnum players</u></h2>
<hr size="3" color="#FF00FF"></h2>

<pre>
<?php
   $connection = mysql_connect("localhost","root","vicnum");

   mysql_select_db("vicnum", $connection);
// remove count below to truly see all
   $result = mysql_query ("SELECT name,guess,count,tod FROM
                          results where count > 0 order by count,tod asc", $connection);
   $cnt = mysql_num_rows($result); 

print "<H2>Below please find all $cnt Vicnum players in the database.\n<hr>" ;
   
   while ($row = mysql_fetch_array($result, MYSQL_NUM))
   {

     print "$row[0] has guessed $row[1] in $row[2] guess(es) on $row[3] \n";
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
