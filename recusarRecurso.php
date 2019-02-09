<?php
	include_once "defines.php";
	session_start();

	if($_SESSION['admin'] == '0') exit; // nao pode entrar se nao for o admin
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

			.clickable {
				cursor: pointer;
			}
		</style>
	</head>
	<body>

		<?php include "header.php" ?>
		<main>
			<div class="container">
				
			</div>
		</main>
		<?php include "footer.php" ?>

		<!--  Scripts-->
		<script src="<?=ROOT?>jquery/external/jquery/jquery.js"></script>
		<script src="<?=ROOT?>jquery/jquery-ui.min.js"></script>
		<script src="<?=ROOT?>js/materialize.js"></script>
		<script src="<?=ROOT?>js/init.js"></script>

		<?php include('export_session.php') ?> <!-- Incluir esse arquivo antes do outro, senao a variavel sessao nao estaria iniciada -->
	</body>
</html>