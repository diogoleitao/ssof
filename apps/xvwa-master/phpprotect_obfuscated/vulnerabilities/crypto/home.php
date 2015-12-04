 

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
        <strong><a target="_blank" href="https://www.owasp.org/index.php/Guide_to_Cryptography">https:

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
                <?php
                
                $Vwra1z4uhffo = $_GET['item'];
                if($Vwra1z4uhffo){

                    echo "<table style=\"border-collapse:collapse; table-layout:fixed; width:700px;\">";
                    echo "<tr><th width>Crypto Used</th><th>Value</th></tr>";
                    # --- ENCODING ---
                    echo "<tr><td style=\"word-wrap:break-word;\">Base64 Encode</td>";
                    echo "<td style=\"word-wrap:break-word;\">". base64_encode($Vwra1z4uhffo)."</td></tr>";
                    echo "<tr><td colspan=2>&nbsp;&nbsp;</td></tr>";

                    # --- ENCRYPTION ---
                    echo "<tr><td style=\"word-wrap:break-word;\">AES Encryption<br>"; 
                
                    $Vks5xpccznyi = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");

                    $Vks5xpccznyi_size =  strlen($Vks5xpccznyi);
                    echo "Key Size : " . $Vks5xpccznyi_size. "</td>";

                    # create a random IV to use with CBC encoding
                    $Vvugqlvn3rzr = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
                    $Vs5ihqqhjyk3 = mcrypt_create_iv($Vvugqlvn3rzr, MCRYPT_RAND);

                    # creates a cipher text compatible with AES (Rijndael block size = 128)
                    $V1bdnscmoz3z = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $Vks5xpccznyi,
                     $Vwra1z4uhffo, MCRYPT_MODE_CBC, $Vs5ihqqhjyk3);

                    # prepend the IV for it to be available for decryption
                    $V1bdnscmoz3z = $Vs5ihqqhjyk3 . $V1bdnscmoz3z;

                    # encode the resulting cipher text so it can be represented by a string
                    $V1bdnscmoz3z_base64 = base64_encode($V1bdnscmoz3z);

                    echo  "<td style=\"word-wrap:break-word;\">". $V1bdnscmoz3z_base64 . "</td></tr>";
                    echo "<tr><td colspan=2>&nbsp;&nbsp;</td></tr>";
                
                    # --- HASHING ---

                    echo "<tr><td style=\"word-wrap:break-word;\">MD5 Hashing without salt</td>";
                    echo "<td style=\"word-wrap:break-word;\">" . md5($Vwra1z4uhffo)."</td></tr>";
                    echo "<tr><td colspan=2>&nbsp;&nbsp;</td></tr>";

                    include_once('PasswordHash.php');
                    echo "<tr><td style=\"word-wrap:break-word;\">PBKDF2 with sha256 and 1000 iteration <br> (salt : hash)</td>";
                    echo "<td style=\"word-wrap:break-word;\">" . create_hash($Vwra1z4uhffo)."</td></tr>";
                    echo "<tr><td colspan=2>&nbsp;&nbsp;</td></tr>";
                }
                ?>
            </table>
        </div>
        
    </div>
<?php include_once('../../about.html'); ?>