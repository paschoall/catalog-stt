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

			span.field-icon {
			    float: right;
			    position: absolute;
			    right: 10px;
			    top: 10px;
			    cursor: pointer;
			    z-index: 2;
			    color: #707070;
			}
		</style>
	</head>
	<body>

		<!-- O logo e os links da navbar deverao ser decididos depois -->
		<?php include BASE_URL."header.php"; ?>

		<main>
		<div class="container card" style="margin: auto; padding-left: 5%;">
			<div class="section" style="margin-top: 20px">
				<h5> Cadastro de usuário </h5>
				<span style="color:red; font-size: 11px;">Todos os items marcados com (*) são obrigatórios!</span>
			</div>
			<div class="row">
				<form class="col s12" method="post" id="form"  name="new_user" action="cadastro.php">
					<div class="row" style=" margin-top: -10px;">
						<div class="input-field col s5"> 
							<input type="text" id="nome" name="nome" class="obrigatorio" maxlength="45"> </input> 
							<label for="nome">Nome *</label>
						</div>
						<div class="input-field col s3">
							<input type="date" id="data_nascimento" class="validate obrigatorio" name="data_nascimento" min="1950-01-01" max="2022-07-16"/>
							<label for="data_nascimento">Data de Nascimento *</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s2 validate" style=" margin-top: -10px;"> 
							<input type="text" maxlength="10" id="cep" name="cep" class="validate "> </input> 
							<label for="cep">CEP</label>
						</div>

						<div class="input-field col s5" style=" margin-top: -10px;"> 
							<input type="text" id="cidade" name="cidade" class="" maxlength="45"> </input> 
							<label for="cidade">Cidade</label>
						</div>
						<div class="input-field col s1" style=" margin-top: -10px;">
							<!-- Aceita somente letras -->
							<input type="text" maxlength="2" id="uf" name="uf" class="" onkeydown="return /[a-z]/i.test(event.key)"> </input> 
							<label for="uf">UF</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s4" style=" margin-top: -10px;"> 
							<input type="text" id="rua" name="rua" class="" maxlength="120"> </input> 
							<label for="rua">Rua</label>
						</div>

						<div class="input-field col s4" style=" margin-top: -10px;"> 
							<input type="text" id="bairro" name="bairro" class="" maxlength="100"> </input> 
							<label for="bairro">Bairro</label>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s2" style=" margin-top: -10px;"> 
							<input type="text" id="numero" maxlength="7" name="numero" class=""> </input> 
							<label for="numero">Numero</label>
						</div>

						<div class="input-field col s6" style=" margin-top: -10px;"> 
							<input type="text" id="complemento" name="complemento" maxlength="100"> </input> 
							<label for="complemento">Complemento</label>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s8" style=" margin-top: 10px;"> 
							<input type="email" id="email" name="email" class="validate obrigatorio" maxlength="45"> </input> 
							<label for="email">E-mail *</label>
							<span class="helper-text" data-error="Email inválido" data-success=""></span>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s3" style=" margin-top: -10px;"> 
							<input autocomplete="off" type="password" id="senha" name="senha" class="obrigatorio validate" maxlength="255"> </input> 
							<label for="senha">Senha *</label>
							<span toggle="#senha" class="field-icon toggle-password"><span class="material-icons">visibility</span></span>
							<span class="helper-text" data-error="Senha inválida" data-success=""></span>
						</div>
						<div class="input-field col s3" style=" margin-top: -10px;"> 
							<input autocomplete="off" type="password" id="confirmar_senha" name="confirmar_senha" class="obrigatorio" maxlength="255"> </input> 
							<label for="confirmar_senha">Confirmar Senha *</label>
							<span toggle="#confirmar_senha" class="field-icon toggle-password"><span class="material-icons">visibility</span></span>
							<span class="helper-text" data-error="Senhas não conferem" data-success=""></span>
						</div>

						<div class="input-field col s3 valign-wrapper" style="margin-left: 10px; margin-top: -10px;"> 
							<button class="btn waves-effect waves-light cyan darken-1" id="confirmar" name="confirmar">Confirmar</button>
						</div>
					</div>
					<div class="row" style="margin-top: -20px; margin-left: 0px; font-size: 11px; color:##343434;">
						<p>  A senha deve conter pelo menos 6 caracteres compostos por letras maiúsculas e minúsculas e pelo menos 1 dígito. </p>
					</div>
				</form>
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

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

		<?php include(BASE_URL.'export_session.php') ?> <!-- Incluir esse arquivo antes do outro, senao a variavel sessao nao estaria iniciada -->
		<script type="text/javascript" src="<?=ROOT?>cadastro.js"> </script>

		<script type="text/javascript">

			var clicked = 0;

			$(".toggle-password").click(function (e) {
			     e.preventDefault();

			    $(this).toggleClass("toggle-password");
			      if (clicked == 0) {
			        $(this).html('<span class="material-icons">visibility_off</span >');
			         clicked = 1;
			      } else {
			         $(this).html('<span class="material-icons">visibility</span >');
			          clicked = 0;
			       }

			    var input = $($(this).attr("toggle"));
			    if (input.attr("type") == "password") {
			       input.attr("type", "text");
			    } else {
			       input.attr("type", "password");
			    }
			});
			
			//$('#data_nascimento').mask('00/00/0000', {reverse: true});
			$('#cep').mask('00.000-000', {reverse: true});

		</script>
	</body>
</html>