<?php
?>
 

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
        <strong><a target="_blank" href="https://www.owasp.org/index.php/Unrestricted_File_Upload">https://www.owasp.org/index.php/Unrestricted_File_Upload</a></p></strong>

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

            <?php  error_reporting(E_ALL); $spad1b55 = 'XVWA' . rand(1000, 9999); $spd2dcd4 = isset($_POST['item']) ? $_POST['item'] : ''; $sp795075 = isset($_POST['desc']) ? $_POST['desc'] : ''; $sp295d2a = isset($_POST['categ']) ? $_POST['categ'] : ''; $sp2912ed = isset($_POST['price']) ? $_POST['price'] : ''; $spbc7ef6 = isset($_POST['image']); if ($spd2dcd4 != '' && $sp795075 != '' && $sp295d2a != '' && $sp2912ed != '' && basename($_FILES['image']['name']) != '') { include '../../config.php'; if (!$spa13f94) { echo 'Error in connecting to database'; } else { $sp970445 = $_SERVER['DOCUMENT_ROOT'] . '/xvwa/img/uploads/'; $sp970445 = $sp970445 . basename($_FILES['image']['name']); $spf707b8 = '/xvwa/img/uploads/' . basename($_FILES['image']['name']); if (!move_uploaded_file($_FILES['image']['tmp_name'], $sp970445)) { echo 'There was an error uploading the file, please try again!'; } else { $sp696718 = new PDO("mysql:host={$sp2f475e};dbname={$sp78bdcb}", $sp132538, $sp24f4f3); $sp696718->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $spf288b9 = $sp696718->prepare('INSERT INTO caffaine (itemcode, itemname, itemdisplay, itemdesc, categ, price) VALUES (:itemcode, :itemname, :itemdisplay, :itemdesc, :categ, :price)'); $spf288b9->bindParam(':itemcode', $spad1b55); $spf288b9->bindParam(':itemname', $spd2dcd4); $spf288b9->bindParam(':itemdisplay', $spf707b8); $spf288b9->bindParam(':itemdesc', $sp795075); $spf288b9->bindParam(':categ', $sp295d2a); $spf288b9->bindParam(':price', $sp2912ed); $spf288b9->execute(); $spdd4a2c = 'select itemname,itemdisplay,itemdesc,categ,price from caffaine where itemcode = :itemcode'; $spf288b9 = $sp696718->prepare($spdd4a2c); $spf288b9->bindParam(':itemcode', $spad1b55); $spf288b9->execute(); echo '<h4>Item Uploaded Successfully !!</h4><br>'; echo '<table>'; while ($sp85d32c = $spf288b9->fetch(PDO::FETCH_NUM)) { echo '<tr><td><b>Code : </b>' . htmlspecialchars($spad1b55) . '</td><td rowspan=5>&nbsp;&nbsp;</td><td rowspan=5 valign="top" align="justify"><b>Description : </b>' . htmlspecialchars($sp85d32c[2]) . '</td></tr>'; echo '<tr><td><b>Name : </b>' . htmlspecialchars($sp85d32c[0]) . '</td></tr>'; echo '<td><img src=\'' . htmlspecialchars($sp85d32c[1]) . '\' height=130 weight=20/></td>'; echo '<tr><td><b>Category : </b>' . htmlspecialchars($sp85d32c[3]) . '</td></tr>'; echo '<tr><td><b>Price : </b>' . htmlspecialchars($sp85d32c[4]) . '$</td></tr>'; } echo '</table>'; } } } else { } ?>
          </p>
        </div>
      </td></tr></table>
      <hr>
      
    </div>
    <?php  include_once '../../about.html';