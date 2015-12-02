<?php
?>
 

 <div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h4><a href="#">Cross Site Scripting (XSS) – Stored</a></h4>
        
        <p align="justify">
Stored Cross Site Scripting attacks happen when the application doesn’t validate user inputs against malicious scripts, and it occurs when these scripts get stored on the database. Victim gets infected when they visit web page that loads these malicious scripts from database. For instances, message forum, comments page, visitor logs, profile page, etc.         </p>
        <p>Read more about Stored XSS <br>
        <strong><a target="_blank" href="https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)#Stored_XSS_Attacks">https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)#Stored_XSS_Attacks</a></p></strong>

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
        <?php  include_once '../../config.php'; $sp696718 = new mysqli($sp171f18, $sp132538, $sp24f4f3, $sp78bdcb); $sp132538 = isset($_POST['name']) ? $_POST['name'] : ''; $spd607e7 = isset($_POST['msg']) ? $_POST['msg'] : ''; if ($spd607e7) { if (!$sp132538) { $sp132538 = 'Anonymous'; } $spad783c = date('d M Y'); $spf288b9 = $sp696718->prepare('insert into comments (user,comment,date) values(?,?,?)'); $spf288b9->bind_param('sss', $sp132538, $spd607e7, $spad783c); $spf288b9->execute(); } $spf288b9 = $sp696718->prepare('select user,comment,date from comments'); if ($spf288b9->execute()) { $spf288b9->store_result(); $spf288b9->bind_result($spadb0bc, $sp0b8ab2, $sp9387f1); while ($spf288b9->fetch()) { echo '<div class="row">'; echo '<div class="col-md-12">'; echo '<span class="glyphicon glyphicon-star"></span> &nbsp;'; echo ucfirst($spadb0bc); echo '<span class="pull-right">', $sp9387f1 . '</span>'; echo '<p>' . $sp0b8ab2 . '</p>'; echo '</div>'; echo '</div><hr>'; } } ?>

        <hr>

        

</div>
<?php  include_once '../../about.html';