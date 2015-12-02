<?php
?>
 

<div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h4><a href="#">SQL Injection – Blind</a></h4>
        
        <p align="justify">
        Blind SQL injections are tricky to detect and exploit as the application is designed to handle errors and exceptions smartly. However the vulnerability still exists. Blind SQL injections are nearly identical to Normal or Error based SQL injections. The difference here is that user/attacker will not see any backend error message in this case. Since no errors are provided in web responses, it becomes difficult for an attacker to exploit this vulnerability. 
        </p>
        <p>Read more about Blind SQL Injection <br>
        <strong><a target="_blank" href="https://www.owasp.org/index.php/Blind_SQL_Injection">https://www.owasp.org/index.php/Blind_SQL_Injection </a></p></strong>

    </div>

    </div>

    <div class="well">
        <div class="col-lg-6"> 
            <p>Search by Itemcode or use search option  
                <form method='post' action=''>
                    <div class="form-group"> 
                        <label></label>
                        <select class="form-control" name="item">
                            <option value="">Select Item Code</option>
                            <?php  include '../../config.php'; if (!$sp696718) { echo 'Error in connecting to database'; } else { $sp81458b = mysql_select_db($sp78bdcb, $sp696718); $spdd4a2c = 'select itemid from caffaine'; $sp4ac737 = mysql_query($spdd4a2c, $sp696718); while ($sp85d32c = mysql_fetch_array($sp4ac737)) { echo '<option value="' . $sp85d32c['itemid'] . '">' . $sp85d32c['itemid'] . '</option>'; } } echo '</select><br>'; echo '<input class="form-control" width="50%" placeholder="Search" name="search"></input> <br>'; echo '<div align="right"> <button class="btn btn-default" type="submit">Submit</button></div>'; echo '</div> </form> </p>'; echo ' </div>'; $spb437e7 = isset($_POST['item']) ? $_POST['item'] : ''; $spe51584 = isset($_POST['search']) ? $_POST['search'] : ''; $spf8993d = false; if ($spb437e7 != '' && $spe51584 != '') { echo '<br><ul class="featureList">'; echo '<li class="cross">Error! Can not use both search and itemcode option. Search using either of these optoins.</li>'; echo '</ul>'; } else { if ($spb437e7) { $spdd4a2c = 'select * from caffaine where itemid = ' . $spb437e7; $sp4ac737 = mysql_query($spdd4a2c); $sp6b935e = @mysql_numrows($sp4ac737); if ($sp6b935e > 0) { $spf8993d = true; } } else { if ($spe51584) { $spdd4a2c = 'SELECT * FROM caffaine WHERE itemname LIKE \'%' . $spe51584 . '%\' OR itemdesc LIKE \'%' . $spe51584 . '%\' OR categ LIKE \'%' . $spe51584 . '%\''; $sp4ac737 = mysql_query($spdd4a2c); $sp6b935e = @mysql_numrows($sp4ac737); if ($sp6b935e > 0) { $spf8993d = true; } } } } if ($spf8993d) { echo '<table>'; while ($sp85d32c = mysql_fetch_array($sp4ac737)) { echo '<tr><td><b>Item Code : </b>' . $sp85d32c['itemcode'] . '</td><td rowspan=5>&nbsp;&nbsp;</td><td rowspan=5 valign="top" align="justify"><b>Description : </b>' . $sp85d32c['itemdesc'] . '</td></tr>'; echo '<tr><td><b>Item Name : </b>' . $sp85d32c['itemname'] . '</td></tr>'; echo '<td><img src=\'' . $sp85d32c['itemdisplay'] . '\' height=130 weight=20/></td>'; echo '<tr><td><b>Category : </b>' . $sp85d32c['categ'] . '</td></tr>'; echo '<tr><td><b>Price : </b>' . $sp85d32c['price'] . '$</td></tr>'; echo '<tr><td colspan=3><hr></td></tr>'; } echo '</table>'; } ?>




                            <hr>
                           
                        </div>
                    </div>
                </div>
                
                        <?php  include_once '../../about.html';