 

<div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h4><a href="#">SQL Injection – Error Based</a></h4>
        
        <p align="justify">
        SQL injection considerably one of the most critical issues in application security is an attack technique by which a malicious user can run SQL code with the privilege on which the application is configured. Error based SQL injections are easy to detect and exploit further. It responds to user’s request with detailed backend error messages. These error messages are generated because of specially designed user requests such that it breaks the SQL query syntax used in the application. 
        </p>
        <p>Read more about SQL Injection <br>
        <strong><a target="_blank" href="https://www.owasp.org/index.php/SQL_Injection">https:

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
                            <?php
                            include('../../config.php');
                            if(!$Vsdqflb5iajn){
                                echo "Error in connecting to database";

                            }else{
                                $Vmp55p50wnro=mysql_select_db($Vzkmu1s2djc2,$Vsdqflb5iajn);
                                $Vguf3mmgtiuw = 'select itemid from caffaine';
                                $Vqwwjuu2nhq0 = mysql_query($Vguf3mmgtiuw,$Vsdqflb5iajn);
                                while($Vuasf53h3slm = mysql_fetch_array($Vqwwjuu2nhq0)){
                                    echo "<option value=\"".$Vuasf53h3slm['itemid']."\">".$Vuasf53h3slm['itemid']."</option>";
                                }
                            } 

                            echo "</select><br>";
                            echo "<input class=\"form-control\" width=\"50%\" placeholder=\"Search\" name=\"search\"></input> <br>";
                            echo "<div align=\"right\"> <button class=\"btn btn-default\" type=\"submit\">Submit</button></div>";
                            echo "</div> </form> </p>";
                            echo "</div>";
                            $Vcsi2wocrpxd = isset($_POST['item']) ? $_POST['item'] : '';
                            $Ve0t4ja1z1xi = isset($_POST['search']) ? $_POST['search'] : '';
                            $Vgtf1gsqo3qh = false;
                            if(($Vcsi2wocrpxd!="") && $Ve0t4ja1z1xi!=""){ 
                                echo "<br><ul class=\"featureList\">";
                                echo "<li class=\"cross\">Error! Can not use both search and itemcode option. Search using either of these optoins.</li>";
                                echo "</ul>";
                            }else if($Vcsi2wocrpxd){
                                $Vguf3mmgtiuw = "select * from caffaine where itemid = ".$Vcsi2wocrpxd;
                                $Vqwwjuu2nhq0 = mysql_query($Vguf3mmgtiuw) or die(mysql_error());
                                $Vgtf1gsqo3qh = true;
                            }else if($Ve0t4ja1z1xi){
                                $Vguf3mmgtiuw = "SELECT * FROM caffaine WHERE itemname LIKE '%" . $Ve0t4ja1z1xi . "%' OR itemdesc LIKE '%" . $Ve0t4ja1z1xi . "%' OR categ LIKE '%" . $Ve0t4ja1z1xi . "%'";
                                $Vqwwjuu2nhq0 = mysql_query($Vguf3mmgtiuw) or die(mysql_error());
                                $Vgtf1gsqo3qh = true;
                            }
                            if($Vgtf1gsqo3qh){
                                echo "<table>";
                                while($Vuasf53h3slm = mysql_fetch_array($Vqwwjuu2nhq0)){
                                    echo "<tr><td><b>Item Code : </b>".$Vuasf53h3slm['itemcode']."</td><td rowspan=5>&nbsp;&nbsp;</td><td rowspan=5 valign=\"top\" align=\"justify\"><b>Description : </b>".$Vuasf53h3slm['itemdesc']."</td></tr>";
                                    echo "<tr><td><b>Item Name : </b>".$Vuasf53h3slm['itemname']."</td></tr>";
                                    echo "<td><img src='".$Vuasf53h3slm['itemdisplay']."' height=130 weight=20/></td>";
                                    echo "<tr><td><b>Category : </b>".$Vuasf53h3slm['categ']."</td></tr>";
                                    echo "<tr><td><b>Price : </b>".$Vuasf53h3slm['price']."$</td></tr>"; 
                                    echo "<tr><td colspan=3><hr></td></tr>";
                                }
                                echo "</table>"; 
                            }

                            ?>



                            <hr>
                            
                        </div>
                    </div>
                </div>
                
                <?php include_once('../../about.html'); ?>