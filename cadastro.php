<?php
	session_start(); // cria o hash do browser do usuario no servidor ou entao recupera se existente
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title> Catalog-STT </title>

		<!-- CSS Materialize -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

		<!-- Jquery UI -->
		<link rel="stylesheet" href="jquery/jquery-ui.min.css">
		

		<style type="text/css">
			body {
				/* Inserir fonte*/
				display: flex;
			    min-height: 100vh;
				flex-direction: column;
			}

			main {
			    flex: 1 0 auto;
			    text-align: justify;
			}

			.vertical-divider {
				min-width: 10px;
				border-left: 1px solid white; //#00acc1;
			}
		</style>
	</head>
	<body>

		<!-- O logo e os links da navbar deverao ser decididos depois -->
		<header>
			<nav class="cyan">
				<div class="nav-wrapper container">
					<a href="index.php" class="brand-logo">Catalog-STT</a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li><a href="pesquisa.html"><i class="material-icons right"> search </i> Consultar</a></li>
						<li><div class="vertical-divider">&nbsp; </div>
						<li id="bem_vindo"> </li>
						<li id="perfil"> <a href="perfil.php"> <i class="material-icons">person</i> </a> </li>
						<li id='entrar'><a href="login.php" >Entrar</a></li>
						<li id='cadastrar'><a href="cadastro.php">Cadastrar</a></li>
					</ul>
				</div>
			</nav>
		</header>

		<main>
		<div class="container">
			<div class="section" style="margin-top: 20px">
				<h5> Cadastrar </h5>
			</div>
			<div class="row">
				<form class="col s12" method="post" id="form" name="new_user" action="cadastro.php">
					<div class="row" style=" margin-top: -10px;">
						<div class="input-field col s5"> 
							<input type="text" id="nome" name="nome" class="obrigatorio" maxlength="45"> </input> 
							<label for="nome"> Nome *</label>
						</div>
						<div class="input-field col s3"> 
							<input type="text" placeholder="dd/mm/yyyy" id="data_nascimento" name="data_nascimento"
							class="validate datepicker obrigatorio"> </input> 
							<span class="helper-text" data-error="Formato de data inválido" data-success=""></span>
							<label for="data_nascimento"> Data de Nascimento *</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s2 validate" style=" margin-top: -10px;"> 
							<input type="text" id="cep" name="cep" class="validate obrigatorio"> </input> 
							<label for="cep"> CEP *</label>
						</div>

						<div class="input-field col s5" style=" margin-top: -10px;"> 
							<input type="text" id="cidade" name="cidade" class="obrigatorio" maxlength="45"> </input> 
							<label for="cidade"> Cidade *</label>
						</div>
						<div class="input-field col s1" style=" margin-top: -10px;"> 
							<input type="text" id="uf" name="uf" class="obrigatorio" maxlength="45"> </input> 
							<label for="uf"> UF *</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s4" style=" margin-top: -10px;"> 
							<input type="text" id="rua" name="rua" class="obrigatorio" maxlength="120"> </input> 
							<label for="rua"> Rua *</label>
						</div>

						<div class="input-field col s4" style=" margin-top: -10px;"> 
							<input type="text" id="bairro" name="bairro" class="obrigatorio" maxlength="100"> </input> 
							<label for="bairro"> Bairro *</label>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s1" style=" margin-top: -10px;"> 
							<input type="text" id="numero" name="numero" class="obrigatorio"> </input> 
							<label for="numero"> Numero *</label>
						</div>

						<div class="input-field col s7" style=" margin-top: -10px;"> 
							<input type="text" id="complemento" name="complemento" maxlength="100"> </input> 
							<label for="complemento"> Complemento</label>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s8" style=" margin-top: 10px;"> 
							<input type="email" id="email" name="email" class="validate obrigatorio" maxlength="45"> </input> 
							<label for="email"> Email *</label>
							<span class="helper-text" data-error="Email inválido" data-success=""></span>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s3" style=" margin-top: -10px;"> 
							<input autocomplete="off" type="password" id="senha" name="senha" class="obrigatorio validate" maxlength="255"> </input> 
							<label for="senha"> Senha *</label>
							<span class="helper-text" data-error="Senha inválida" data-success=""></span>
						</div>
						<div class="input-field col s3" style=" margin-top: -10px;"> 
							<input autocomplete="off" type="password" id="confirmar_senha" name="confirmar_senha" class="obrigatorio" maxlength="255"> </input> 
							<label for="confirmar_senha"> Confirmar Senha *</label>
						</div>

						<div class="input-field col s3 valign-wrapper" style=" margin-top: -10px;"> 
							<button class="btn waves-effect waves-light cyan darken-1" name="confirmar">Confirmar</button>
						</div>
					</div>
					<div class="row" style="margin-top: -20px; margin-left: 0px;">
						<p>  A senha deve conter pelo menos 6 caracteres compostos por letras maiúsculas e minúsculas e pelo menos 1 dígito. </p>
					</div>
				</form>
			</div>

		</div>
		</main>

		<footer class="page-footer cyan darken-4" style="max-height: 50px;">
			<div class="footer-copyright valign-wrapper" style="margin-top: -20px">
				<div class="container">
					© 2018 Copyright
					<a class="grey-text text-lighten-4 right" href="#!">Sobre</a>
				</div>
			</div>
		</footer>	


		<!--  Scripts-->
		<script src="jquery/external/jquery/jquery.js"></script>
		<script src="jquery/jquery-ui.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/init.js"></script>

		<?php include('export_session.php') ?> <!-- Incluir esse arquivo antes do outro, senao a variavel sessao nao estaria iniciada -->
		<script type="text/javascript" src="cadastro.js"> </script>
	</body>
</html>