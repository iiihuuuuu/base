<?php 

include '../autoload.php';

function tratarFormulario(){
	//$p = new paciente;

	$form = $_POST['formP'];
	echo json_encode($form);

}

$op = isset($_GET['key']) ? $_GET['key'] : '';
switch($op){
	case 'paciente':
	tratarFormulario();
	break;
}