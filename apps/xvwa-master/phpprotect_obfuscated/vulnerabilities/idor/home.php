 

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
        <strong><a target="_blank" href="https://www.owasp.org/index.php/Testing_for_Insecure_Direct_Object_References_(OTG-AUTHZ-004)">https:

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
                            <?php
                            if(!$Vsdqflb5iajn){
                                echo "Error in connecting to database";

                            }else{
                                $Vmp55p50wnro=mysql_select_db($Vzkmu1s2djc2,$Vsdqflb5iajn);
                                $Vguf3mmgtiuw = 'select itemid from caffaine LIMIT 5';
                                $Vqwwjuu2nhq0 = mysql_query($Vguf3mmgtiuw,$Vsdqflb5iajn);
                                while($Vuasf53h3slm = mysql_fetch_array($Vqwwjuu2nhq0)){
                                    echo "<option value=\"".$Vuasf53h3slm['itemid']."\">".$Vuasf53h3slm['itemid']."</option>";
                                }
                            } 

                            echo "</select><br>";
                            echo "<div align=\"right\"> <button class=\"btn btn-default\" type=\"submit\">Submit</button></div>";

                            echo "</div> </form> </p>";
                            echo "</div>";
                            $Vcsi2wocrpxd = isset($_GET['item']) ? $_GET['item'] : '';
                            $Vsdqflb5iajn = new PDO("mysql:host=$Vzvsfucxdw1v;dbname=$Vzkmu1s2djc2", $Vullfpfzbsyz, $Vweexwar4glm);
                            $Vsdqflb5iajn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $Vguf3mmgtiuw = "select itemcode,itemname,itemdisplay,itemdesc,categ,price from caffaine where itemid = :itemid";
                            $Vc5y210iwu3x = $Vsdqflb5iajn->prepare($Vguf3mmgtiuw);
                            $Vc5y210iwu3x->bindParam(':itemid',$Vcsi2wocrpxd);
                            $Vc5y210iwu3x->execute();
                            echo "<table>";
                            while($Vuasf53h3slm = $Vc5y210iwu3x->fetch(PDO::FETCH_NUM)){
                                echo "<tr><td><b>Item Code : </b>".htmlspecialchars($Vuasf53h3slm[0])."</td><td rowspan=5>&nbsp;&nbsp;</td><td rowspan=5 valign=\"top\" align=\"justify\"><b>Description : </b>".htmlspecialchars($Vuasf53h3slm[3])."</td></tr>";
                                echo "<tr><td><b>Item Name : </b>".htmlspecialchars($Vuasf53h3slm[1])."</td></tr>";
                                echo "<td><img src='".htmlspecialchars($Vuasf53h3slm[2])."' height=130 weight=20/></td>";
                                echo "<tr><td><b>Category : </b>".htmlspecialchars($Vuasf53h3slm[4])."</td></tr>";
                                echo "<tr><td><b>Price : </b>".htmlspecialchars($Vuasf53h3slm[5])."$</td></tr>"; 
                                echo "<tr><td colspan=3><hr></td></tr>";
                            }
                            echo "</table>";

                            ?>



                            <hr>
                            
                        </div>
                    </div>
                </div>
                
                <?php include_once('../../about.html'); ?>