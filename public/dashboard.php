<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/lib/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="css/pacientes.css">
	<link rel="stylesheet" type="text/css" href="css/animacoes.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<link rel="stylesheet" href="css/lib/calendarjs.css">
	
	<script src="scripts/lib/jquery-3.3.1.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
	<script src="scripts/lib/calendarjs.js"></script>

</head>
<body>

	<div class="container containerDashboard">

		<input class="ativa_menu" type="checkbox" id="ativa_menu" hidden="">
		<div class="menu menu-lateral">

			<label for="ativa_menu">
				<div class="icone">
					<i class="fas fa-bars"></i>
				</div>
			</label>

			<div class="icones-principais">

				<div class="icone icone-lateral" id="Pacientes-icone">
					<i class="fas fa-user-injured"></i>
					<p>Pacientes</p>
				</div>
				<div class="icone icone-lateral" id="Agendamentos-icone">
					<i class="far fa-calendar-alt"></i>
					<p>Agendamentos</p>
				</div>
				<div class="icone icone-lateral" id="Finanças-icone">
					<i class="fas fa-dollar-sign"></i>
					<p>Finanças</p>
				</div>
				<div class="icone icone-lateral" id="Estoque-icone">
					<i class="fas fa-cubes"></i>
					<p>Estoque</p>
				</div>	
				<div class="icone icone-lateral" id="Configurações-icone">
					<i class="fas fa-cog"></i>
					<p>Configurações</p>
				</div>

			</div>	

			<div class="logout filhos-menu icone">
				<i class="fas fa-power-off"></i>
			</div>	

		</div>

		<div class="conteudo">

			<div class="topo">

				<div class="logo filhos-menu">
					<img src="imagens/login/logo_branca.png">
				</div>

				<div id="titulo-pagina" class="nome-pagina filhos-menu">Pacientes</div>

				<div class="login filhos-menu">
					<i class="fas fa-user"></i>
					<p>Lucas Henrique</p>
				</div>			

			</div>

			<div class="col1">
				<div class="tela" id="Pacientes"><?php require_once 'pacientes.php'; ?></div>
				<div class="tela" id="Finanças">teste2</div>
				<div class="tela" id="Estoque">teste3</div>
				<div class="tela" id="Configurações">teste4</div>
				<div class="tela" id="Agendamentos">
					<?php require_once 'calendario.php'; ?>
				</div>
			</div>
			<div class="col2">
				
			</div>

		</div>	

	</div>	
	<script type="text/javascript" src="scripts/geral.js"></script>
	<script type="text/javascript" src="scripts/pacientes.js"></script>
</body>
</html>