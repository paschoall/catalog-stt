<?php
	include_once "defines.php";
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
		<link href="<?=ROOT?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="<?=ROOT?>css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

		<!-- Materialize icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 

		<!-- Jquery UI -->
		<link rel="stylesheet" href="<?=ROOT?>jquery/jquery-ui.min.css">

		<style type="text/css">
			body {
				font-family: 'Open Sans', sans-serif;
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
		<?php include BASE_URL."header.php"; ?>

		<main>
			<div class="container" style="margin-top: 50px">
				<div class="section">
					<h4> Bem vindo ao Catalog-STT! </h4> 
				</div>
				<div class="divider"> </div>
				<div class="section">
					<p> O Catalog-STT - acrônimo para <i> A Catalog of Open Educational Resources to Support Software Testing Teaching </i> - é um sistema criado por um grupo de pesquisa do ICMC-USP com o objetivo de facilitar o registro e a consulta de recursos educacionais abertos no domínio de teste de software. Se você deseja explorar ou procurar um material didático - seja vídeo, apostila ou qualquer tipo de recurso educacional, faça uma <a href="<?=ROOT?>consulta.php"> consulta. </a> </p>
					<p> Se você é um professor ou autor de algum material e deseja publicá-lo, <a href="<?=ROOT?>login.php"> entre</a> ou <a href="<?=ROOT?>cadastro.php"> cadastre-se.</a>
				</div>

			</div>
		</main>

		
		<?php include BASE_URL."footer.php" ?>	


		<!--  Scripts-->
		<script src="<?=ROOT?>jquery/external/jquery/jquery.js"></script>
		<script src="<?=ROOT?>jquery/jquery-ui.min.js"></script>
		<script src="<?=ROOT?>js/materialize.js"></script>
		<script src="<?=ROOT?>js/init.js"></script>

		<?php include(BASE_URL."export_session.php") ?> <!-- Incluir esse arquivo antes do outro, senao a variavel sessao nao estaria iniciada -->
		<script type="text/javascript" src="<?=ROOT?>index.js"> </script>
		
	</body>
</html>