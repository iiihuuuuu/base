<?php 

require_once 'app/autoload.php';
function tratarFormulario(){
	$form = $_POST['formP'];
	echo $form;
}

$op = isset($_GET['key']) ? $_GET['key'] : '';
switch($op){
	case 'paciente':
	tratarFormulario();
	break;
}

?>