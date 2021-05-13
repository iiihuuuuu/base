<?php
session_start();
// function logadoPHP(){
// 	if($_SESSION['id'] == "" && $_SESSION['password'] == ""){
// 		header('Location: login.php');
// 	}
// }

// function onlinePHP(){
// 	if(isset($_SESSION['ULTIMA_ATIVIDADE']) && (time() - $_SESSION['ULTIMA_ATIVIDADE'] > 60*50)){
// 		session_unset();
// 		session_destroy();
// 		header('Location: login.php');
// 	}
// 	$_SESSION['ULTIMA_ATIVIDADE'] = time();
// }

// if($_SESSION['id'] != "" and $_SESSION['password'] != ""){
// 	;
// }

function naoLogado(){
	if(@$_SESSION['id'] == "" && @$_SESSION['password'] == ""){
		header('Location: login.php');
	}
}

function logado(){
	if(@$_SESSION['id'] != "" && @$_SESSION['password'] != ""){
		header('Location: home.php');
	}
}

function online(){
	if(isset($_SESSION['ULTIMA_ATIVIDADE']) && (time() - $_SESSION['ULTIMA_ATIVIDADE'] > 60*5)){
		session_unset();
		session_destroy();
		header('Location: login.php');
	}
	$_SESSION['ULTIMA_ATIVIDADE'] = time();
}
?>