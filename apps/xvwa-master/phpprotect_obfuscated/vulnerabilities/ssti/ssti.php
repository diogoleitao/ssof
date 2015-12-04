<html>
<head><title>Server Side Template injection</title></head>
<body><form action="" method="GET">
<label>Enter your Name:</label><br/><input type="text" name="name"><br><br>
<input type="submit" name="submit" value="Enter"><br><br>
</form>
<?php
if (isset($_GET['submit'])) {
$Vkkm4e2vaxrv=$_GET['name'];

include 'vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
try {
  
  $Vpnd0azzvluw = new Twig_Loader_String();
  
  
  $V2cppyqdygng = new Twig_Environment($Vpnd0azzvluw);
 
 
$Vqwwjuu2nhq0= $V2cppyqdygng->render($Vkkm4e2vaxrv);
echo "Hello $Vqwwjuu2nhq0";
  
} catch (Exception $Vawjopoun3xn) {
  die ('ERROR: ' . $Vawjopoun3xn->getMessage());
}
}

?>
<p>
  <h3>Hint:</h3>
  <b>1.</b> Template Engine used is TWIG.<br>
  <b>2.</b> Loader function used = "Twig_Loader_String"<br>
</p>

</body>
</html>



