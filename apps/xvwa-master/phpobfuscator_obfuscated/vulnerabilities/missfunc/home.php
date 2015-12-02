<?php
?>
 

<div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h4><a href="#">Missing Functional Level Access Control </a></h4>
        
        <p align="justify">
        This vulnerability exists when the application has insufficient access rights protection. Application sometimes hides sensitive actions from user roles but forget to ensure the access rights if the user tries to predict/use specific parameter to trigger those action. This issue could lead to much more complex and affect the business logic as well.  
        </p>
        <p>Read more about Missing Functional Level Access Control <br>
        <strong><a target="_blank" href="https://www.owasp.org/index.php/Top_10_2013-A7-Missing_Function_Level_Access_Control">https://www.owasp.org/index.php/Top_10_2013-A7-Missing_Function_Level_Access_Control </a></p></strong>

    </div>

    </div>

    <div class="well">
        <div class="col-lg-6"> 
            <p>Search by Itemcode to view the details  
                <form method='GET' action=''>
                    <div class="form-group"> 
                        <label></label>
                        <select class="form-control" name="item">
                            <option value="">Select Item Code</option>
                            <?php  if (!$sp696718) { echo 'Error in connecting to database'; } else { $sp81458b = mysql_select_db($sp78bdcb, $sp696718); $spdd4a2c = 'select itemid from caffaine'; $sp4ac737 = mysql_query($spdd4a2c, $sp696718); while ($sp85d32c = mysql_fetch_array($sp4ac737)) { echo '<option value="' . $sp85d32c['itemid'] . '">' . $sp85d32c['itemid'] . '</option>'; } } echo '</select><br>'; echo '<div align=\'right\'> <button class=\'btn btn-default\' type=\'submit\' name=\'action\' value=\'view\'>View</button>&nbsp;&nbsp;'; if ($_SESSION['user'] == 'admin') { echo '<button class=\'btn btn-default\' type=\'submit\' name=\'action\' value=\'delete\'>Delete</button></div>'; } else { echo '</div>'; } echo '</div> </form> </p>'; echo '</div>'; $spb437e7 = isset($_GET['item']) ? $_GET['item'] : ''; $sp370fcd = isset($_GET['action']) ? $_GET['action'] : ''; $sp696718 = new PDO("mysql:host={$sp2f475e};dbname={$sp78bdcb}", $sp132538, $sp24f4f3); $sp696718->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); if ($sp370fcd == 'view') { $spdd4a2c = 'select itemcode,itemname,itemdisplay,itemdesc,categ,price from caffaine where itemid = :itemid'; $spf288b9 = $sp696718->prepare($spdd4a2c); $spf288b9->bindParam(':itemid', $spb437e7); $spf288b9->execute(); echo '<table>'; while ($sp85d32c = $spf288b9->fetch(PDO::FETCH_NUM)) { echo '<tr><td><b>Item Code : </b>' . htmlspecialchars($sp85d32c[0]) . '</td><td rowspan=5>&nbsp;&nbsp;</td><td rowspan=5 valign="top" align="justify"><b>Description : </b>' . htmlspecialchars($sp85d32c[3]) . '</td></tr>'; echo '<tr><td><b>Item Name : </b>' . htmlspecialchars($sp85d32c[1]) . '</td></tr>'; echo '<td><img src=\'' . htmlspecialchars($sp85d32c[2]) . '\' height=130 weight=20/></td>'; echo '<tr><td><b>Category : </b>' . htmlspecialchars($sp85d32c[4]) . '</td></tr>'; echo '<tr><td><b>Price : </b>' . htmlspecialchars($sp85d32c[5]) . '$</td></tr>'; echo '<tr><td colspan=3><hr></td></tr>'; } echo '</table>'; } else { if ($sp370fcd == 'delete') { $spdd4a2c = 'delete from caffaine where itemid=:itemid'; $spf288b9 = $sp696718->prepare($spdd4a2c); $spf288b9->bindParam(':itemid', $spb437e7); $spf288b9->execute(); if ($spf288b9->rowCount()) { echo 'Item deleted successfully.'; } } } ?>



                            <hr>
                            
                        </div>
                    </div>
                </div>
                
                <?php  include_once '../../about.html';