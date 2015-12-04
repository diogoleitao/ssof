<?php
$Vqwwjuu2nhq0 = '';
if(isset($_POST['submit'])){
$Vhqdtkytlp1b = new DOMDocument;
$Vhqdtkytlp1b->load('coffee.xml');
$Vz2mlushcjai = new DOMXPath($Vhqdtkytlp1b);
$Vnwi4l0dqwxp = $_POST['search'];
$Vugvhubmzvrb = "/Coffees/Coffee[@ID='".$Vnwi4l0dqwxp."']";
#$Vqwwjuu2nhq0 = isset($Vz2mlushcjai->query($Vugvhubmzvrb)) ? $Vz2mlushcjai->query($Vugvhubmzvrb) : '';
$Vqwwjuu2nhq0 = $Vz2mlushcjai->query($Vugvhubmzvrb);
}
?>
<div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h4><a href="#">XPATH Injection </a></h4>
        
        <p align="justify">
XPTH injections are fairly similar to SQL injection with a difference that it uses XML Queries instead of SQL queries. This vulnerability occurs when application does not validate user-supplied information that constructs XML queries. An attacker can send malicious requests to the application to find out how XML data is structured and can leverage the attack to access unauthorized XML data.         </p>
        <p>Read more about XPTH Injection<br>
        <strong><a target="_blank" href="https://www.owasp.org/index.php/XPATH_Injection">https:

    </div>

</div>

<div class="well">
    <div class="col-lg-6"> 
        <p><b>Search Your Coffee</b>
            <form method='POST' action=''>
                <div class="form-group"> 
                    <label></label> 
                    <input type="text" class="form-control" placeholder="Search by ID" name="search" value="<?php echo $Vnwi4l0dqwxp;?>"> </input> <br>
                    <div align="right"> <button class="btn btn-default" name="submit" type="submit">Search</button></div>
               </div> 
            </form>
        
        </p>

    </div>
      
    <?php
        if (is_array($Vqwwjuu2nhq0) || is_object($Vqwwjuu2nhq0)){
            echo "<table><tr><th>ID</th><th>&nbsp;&nbsp;</th><th>Item & Description</th></tr>";
            foreach($Vqwwjuu2nhq0 as $V3i5mqtxi24u){
                echo " ";
                echo "<tr><td valign=\"top\">".$V3i5mqtxi24u->getElementsByTagName('ID')->item(0)->nodeValue."</td><td>&nbsp;&nbsp;</td>";
                echo "<td valign=\"top\"><b>".$V3i5mqtxi24u->getElementsByTagName('Name')->item(0)->nodeValue."</b><br>".$V3i5mqtxi24u->getElementsByTagName('Desc')->item(0)->nodeValue."</td></tr>";
                echo "<tr><td colspan=2>&nbsp;</td></tr>";
            }
            echo "</table>";
        }else{
            echo "Item Not Found.";
        }
    ?>

    <hr>
    
</div>
<?php include_once('../../about.html'); ?>