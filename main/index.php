<?php
session_start();
ob_start();
unset($_SESSION['id'], $_SESSION['nome']);  //apaga a sessão

header("Location: login.php");  //Redireciona para a página "login.php"
exit;