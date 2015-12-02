<?php
?>
 

<div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h4><a href="#">Cryptography</a></h4>
        
        <p align="justify">
        A developer should understand which cryptography should be suitable for each required modules in application, it can be encoding, encrypting or hashing. Insecure implementation of cryptography can leads to sensitive data leakage.
        </p>
        <p>Read more about Cryptography <br>
        <strong><a target="_blank" href="https://www.owasp.org/index.php/Guide_to_Cryptography">https://www.owasp.org/index.php/Guide_to_Cryptography</a></p></strong>

    </div>
    </div>

    <div class="well">
        <div class="col-lg-6"> 


            <p>Enter your text here.  
                <form method='get' action=''>
                    <div class="form-group"> 
                        <label></label>
                        <input class="form-control" width="50%" placeholder="Enter Your Text" name="item"></input> <br>
                        <div align="right"> <button class="btn btn-default" type="submit">Submit Button</button></div>
                    </div> 
                </form>
                </div>
                </p>
        

        <hr>
        <div class="col-lg-8">
                <?php  $sp79fd89 = $_GET['item']; if ($sp79fd89) { echo '<table style="border-collapse:collapse; table-layout:fixed; width:700px;">'; echo '<tr><th width>Crypto Used</th><th>Value</th></tr>'; echo '<tr><td style="word-wrap:break-word;">Base64 Encode</td>'; echo '<td style="word-wrap:break-word;">' . base64_encode($sp79fd89) . '</td></tr>'; echo '<tr><td colspan=2>&nbsp;&nbsp;</td></tr>'; echo '<tr><td style="word-wrap:break-word;">AES Encryption<br>'; $spd888fc = pack('H*', 'bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3'); $sp6b5133 = strlen($spd888fc); echo 'Key Size : ' . $sp6b5133 . '</td>'; $sp576852 = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC); $sp37160d = mcrypt_create_iv($sp576852, MCRYPT_RAND); $sp27d468 = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $spd888fc, $sp79fd89, MCRYPT_MODE_CBC, $sp37160d); $sp27d468 = $sp37160d . $sp27d468; $spe418a7 = base64_encode($sp27d468); echo '<td style="word-wrap:break-word;">' . $spe418a7 . '</td></tr>'; echo '<tr><td colspan=2>&nbsp;&nbsp;</td></tr>'; echo '<tr><td style="word-wrap:break-word;">MD5 Hashing without salt</td>'; echo '<td style="word-wrap:break-word;">' . md5($sp79fd89) . '</td></tr>'; echo '<tr><td colspan=2>&nbsp;&nbsp;</td></tr>'; include_once 'PasswordHash.php'; echo '<tr><td style="word-wrap:break-word;">PBKDF2 with sha256 and 1000 iteration <br> (salt : hash)</td>'; echo '<td style="word-wrap:break-word;">' . create_hash($sp79fd89) . '</td></tr>'; echo '<tr><td colspan=2>&nbsp;&nbsp;</td></tr>'; } ?>
            </table>
        </div>
        
    </div>
<?php  include_once '../../about.html';