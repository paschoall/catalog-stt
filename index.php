<?php

	session_start(); // cria o hash do browser do usuario no servidor ou entao recupera se existente
	//session_unset();
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

		<!-- Materialize icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
			    font-size: 16pt;
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
			<div class="container" style="margin-top: 50px">
				<div class="section">
					<h4> Bem vindo ao Catalog-STT! </h4> 
				</div>
				<div class="divider"> </div>
				<div class="section">
					<p> O Catalog-STT - acrônimo para <i> A Catalog of Open Educational Resources to Support Software Testing Teaching </i> - é um sistema criado por um grupo de pesquisa do ICMC-USP com o objetivo de facilitar o registro e a consulta de recursos educacionais abertos no domínio de teste de software. Se você deseja explorar ou procurar um material didático - seja vídeo, apostila ou qualquer tipo de recurso educacional, faça uma <a href="pesquisa.html"> consulta. </a> </p>
					<p> Se você é um professor ou autor de algum material e deseja publicá-lo, <a href="login.php"> entre</a> ou <a href="cadastro.php"> cadastre-se.</a>
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
		<script type="text/javascript" src="index.js"> </script>
		
	</body>
</html>