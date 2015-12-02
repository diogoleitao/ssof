<?php
?>
<div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h4><a href="#">Cross Site Request Forgery (CSRF)</a></h4>
        
        <p align="justify">
        CSRF attacks are tricky to identify and exploit as it has certain requirements to fulfill before successful attack. Firstly, a victim has to be in active session, i.e., he should be already logged in. Secondly, an attacker should be able to predict the requests wherein CSRF issues exists and trick victim to click on it. 
        <br></p><p>Login to the application before exploring this vulnerbility. </p>
        <p>Read more about Cross Site Request Forgery (CSRF)<br>
        <strong><a target="_blank" href="https://www.owasp.org/index.php/Cross-Site_Request_Forgery_(CSRF)">https://www.owasp.org/index.php/Cross-Site_Request_Forgery_(CSRF) </a></p></strong>

    </div>
    </div>

    <div class="well">
        <div class="col-lg-6"> 
            <p><h4>Change your password</h4>  
                <form method='get' action=''>
                    <div class="form-group"> 
                        <label></label>
                        <input type="password" class="form-control" width="50%" placeholder="Enter new password" name="passwd"></input> <br>
                        <input type="password" class="form-control" width="50%" placeholder="Confirm new password" name="confirm"></input> <br>
                        <div align="right"> <button class="btn btn-default" type="submit" name="submit" value="submit">Submit Button</button></div>
                    </div> 
                </form>
                <?php  if ($spcd30bf['user']) { $spc2ca96 = $_GET['passwd']; $sp0ca4db = $_GET['confirm']; if (!empty($sp9eeb23)) { if (empty($spc2ca96) && empty($spc2ca96)) { echo 'Passwords can not be blank !! Try Again '; } else { if ($spc2ca96 != $sp0ca4db) { echo 'Passwords dont match !! Try Again'; } else { echo ucfirst($_SESSION['user']); $sp696718 = new PDO("mysql:host={$sp2f475e};dbname={$sp78bdcb}", $sp132538, $sp24f4f3); $sp696718->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $spf288b9 = $sp696718->prepare('UPDATE users set password=:pass where username=:user'); $spf288b9->bindParam(':pass', md5($spc2ca96)); $spf288b9->bindParam(':user', $_SESSION['user']); $spf288b9->execute(); echo $spf288b9->rowCount() . ' records UPDATED successfully'; } } } } ?>
            </p>
        </div>
        
        <hr>
        
    </div>

    <?php  include_once '../../about.html';