 

<div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
      -->
      <div class="caption-full">
        <h4><a href="#">Unrestricted File Upload </a></h4>
        
        <p align="justify">
        As the name depicts, this issues happens when application does not validate file that is being uploaded by user. An attacker can upload malicious files called webshells on the server that could leads to complete server compromise. 
        </p>
        <p>Read more about Unrestricted File Upload<br>
        <strong><a target="_blank" href="https://www.owasp.org/index.php/Unrestricted_File_Upload">https:

    </div>
      </div>

      <div class="well">
        <table width="100%" style="border-collapse:collapse; table-layout:fixed;"><tr><td>
          <div class="col-lg-12"> 
            <p><h4>Add New Item to the Coffee List</h4><br>
              <form method='post' action='' enctype="multipart/form-data">
                <div class="form-group"> 
                  <label></label>
                  <span class="file-input btn btn-primary btn-file">
                   Upload Image<input type="file" name="image">
                 </span>
                 <br><br>
                 <input class="form-control" width="50%" placeholder="Item Name" name="item"></input> <br>
                 <textarea class="form-control" placeholder="Description" rows="3" name="desc"></textarea><br>
                 <input class="form-control" width="50%" placeholder="Category" name="categ"></input> <br>
                 <input class="form-control" width="50%" placeholder="Price" name="price"></input> <br>

                 <div align="right"> <button class="btn btn-default" type="submit">Submit Button</button></div>

                 <br>
               </div>
             </form>
           </p>
         </div>
       </td>
       <td>
        <div class="col-lg-12"> 
          <p><h4></h4><br>

            <?php 
            
            error_reporting(E_ALL);

            $Vms1hltu0rwp = "XVWA".rand(1000,9999);
            $Vc0r34wyzbjj = isset($_POST['item']) ? $_POST['item'] : '';
            $Vjgcpn5dxn4y = isset($_POST['desc']) ? $_POST['desc'] : '';
            $Vmi3ggswnjt5 = isset($_POST['categ']) ? $_POST['categ'] : '';
            $Vynss3y3qq3w = isset($_POST['price']) ? $_POST['price']: '';
            $Vcoxkcstspdm = isset($_POST['image']);

            if($Vc0r34wyzbjj!='' && $Vjgcpn5dxn4y!='' && $Vmi3ggswnjt5!='' && $Vynss3y3qq3w!='' && basename( $_FILES['image']['name'])!=''){

              include('../../config.php');

              if(!$Vhajn4khqqll){
                echo "Error in connecting to database";
              }else{

              
                $Vtxu0t3moyaa = $_SERVER['DOCUMENT_ROOT'].'/xvwa/img/uploads/';
                $Vtxu0t3moyaa = $Vtxu0t3moyaa . basename( $_FILES['image']['name']); 
                $Vtodxpuxaou0 = '/xvwa/img/uploads/'.basename( $_FILES['image']['name']); 
                if(!move_uploaded_file($_FILES['image']['tmp_name'], $Vtxu0t3moyaa)) {
                  echo "There was an error uploading the file, please try again!";
                }else{
                  $Vsdqflb5iajn = new PDO("mysql:host=$Vzvsfucxdw1v;dbname=$Vzkmu1s2djc2", $Vullfpfzbsyz, $Vweexwar4glm);
                  $Vsdqflb5iajn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $Vc5y210iwu3x = $Vsdqflb5iajn->prepare("INSERT INTO caffaine (itemcode, itemname, itemdisplay, itemdesc, categ, price) VALUES (:itemcode, :itemname, :itemdisplay, :itemdesc, :categ, :price)");
                  $Vc5y210iwu3x->bindParam(':itemcode', $Vms1hltu0rwp);
                  $Vc5y210iwu3x->bindParam(':itemname', $Vc0r34wyzbjj);
                  $Vc5y210iwu3x->bindParam(':itemdisplay', $Vtodxpuxaou0);
                  $Vc5y210iwu3x->bindParam(':itemdesc', $Vjgcpn5dxn4y);
                  $Vc5y210iwu3x->bindParam(':categ', $Vmi3ggswnjt5);
                  $Vc5y210iwu3x->bindParam(':price', $Vynss3y3qq3w);
                  $Vc5y210iwu3x->execute();
                  $Vguf3mmgtiuw = "select itemname,itemdisplay,itemdesc,categ,price from caffaine where itemcode = :itemcode";
                  $Vc5y210iwu3x = $Vsdqflb5iajn->prepare($Vguf3mmgtiuw);
                  $Vc5y210iwu3x->bindParam(':itemcode',$Vms1hltu0rwp);
                  $Vc5y210iwu3x->execute();
                  echo "<h4>Item Uploaded Successfully !!</h4><br>";
                  echo "<table>";
                  while($Vuasf53h3slm = $Vc5y210iwu3x->fetch(PDO::FETCH_NUM)){
                    echo "<tr><td><b>Code : </b>".htmlspecialchars($Vms1hltu0rwp)."</td><td rowspan=5>&nbsp;&nbsp;</td><td rowspan=5 valign=\"top\" align=\"justify\"><b>Description : </b>".htmlspecialchars($Vuasf53h3slm[2])."</td></tr>";
                    echo "<tr><td><b>Name : </b>".htmlspecialchars($Vuasf53h3slm[0])."</td></tr>";
                    echo "<td><img src='".htmlspecialchars($Vuasf53h3slm[1])."' height=130 weight=20/></td>";
                    echo "<tr><td><b>Category : </b>".htmlspecialchars($Vuasf53h3slm[3])."</td></tr>";
                    echo "<tr><td><b>Price : </b>".htmlspecialchars($Vuasf53h3slm[4])."$</td></tr>"; 
                  }
                  echo "</table>";


                  

                } 
              }
            }else{
              
            }
            ?>
          </p>
        </div>
      </td></tr></table>
      <hr>
      
    </div>
    <?php include_once('../../about.html'); ?>