<?php
?>
 

<div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h4><a href="#">Insecure Direct Object Reference </a></h4>
        
        <p align="justify">
        This vulnerability happens when the application exposes direct objects to an internal resource, such as files, directory, keys etc. Such mechanisms could lead an attacker to predict objects that would refer to unauthorized resources as well. 
        </p>
        <p>Read more about Insecure Direct Object Reference  <br>
        <strong><a target="_blank" href="https://www.owasp.org/index.php/Testing_for_Insecure_Direct_Object_References_(OTG-AUTHZ-004)">https://www.owasp.org/index.php/Testing_for_Insecure_Direct_Object_References_(OTG-AUTHZ-004) </a></p></strong>

    </div>
    </div>

    <div class="well">
        <div class="col-lg-6"> 
            <p>Search by Itemcode or use search option  
                <form method='GET' action=''>
                    <div class="form-group"> 
                        <label></label>
                        <select class="form-control" name="item">
                            <option value="">Select Item Code</option>
                            <?php  if (!$sp696718) { echo 'Error in connecting to database'; } else { $sp81458b = mysql_select_db($sp78bdcb, $sp696718); $spdd4a2c = 'select itemid from caffaine LIMIT 5'; $sp4ac737 = mysql_query($spdd4a2c, $sp696718); while ($sp85d32c = mysql_fetch_array($sp4ac737)) { echo '<option value="' . $sp85d32c['itemid'] . '">' . $sp85d32c['itemid'] . '</option>'; } } echo '</select><br>'; echo '<div align="right"> <button class="btn btn-default" type="submit">Submit</button></div>'; echo '</div> </form> </p>'; echo '</div>'; $spb437e7 = isset($_GET['item']) ? $_GET['item'] : ''; $sp696718 = new PDO("mysql:host={$sp2f475e};dbname={$sp78bdcb}", $sp132538, $sp24f4f3); $sp696718->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $spdd4a2c = 'select itemcode,itemname,itemdisplay,itemdesc,categ,price from caffaine where itemid = :itemid'; $spf288b9 = $sp696718->prepare($spdd4a2c); $spf288b9->bindParam(':itemid', $spb437e7); $spf288b9->execute(); echo '<table>'; while ($sp85d32c = $spf288b9->fetch(PDO::FETCH_NUM)) { echo '<tr><td><b>Item Code : </b>' . htmlspecialchars($sp85d32c[0]) . '</td><td rowspan=5>&nbsp;&nbsp;</td><td rowspan=5 valign="top" align="justify"><b>Description : </b>' . htmlspecialchars($sp85d32c[3]) . '</td></tr>'; echo '<tr><td><b>Item Name : </b>' . htmlspecialchars($sp85d32c[1]) . '</td></tr>'; echo '<td><img src=\'' . htmlspecialchars($sp85d32c[2]) . '\' height=130 weight=20/></td>'; echo '<tr><td><b>Category : </b>' . htmlspecialchars($sp85d32c[4]) . '</td></tr>'; echo '<tr><td><b>Price : </b>' . htmlspecialchars($sp85d32c[5]) . '$</td></tr>'; echo '<tr><td colspan=3><hr></td></tr>'; } echo '</table>'; ?>



                            <hr>
                            
                        </div>
                    </div>
                </div>
                
                <?php  include_once '../../about.html';