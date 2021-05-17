<?php 
require_once '../../vendor/autoload.php';

use \App\Model\Paciente;
if(!empty($_POST['p'])){
	$p = $_POST['p'];
	$paciente = new Paciente;
	for($i=0; $i < count($p); $i++){
		if($p[$i]["name"] == "nomePaciente"){ $paciente->nome = $p[$i]['value']; }
		if($p[$i]['name'] == "telefone"){ $paciente->telefone = $p[$i]['value']; }
		if($p[$i]['name'] == "celular"){ $paciente->numero = $p[$i]['value']; }
	}
	$paciente->create();
}

?>