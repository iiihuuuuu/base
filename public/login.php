<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/resets.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="body-login">	

	<section class="triangle"></section>

	<div class="container containerLogin">

		<div class="retangulo">

			<div class="boas-vindas">

				<div class="titulo">
					<h1>Bem Vindo(a)</h1>
				</div>

				<div class="icone">
					<i class="fas fa-user-nurse"></i>
				</div>	

			</div>	

			<div class="formulario">

				<div class="logo">
					<img src="imagens/login/logo_branca.png">
				</div>

				<form class="formLogin" id="form">

					<div class="input inputs-aviso">
						<input type="text" id="login" name="login" class="validar" placeholder=" ">	
						<label>Login:</label>
					</div>	

					<div class="input inputs-aviso">
						<input type="password" id="senha" name="senha" class="validar" placeholder=" ">	
						<label>Senha:</label>
					</div>	

					<div class="botao">

					<button type="button" id="enviar" name="enviar" class="login">Entrar</button>	

					</div>	

				</form>

			</div>	
				
		</div>
				
	</div>

<script src="scripts/lib/jquery-3.3.1.js"></script>		
<script src="scripts/login.js"></script>
</body>
</html>