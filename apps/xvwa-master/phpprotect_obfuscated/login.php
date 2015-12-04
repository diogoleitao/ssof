<?php
	session_start();
	$Vewgr2luzuwr = $_POST['username'];
	$Vi5zlimgwgwc = md5($_POST['password']);
	$Vudr5hsgyflr = '';
	include_once('config.php');
	$Vsdqflb5iajn = new PDO("mysql:host=$Vzvsfucxdw1v;dbname=$Vzkmu1s2djc2", $Vullfpfzbsyz, $Vweexwar4glm);
	$Vguf3mmgtiuw = "select username from users where username=:username and password=:password";
	$Vc5y210iwu3x = $Vsdqflb5iajn->prepare($Vguf3mmgtiuw);
	$Vc5y210iwu3x->bindParam(':username',$Vewgr2luzuwr);
	$Vc5y210iwu3x->bindParam(':password',$Vi5zlimgwgwc);
	$Vc5y210iwu3x->execute();
	while($Vuasf53h3slm = $Vc5y210iwu3x->fetch(PDO::FETCH_NUM)){
		$Vudr5hsgyflr = $Vuasf53h3slm[0];
	}
	if(!empty($Vudr5hsgyflr)){
		$_SESSION['user'] = $Vudr5hsgyflr;
	}
	header("Location: /xvwa/");
	
?>
