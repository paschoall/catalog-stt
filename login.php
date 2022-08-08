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
		<div class="container valign-wrapper" style="min-height: 80vh;">
			<div class="row" style="width: 100%;">
				<div class = "col s6 offset-s3">
					<div class="card" style="width: 100%;">
						<div class="card-content">
							<div class="container">
								<h5 class="center-align"> Entrar </h5>
								<form id="login" method="post">
								<div class="row valign-wrapper" style="margin-bottom: -10px;">
									<div class="col s2 right-align"> Email: </div>
									<div class="col s8">
										<div class="input-field inline" style="margin-left: 20px;"> <input id="email" type="email" name="email"> </div>
									</div>
									<div class="col s2"></div>
								</div>

								<div class="row valign-wrapper" style="margin-top: -20px">
									<div class="col s2 right-align"> Senha: </div>
									<div class="col s8">
										<div class="input-field inline" style="margin-left: 20px;"> <input id="senha" type="password" name="senha"> </div>
									</div>
									<!-- <div class="col s2">
										<a class="btn-floating btn-medium blue" onclick="login()"><i class="material-icons" style="font-size: 20px">arrow_forward</i></a>
									</div> -->
									<div class="col s2"></div>
								</div>

								<div class="row valign-wrapper" style="margin-top: -20px">
									<div class="col s3 right-align"></div>
									<div class="col s8">
										<button class="btn waves-effect waves-light cyan darken-1" style="width: 100%;" onclick="login()">Entrar</button>
									</div>
									<div class="col s2"></div>
								</div>
								<input type="submit" hidden="true">
								</form>
								<div class="row valign-wrapper" style="margin-bottom: -10px;">
									<div class="col s4">Sem login?</div>
									<div class="col s8">
										<div class="input-field inline" style="margin-left: 20px;"><a href="<?=ROOT?>cadastro.php">Cadastre-se</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
		</main>

		
		<?php include BASE_URL."footer.php" ?>	


		<!--  Scripts-->
		<script src="<?=ROOT?>jquery/external/jquery/jquery.js"></script>
		<script src="<?=ROOT?>jquery/jquery-ui.min.js"></script>
		<script src="<?=ROOT?>js/materialize.js"></script>
		<script src="<?=ROOT?>js/material-dialog.js"></script>
		<script src="<?=ROOT?>js/init.js"></script>

		<?php include(BASE_URL.'export_session.php') ?> <!-- Incluir esse arquivo antes do outro, senao a variavel sessao nao estaria iniciada -->
		<script type="text/javascript"> 
			window.redirect = <?php if(isset($_GET["redirect"])) {echo "'" . $_GET["redirect"] ."'";} else {echo "null";} ?> 
		</script>
		<script type="text/javascript" src="<?=ROOT?>login.js"> </script>

	</body>
</html>