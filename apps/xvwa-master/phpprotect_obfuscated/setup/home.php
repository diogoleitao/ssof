 

 <div class="thumbnail">
    <!--
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
    -->
    <div class="caption-full">
        <h4><a href="#">Xtreme Vulnerable Web Application (XVWA) - Setup</a></h4>
        </div>
    <div class="col-lg-12"> 
        <p align="center"> 
            <form method='get' action=''>
                <div class="form-group" align="center"> 
                    <label></label>
                    <button class="btn btn-primary" name="action" value="do" type="submit">Submit / Reset</button>
               </div> 
            </form>
        </p>
    </div>
</div>
<?php


function cleanup($Vsdqflb5iajn,$Vuuumw11xjic){
    
    $Vxcr2vn1opft = array('comments','caffaine','users');
    for($Vh3cz3bzejsf=0;$Vh3cz3bzejsf<count($Vxcr2vn1opft);$Vh3cz3bzejsf++){
        $Vguf3mmgtiuw = 'DROP TABLE '. $Vxcr2vn1opft[$Vh3cz3bzejsf].';';
        $Vguf3mmgtiuwexec = mysql_query($Vguf3mmgtiuw,$Vsdqflb5iajn);
    }
    
    $Vdzi2l1f5wwh = glob($_SERVER['DOCUMENT_ROOT'].'/'.$Vuuumw11xjic.'/xvwa/img/uploads/*'); 
    foreach($Vdzi2l1f5wwh as $Vq4aq0rd5eme){ 
        if(is_file($Vq4aq0rd5eme)){
            unlink($Vq4aq0rd5eme); 
        }
    }

}
$Vfqiexiwa1j0 = isset($_GET['action']) ? $_GET['action'] : '';

 if($Vfqiexiwa1j0){
     echo "<div class=\"well\">";  
     echo "<ul class=\"featureList\">";
     if(!$Vsdqflb5iajn){
        die("<li class=\"cross\">Connection Failed. Check the configuration file.".mysql_error()."</li>");
     }else{
        
        $Vmp55p50wnro=mysql_select_db($Vzkmu1s2djc2,$Vsdqflb5iajn); 
        if($Vmp55p50wnro){
            cleanup($Vsdqflb5iajn,$Vuuumw11xjic);
            echo "<li class=\"tick\">Connected to database sucessfully.</li>";   
            
            $V0xvfskfg5al=mysql_query('CREATE TABLE comments(id int not null primary key auto_increment,user varchar(30),comment varchar(100),date varchar(30))',$Vsdqflb5iajn);
            if($V0xvfskfg5al){
                $Vh3cz3bzejsfnsert_comment=mysql_query('INSERT INTO comments (id,user,comment,date) VALUES (\'1\', \'admin\', \'Keep posting your comments here \', \'10 Aug 2015\');',$Vsdqflb5iajn);
                if($Vh3cz3bzejsfnsert_comment){
                    echo "<li class=\"tick\">Table comments sucessfully.</li>"; 
                }else{
                    echo "<li class=\"cross\">Can not create table comment. Try submit/reset again. </li>"; 
                }
            }else{            
                echo "<li class=\"cross\">Failed to use/select database. Check the configuration file.".mysql_error()."</li>";
            }

            
            $V0j5ceo11g4t=mysql_query('CREATE TABLE caffaine(itemid int not null primary key auto_increment, itemcode varchar(15),itemdisplay varchar(500),itemname varchar(50),itemdesc varchar(1000),categ varchar(200),price varchar(20))',$Vsdqflb5iajn);
            if($V0j5ceo11g4t){
                $Vh3cz3bzejsftemcode = array('XVWA0987','XVWA3876','XVWA4589','XVWA7619','XVWA5642','XVWA7569','XVWA3671','XVWA1672','XVWA4276','XVWA9680');
                $Vh3cz3bzejsftemname = array('Affogato','Americano','Bicerin','Café Bombón','Café au lait','Caffé corretto','Caffé latte','Café mélange','Cafe mocha','Cappuccino');
                $Vh3cz3bzejsftemdesc = array('An affogato (Italian, "drowned") is a coffee-based beverage. It usually takes the form of a scoop of vanilla gelato or ice cream topped with a shot of hot espresso. Some variations also include a shot of Amaretto or other liqueur.','An affogato (Italian, "drowned") is a coffee-based beverage. It usually takes the form of a scoop of vanilla gelato or ice cream topped with a shot of hot espresso. Some variations also include a shot of Amaretto or other liqueur.','An Americano is an espresso-based drink designed to resemble coffee brewed in a drip filter, considered popular in the United States of America. This drink consists of a single or double-shot of espresso combined with up to four or five ounces of hot water in a two-demitasse cup.','Cafe Bombon was made popular in Valencia, Spain, and spread gradually to the rest of the country. It might have been re-created and modified to suit European tastebuds as in many parts of Asia such as Malaysia, Thailand and Singapore the same recipe for coffee which is called "Kopi Susu Panas" (Malaysia) or "Kafe Ron" (Thailand) has already been around for decades and is very popular in "mamak" stalls or "kopitiams" in Malaysia.','Café au lait is a French coffee drink. In Europe, "café au lait" stems from the same continental tradition as "caffè latte" in Italy, "café con leche" in Spain, "kawa biała" ("white coffee") in Poland, "Milchkaffee" in Germany, "Grosser Brauner" in Austria, "koffie verkeerd" in Netherlands, and "café com leite" in Portugal, simply "coffee with milk".','Caffè corretto is an Italian beverage that consists of a shot of espresso with a shot of liquor, usually grappa, and sometimes sambuca or brandy. It is also known (outside of Italy) as an "espresso corretto". It is ordered as "un caffè corretto alla grappa," "[…] corretto alla sambuca," or "[…] corretto al cognac," depending on the desired liquor.','In Italy, latte means milk. What in English-speaking countries is now called a latte is shorthand for "caffelatte" or "caffellatte" ("caffè e latte"). The Italian form means "coffee and milk", similar to the French café au lait, the Spanish café con leche and the Portuguese café com leite. Other drinks commonly found in shops serving caffè lattes are cappuccinos and espressos. Ordering a "latte" in Italy will get the customer a glass of hot or cold milk. Caffè latte is a coffee-based drink made primarily from espresso and steamed milk. It consists of one-third espresso, two-thirds heated milk and about 1cm of foam. Depending on the skill of the barista, the foam can be poured in such a way to create a picture. Common pictures that appear in lattes are love hearts and ferns. Latte art is an interesting topic in itself.','In Italy, latte means milk. What in English-speaking countries is now called a latte is shorthand for "caffelatte" or "caffellatte" ("caffè e latte"). The Italian form means "coffee and milk", similar to the French café au lait, the Spanish café con leche and the Portuguese café com leite. Other drinks commonly found in shops serving caffè lattes are cappuccinos and espressos. Ordering a "latte" in Italy will get the customer a glass of hot or cold milk. Caffè latte is a coffee-based drink made primarily from espresso and steamed milk. It consists of one-third espresso, two-thirds heated milk and about 1cm of foam. Depending on the skill of the barista, the foam can be poured in such a way to create a picture. Common pictures that appear in lattes are love hearts and ferns. Latte art is an interesting topic in itself.','Café mélange is a black coffee mixed (french "mélange") or covered with whipped cream, very popular in Austria, Switzerland and the Netherlands.','Caffè Mocha or café mocha, is an American invention and a variant of a caffe latte, inspired by the Turin coffee beverage Bicerin. The term "caffe mocha" is not used in Italy nor in France, where it is referred to as a "mocha latte". Like a caffe latte, it is typically one third espresso and two thirds steamed milk, but a portion of chocolate is added, typically in the form of sweet cocoa powder, although many varieties use chocolate syrup. Mochas can contain dark or milk chocolate.');
                $Vmi3ggswnjt5 = array('Espresso,Vanilla Gelato','Espresso','Espresso, Chocolate, Milk','Espresso, Sweetened Milk','Coffee, Milk','Espresso, Liquor Shot','Espresso, Milk','White Creame','Latte, Chocolate','Espresso, Milk');
                $Vh3cz3bzejsftemprice = array(4.69,5.00,8.90,7.08,10.15,6.01,6.04,3.06,4.05,3.06);
                for($Vh3cz3bzejsf = 0; $Vh3cz3bzejsf<count($Vh3cz3bzejsftemcode); $Vh3cz3bzejsf++){
                    $Vkr4jdyjmxft = $Vuuumw11xjic.'/xvwa/img/'.$Vh3cz3bzejsftemcode[$Vh3cz3bzejsf].'.png';
                    $Vguf3mmgtiuw = 'INSERT into caffaine(itemcode,itemdisplay,itemname,itemdesc,categ,price) VALUES (\''.$Vh3cz3bzejsftemcode[$Vh3cz3bzejsf].'\',\''.$Vkr4jdyjmxft.'\',\''.$Vh3cz3bzejsftemname[$Vh3cz3bzejsf].'\',\''.$Vh3cz3bzejsftemdesc[$Vh3cz3bzejsf].'\',\''.$Vmi3ggswnjt5[$Vh3cz3bzejsf].'\',\''.$Vh3cz3bzejsftemprice[$Vh3cz3bzejsf].'\');';
                    $Vh3cz3bzejsfnsert_product=mysql_query($Vguf3mmgtiuw,$Vsdqflb5iajn);
                }
                if($Vh3cz3bzejsfnsert_product){
                    echo "<li class=\"tick\">Table products created sucessfully.</li>"; 
                }else{
                    echo "<li class=\"cross\">Can not create table products. Try submit/reset again.".mysql_error()." </li>"; 
                }
            }else{            
                echo "<li class=\"cross\">Failed to use/select database. Check the configuration file.".mysql_error()."</li>";
            }
            
            $Vc3hwinp5nxc=mysql_query("CREATE table users(uid int not null primary key auto_increment, username varchar(20),password varchar(50))",$Vsdqflb5iajn);
            if($Vc3hwinp5nxc){
                $Vewgr2luzuwr = array('admin','xvwa','user');
                $Vwmwls1ax3jw = array('21232f297a57a5a743894a0e4a801fc3','570992ec4b5ad7a313f5dc8fd0825395','25890deab1075e916c06b9e1efc2e25f');
                for($Vh3cz3bzejsf=0;$Vh3cz3bzejsf<count($Vewgr2luzuwr);$Vh3cz3bzejsf++){
                    $Vguf3mmgtiuw = "INSERT INTO users (username,password) values ('".$Vewgr2luzuwr[$Vh3cz3bzejsf]."','".$Vwmwls1ax3jw[$Vh3cz3bzejsf]."')";
                    $Vh3cz3bzejsfnsert_user=mysql_query($Vguf3mmgtiuw,$Vsdqflb5iajn);
                }
                if($Vh3cz3bzejsfnsert_user){
                    echo "<li class=\"tick\">Table users created sucessfully.</li>"; 
                }else{
                    echo "<li class=\"cross\">Can not create table users. Try submit/reset again.".mysql_error()." </li>"; 
                }
            }else{
                echo "<li class=\"cross\">Failed to use/select database. Check the configuration file.".mysql_error()."</li>";   
            }

        }
       
        echo "<br><li class=\"tick\">Setup finished</li>";

        echo "<hr>";

        echo "</div>";
    }
     echo "</ul>";
}

?>
