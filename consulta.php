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
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
		<!-- Materialize icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<!-- Jquery UI -->
		<link rel="stylesheet" href="jquery/jquery-ui.min.css">

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
		<?php include "header.php"; ?>

		<main>
			<div class="container" style="margin-top: 50px">
				<div class = "row">
					<div class = "col s9" style=" height: 50px;"> 
						<div class="collection" style="padding: 0px; margin: 0px;">
							<li class="collection-item" style="padding: 0px; margin: 0px;">
								<div class = "row" style="padding: 0px; margin: 0px;"> 
									<div class = "col s11"> <input style="border: 0px; padding-left: 15px; margin: 0px;"> </input> </div>

									<!-- Colocar onclick event para botao de pesquisa aqui -->
									<div class = "col s1"> <a class="btn-flat right" style="margin-top: 5px;"><i class="material-icons"> search </i></a> </div>
								</div>	
							</li>
						</div>
					</div>
					<div class = "col s3">

						<div class = "col s12" style="font-size: 12pt;">
							<select id="modo_pesquisa" class="browser-default">
								<option style="color: grey" value="1">Por título</option>
								<option style="color: grey" value="2">Por autor</option>
								<option style="color: grey" value="3">Por palavras-chave</option>
							</select>
							<label for="modo_pesquisa"> Escolha o modo de pesquisa </label>
						</div>
					</div>
				</div>

				<div class = "row">
					<div class = "col s9">
						<div class = "divider"> </div> 
					</div>
					<div class = "col s3">
						<div class = "divider"> </div>
						<div class = "card" style="margin-top: 50px;">
							<div class = "card-content" style="font-size: 13pt; font-family: 'Open Sans', sans-serif;">
								<span class = "card-title"> <h5> Filtros </h5></span>
								<!-- Inserir filtros aqui -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

		
		<?php include "footer.php" ?>	

		<!--  Scripts-->
		<script src="jquery/external/jquery/jquery.js"></script>
		<script src="jquery/jquery-ui.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/init.js"></script>

		<?php include('export_session.php') ?> <!-- Incluir esse arquivo antes do outro, senao a variavel sessao nao estaria iniciada -->
		<script type="text/javascript" src="consulta.js"> </script>
		
	</body>
</html>