<?php
$sp4ac737 = ''; if (isset($_POST['submit'])) { $sp7c8b3e = new DOMDocument(); $sp7c8b3e->load('coffee.xml'); $sp670bdf = new DOMXPath($sp7c8b3e); $sp693d57 = $_POST['search']; $spaac632 = '/Coffees/Coffee[@ID=\'' . $sp693d57 . '\']'; $sp4ac737 = $sp670bdf->query($spaac632); } ?>
<div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h4><a href="#">XPATH Injection </a></h4>
        
        <p align="justify">
XPTH injections are fairly similar to SQL injection with a difference that it uses XML Queries instead of SQL queries. This vulnerability occurs when application does not validate user-supplied information that constructs XML queries. An attacker can send malicious requests to the application to find out how XML data is structured and can leverage the attack to access unauthorized XML data.         </p>
        <p>Read more about XPTH Injection<br>
        <strong><a target="_blank" href="https://www.owasp.org/index.php/XPATH_Injection">https://www.owasp.org/index.php/XPATH_Injection</a></p></strong>

    </div>

</div>

<div class="well">
    <div class="col-lg-6"> 
        <p><b>Search Your Coffee</b>
            <form method='POST' action=''>
                <div class="form-group"> 
                    <label></label> 
                    <input type="text" class="form-control" placeholder="Search by ID" name="search" value="<?php  echo $sp693d57; ?>
"> </input> <br>
                    <div align="right"> <button class="btn btn-default" name="submit" type="submit">Search</button></div>
               </div> 
            </form>
        
        </p>

    </div>
      
    <?php  if (is_array($sp4ac737) || is_object($sp4ac737)) { echo '<table><tr><th>ID</th><th>&nbsp;&nbsp;</th><th>Item & Description</th></tr>'; foreach ($sp4ac737 as $sp9dabc8) { echo ' '; echo '<tr><td valign="top">' . $sp9dabc8->getElementsByTagName('ID')->item(0)->nodeValue . '</td><td>&nbsp;&nbsp;</td>'; echo '<td valign="top"><b>' . $sp9dabc8->getElementsByTagName('Name')->item(0)->nodeValue . '</b><br>' . $sp9dabc8->getElementsByTagName('Desc')->item(0)->nodeValue . '</td></tr>'; echo '<tr><td colspan=2>&nbsp;</td></tr>'; } echo '</table>'; } else { echo 'Item Not Found.'; } ?>

    <hr>
    
</div>
<?php  include_once '../../about.html';