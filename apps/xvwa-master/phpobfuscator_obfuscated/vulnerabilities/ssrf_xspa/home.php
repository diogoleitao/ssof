<?php
?>
 

 <div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h4><a href="#">Server Side Request Forgery (SSRF/XSPA)</a></h4>
        
        <p align="justify">
        This vulnerability also known as Cross Site Port Attack, happens when an attacker has the ability to initiate requests from the affected server. An attacker can trick the web server that could probability running behind a firewall to send requests to itself to identify services running on it, or can even send out-bond traffic to other servers.
        </p>
        <p>Read more about SSRF <br>
        <strong><a target="_blank" href="https://docs.google.com/document/d/1v1TkWZtrhzRLy0bYXBcdLUedXGb9njTNIJXa3u9akHM/edit">https://docs.google.com/document/d/1v1TkWZtrhzRLy0bYXBcdLUedXGb9njTNIJXa3u9akHM/edit</a></p></strong>

    </div>

</div>

<div class="well">
    <div class="col-lg-6"> 
        <p>Enter an image URL from remote server or internet.  
            <form method='post' action=''>
                <div class="form-group"> 
                    <label></label>
                    <input class="form-control" width="50%" placeholder="Enter URL of Image" name="img_url"></input> <br>
                    <div align="right"> <button class="btn btn-default" type="submit">Submit Button</button></div>
               </div> 
            </form>
            <?php  $spbc7ef6 = ''; if (isset($_POST['img_url'])) { $sp56aa9f = file_get_contents($_POST['img_url']); $sp79b407 = './images/' . rand() . 'img1.jpg'; file_put_contents($sp79b407, $sp56aa9f); echo $_POST['img_url'] . '<br>'; $spbc7ef6 = '<img src="' . $sp79b407 . '" width="100" height="100" />'; } echo $spbc7ef6; ?>
        </p>
    </div>
      
    <hr>

</div>
<?php  include_once '../../about.html';