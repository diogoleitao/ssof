<?php
session_start(); $sp86fc28 = $_POST['username']; $spc2ca96 = md5($_POST['password']); $sp0827e4 = ''; include_once 'config.php'; $sp696718 = new PDO("mysql:host={$sp2f475e};dbname={$sp78bdcb}", $sp132538, $sp24f4f3); $spdd4a2c = 'select username from users where username=:username and password=:password'; $spf288b9 = $sp696718->prepare($spdd4a2c); $spf288b9->bindParam(':username', $sp86fc28); $spf288b9->bindParam(':password', $spc2ca96); $spf288b9->execute(); while ($sp85d32c = $spf288b9->fetch(PDO::FETCH_NUM)) { $sp0827e4 = $sp85d32c[0]; } if (!empty($sp0827e4)) { $_SESSION['user'] = $sp0827e4; } header('Location: /xvwa/');