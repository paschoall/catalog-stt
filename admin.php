<?php
	include_once "defines.php";
	session_start(); // cria o hash do browser do usuario no servidor ou entao recupera se existente

	
	if(isset($_SESSION['email']) == false) {
		header('location: '.ROOT.'login.php?redirect=' . $_SERVER['REQUEST_URI']);
	}

	if($_SESSION['admin'] == '0') {
		header('location:'.ROOT.'index.php');
	}

	/* Faz a conexao com o banco de dados e retorna as requisicoes */

	include(BASE_URL.'database_credentials.php');

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	try {
		$conn = new mysqli($hostname, $username, $password, $database);
		$conn->set_charset('utf8mb4');
	} catch(Exception $e) {
		error_log($e->getMessage());
		die("Nao foi possivel conectar ao banco");
	}

	$statement = $conn->prepare("select ID_RECURSO, TITULO, DATA_AD, NOME, EMAIL from RECURSO join USUARIO on RECURSO.CADASTRADOR = USUARIO.EMAIL where RECURSO.APROVADO = 0");

	$requisicoes = array();

	try {
		$statement->execute();
		$result = $statement->get_result();

		// Faz um mapa em php

		while($row = $result->fetch_assoc()) {
			$requisicoes[] = $row; // adiciona row no final de requisicoes
		}

		$statement->close();
	} catch(Exception $e) {
		error_log($e->getMessage());
    	die('Houve um erro');
	}

	$conn->close();
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

			#sair_icon { transform: rotate(-90deg); }

			.clickable {
				cursor: pointer;
			}


		</style>
	</head>
	<body>

		<!-- O logo e os links da navbar deverao ser decididos depois -->
		<?php include BASE_URL."header.php"; ?>

		<main>
			<div class="container">
				<div class="row" style="margin-top: 50px">
					<div class="col s3">
						<div class="collection">
							<a href="<?=ROOT?>admin.php" class="sidebar collection-item active">
								Solicitações de Recursos
							</a>
							<a href="<?=ROOT?>logout.php" class="sidebar collection-item">
								Sair <i id="sair_icon" class="material-icons right"> vertical_align_bottom </i>
							</a>
						</div>
					</div>
					<div class="col s1"></div>
					<div class="col s8">
						<div class="divider"></div>
						<div class="section">
						    <ul id="lista_requisicoes" class="collection with-header">
							    <li class="collection-header"><h5>Solicitações de Registros de Recursos</h5></li>
							    <!-- Template de como uma entrada de solicitacao de requisicao deve ser
								    <li class="collection-item" id="1">
							    	<p style="font-size:15pt;"> Introdução ao teste de software&nbsp;&nbsp;&nbsp;<a style="float: right; font-size:11pt;"href="">Ver recurso</a></p>
							    	<p> Por Jose Antonio da Silva, joseantonio@gmail.com </p>
							    	<p> <i> Registrado em 12/12/12 </i> </p>
							    
							    	<div class='row'>
							    			<div class = "col s6"> <center> <a class="waves-effect waves-light btn green">ACEITAR</a> </center> </div>
							    			<div class = "col s6"> <center> <a class="waves-effect waves-light btn red">REPROVAR</a> </center> </div>
							    	</div>
							    </li> -->
						    </ul>
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
		<script src="<?=ROOT?>js/init.js"></script>

		<?php include(BASE_URL.'export_session.php') ?> <!-- Incluir esse arquivo antes do outro, senao a variavel sessao nao estaria iniciada -->
		<script type="text/javascript">
			$(function() {
				window.requisicoes = [];

				// Exporta as variaveis de requisicoes para window.requisicoes
				<?php 
					for($i = 0; $i < count($requisicoes); $i++) {
						echo "var req = [];";
						echo "req['ID_RECURSO'] = '" . $requisicoes[$i]['ID_RECURSO'] ."';";
						echo "req['TITULO'] = '" . $requisicoes[$i]['TITULO'] ."';";
						echo "req['DATA_AD'] = '" . $requisicoes[$i]['DATA_AD'] ."';";
						echo "req['NOME'] = '" . $requisicoes[$i]['NOME'] ."';";
						echo "req['EMAIL'] = '" . $requisicoes[$i]['EMAIL'] ."';";
						echo "window.requisicoes.push(req);";
					}
				?>
			})
		</script>
		<script type="text/javascript" src="<?=ROOT?>admin.js"> </script>
	</body>
</html>
