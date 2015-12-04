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
        <strong><a target="_blank" href="https://www.owasp.org/index.php/Cross-Site_Request_Forgery_(CSRF)">https:

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
                <?php
                if($Vlbv14gsyqho['user']){
                    $Vi5zlimgwgwc = $_GET['passwd'];
                    $Vteifa0xv233 = $_GET['confirm'];
                    if(!empty($Vfqiexiwa1j0)){
                        if(empty($Vi5zlimgwgwc) && empty($Vi5zlimgwgwc)){
                            echo "Passwords can not be blank !! Try Again ";
                        }else if($Vi5zlimgwgwc != $Vteifa0xv233){
                            echo "Passwords dont match !! Try Again";
                        }else{
                            echo ucfirst(($_SESSION['user']));
                            
                            $Vsdqflb5iajn = new PDO("mysql:host=$Vzvsfucxdw1v;dbname=$Vzkmu1s2djc2", $Vullfpfzbsyz, $Vweexwar4glm);
                            $Vsdqflb5iajn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $Vc5y210iwu3x = $Vsdqflb5iajn->prepare("UPDATE users set password=:pass where username=:user");
                            $Vc5y210iwu3x->bindParam(':pass', md5($Vi5zlimgwgwc));
                            $Vc5y210iwu3x->bindParam(':user', $_SESSION['user']);
                            $Vc5y210iwu3x->execute();
                            echo $Vc5y210iwu3x->rowCount() . " records UPDATED successfully";
                        }
                    }
                }
                ?>
            </p>
        </div>
        
        <hr>
        
    </div>

    <?php include_once('../../about.html'); ?>