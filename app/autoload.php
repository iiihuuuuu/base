<?php 
	spl_autoload_register(function($classe){

		$diretorios = ['controllers', 'model'];

		foreach ($diretorios as $dir):
			$arquivo = (__DIR__.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.$classe.'.class.php');
			echo $arquivo;
			if(file_exists($arquivo)):
				require_once $arquivo;
			endif;
		endforeach;
	});
?>