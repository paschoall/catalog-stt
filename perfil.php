<?php
	include_once "defines.php";
	session_start(); // cria o hash do browser do usuario no servidor ou entao recupera se existente

	if(isset($_SESSION['email']) == false) {
		header('location:'.ROOT.'login.php?redirect=' . $_SERVER['REQUEST_URI']);
	}
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
							<a href="<?=ROOT?>recursos/inserir.php" class="sidebar collection-item">
								Adicionar Recursos
							</a>
							<a href="<?=ROOT?>recursos/gerenciar.php" class="sidebar collection-item">
								Meus Recursos
							</a>
							<a href="<?=ROOT?>perfil.php" class="sidebar collection-item active">
								Meus Dados
							</a>
							<a href="<?=ROOT?>logout.php" class="sidebar collection-item">
								Sair <i id="sair_icon" class="material-icons right"> vertical_align_bottom </i>
							</a>
						</div>
					</div>
					<div class="col s9">
						<div class="divider"></div>
						<div class="section">
							<h5 id="nome"> </h5>
						
							<table class="striped">
								<tr> <td> Email </td> <td id="email"> </td> </tr>
								<tr> <td> Data de Nascimento </td> <td id="data_nasc"> </td> <td> <i id="edit_data_nasc" class="material-icons tiny clickable">edit</i></td></tr>
								<tr> <td> CEP </td> <td id="cep"> </td> <td> <i id="edit_cep" class="material-icons tiny clickable">edit</i> </td></tr>
								<tr> <td> Estado </td> <td id="estado"> </td> <td> </td></tr>
								<tr> <td> Cidade </td> <td id="cidade"> </td> <td> </td></tr>
								<tr> <td> Bairro </td> <td id="bairro"> </td> <td> </td></tr>
								<tr> <td> Rua </td> <td id="rua"> </td> <td> </td></tr>
								<tr> <td> Numero </td> <td id="numero"> </td> <td> <i id="edit_numero" class="material-icons tiny clickable">edit</i></a></td></tr>
								<tr> <td> Complemento </td> <td id="complemento"> </td> <td> <i id="edit_complemento" class="material-icons tiny clickable">edit</i></a></td></tr>
							</table>
							<button class="btn waves-effect waves-light green lighten-3 right" id="salvar_mudancas" onclick='alterarUsuario()' style="margin-top: 10px;">Salvar mudanças</button>
						</div>
						<div class="divider" style="margin-top: 100px"></div>
						<div class="section">
							<div class="collection" style="width: 100%;">
								<div class="collection-item">
									<h6> Mudar senha </h6>
									<div class="row">
										<form id="mudar_senha" method="post">
											<input type="email" name="email" value="<?php echo $_SESSION["email"];?>" hidden>
											<div class="col s5"> <input type="password" name="anterior" id="anterior" maxlength="255"><label for="anterior"> Senha anterior </label></div>
											<div class="col s5"> 
												<input type="password" name="nova" id="nova" class="validate" maxlength="255">
												<label for="nova"> Senha nova </label>
												<p> A senha deve conter pelo menos 6 caracteres compostos por letras maiúsculas e minúsculas e pelo menos 1 dígito.</p>
											</div>
										
										
											
											<div class="col s2"> <button id="mudar_senha_btn" class="btn waves-effect waves-light green lighten-3" type="submit" >Alterar</button></div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="divider"></div>
						<a class=" waves-effect waves-teal btn-flat right" style="font-size: 10pt; color: #333333; margin-top: 20px;" onclick='excluirConta()' >Excluir conta</a>
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
		<script type="text/javascript" src="<?=ROOT?>perfil.js"> </script>
	</body>
</html>