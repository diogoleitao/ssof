 

 <div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h4><a href="#">Cross Site Scripting (XSS) – Stored</a></h4>
        
        <p align="justify">
Stored Cross Site Scripting attacks happen when the application doesn’t validate user inputs against malicious scripts, and it occurs when these scripts get stored on the database. Victim gets infected when they visit web page that loads these malicious scripts from database. For instances, message forum, comments page, visitor logs, profile page, etc.         </p>
        <p>Read more about Stored XSS <br>
        <strong><a target="_blank" href="https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)#Stored_XSS_Attacks">https:

    </div>


</div>

<div class="well">
    <div class="col-lg-6"> 
        <p>  <h4>Post Your Comments </h4>
            <form method='post' action=''>
                <div class="form-group"> 
                    <label></label>
                    <b>Enter Name</b>
                    <input class="form-control" placeholder="Anonymous" name="name"></input> <br>
                    <b>Enter Comment</b>
                    <textarea class="form-control" name="msg"> </textarea> <br>
                    <div align="right"> <button class="btn btn-default" type="submit">Submit Button</button></div>
               </div> 
            </form>
        </p>
    </div>
        <hr>
        <?php
        include_once('../../config.php');
        $Vsdqflb5iajn=new mysqli($Vmocuelulxkl,$Vullfpfzbsyz,$Vweexwar4glm,$Vzkmu1s2djc2);

        $Vullfpfzbsyz = isset($_POST['name']) ? $_POST['name'] : '';
        $V2c2vwuc1bic = isset($_POST['msg']) ? $_POST['msg'] : '';
        if($V2c2vwuc1bic){
            if(!$Vullfpfzbsyz){
                $Vullfpfzbsyz = "Anonymous";
            }
            $Voacn2pzjwax = date("d M Y");
            
            $Vc5y210iwu3x = $Vsdqflb5iajn->prepare("insert into comments (user,comment,date) values(?,?,?)");
            $Vc5y210iwu3x->bind_param("sss",$Vullfpfzbsyz,$V2c2vwuc1bic,$Voacn2pzjwax);
            $Vc5y210iwu3x->execute();



        }

        $Vc5y210iwu3x = $Vsdqflb5iajn->prepare("select user,comment,date from comments"); 

        if ($Vc5y210iwu3x->execute()) {
            $Vc5y210iwu3x->store_result();
            $Vc5y210iwu3x->bind_result($Vvz5akn2vgvu,$V4ao5f3dmv12,$V5wngp4dumhe);
            while ($Vc5y210iwu3x->fetch()) {
                echo "<div class=\"row\">";
                echo "<div class=\"col-md-12\">";
                echo "<span class=\"glyphicon glyphicon-star\"></span> &nbsp;";
                    echo ucfirst($Vvz5akn2vgvu);
                echo "<span class=\"pull-right\">",$V5wngp4dumhe."</span>";
                echo "<p>".$V4ao5f3dmv12."</p>";
                echo "</div>";
                echo "</div><hr>";

            }
        } 

        ?>

        <hr>

        

</div>
<?php include_once('../../about.html'); ?>