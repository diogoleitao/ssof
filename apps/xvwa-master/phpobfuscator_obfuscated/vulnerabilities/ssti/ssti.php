<?php
?>
<html>
<head><title>Server Side Template injection</title></head>
<body><form action="" method="GET">
<label>Enter your Name:</label><br/><input type="text" name="name"><br><br>
<input type="submit" name="submit" value="Enter"><br><br>
</form>
<?php  if (isset($_GET['submit'])) { $sp3eec35 = $_GET['name']; include 'vendor/twig/twig/lib/Twig/Autoloader.php'; Twig_Autoloader::register(); try { $spdfb5a9 = new Twig_Loader_String(); $speae043 = new Twig_Environment($spdfb5a9); $sp4ac737 = $speae043->render($sp3eec35); echo "Hello {$sp4ac737}"; } catch (Exception $spbcee8e) { die('ERROR: ' . $spbcee8e->getMessage()); } } ?>
<p>
  <h3>Hint:</h3>
  <b>1.</b> Template Engine used is TWIG.<br>
  <b>2.</b> Loader function used = "Twig_Loader_String"<br>
</p>

</body>
</html>



<?php 