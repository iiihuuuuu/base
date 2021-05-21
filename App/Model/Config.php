<?php 

define("ROOT", "http://localhost/base");

function url($path): string{
	if($path){
		return ROOT . "{$path}";
	}
	return ROOT;
}

function message($message, $type): string{
	return "<div class=\"message {$type}\">{$message}</div>";
}

 ?>