<?php
	
if($_GET){
	$url = explode('/', $_GET['url']);
	require_once $url[0].'.php';
}

?>