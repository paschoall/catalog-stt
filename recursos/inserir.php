<!DOCTYPE HTML>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title> Catalog-STT </title>

		<!-- CSS Materialize -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

		<!-- Jquery UI -->
		<link rel="stylesheet" href="../jquery/jquery-ui.min.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 

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
		<?php include('../header.php') ?>

		<main>
		<div class="container">
			<div class="section" style="margin-top: 20px">
				<h5> Cadastrar recurso </h5>
			</div>

			<div class="row">
				<form class="col s12" id="form">

					<!----------------------------------------->
					<div class="row" style="">
						<div class="input-field col s12 m5"> 
							<input type="text" id="titulo" name="titulo" class="obrigatorio" maxlength="45" />
							<label for="titulo"> Titulo *</label>
						</div>
						<div class="input-field col s12 m4"> 
							<select id="idioma" name="idioma">
							<option value="AF"> Afrikanns </option>
							<option value="AR"> Árabe </option>
							<option value="HY"> Armênio </option>
							<option value="SQ"> Albanês </option>
							<option value="EU"> Basco </option>
							<option value="BN"> Bengali </option>
							<option value="BG"> Búlgaro </option>
							<option value="CA"> Catalão </option>
							<option value="KM"> Cambojano </option>
							<option value="ZH"> Chinês (Mandarim) </option>
							<option value="HR"> Croata </option>
							<option value="CS"> Tcheco </option>
							<option value="DA"> Dinamarquês </option>
							<option value="NL"> Holandês </option>
							<option value="ET"> Estoniano </option>
							<option value="FJ"> Fiji </option>
							<option value="FI"> Finlandês </option>
							<option value="FR"> Francês </option>
							<option value="KA"> Georgiano </option>
							<option value="DE"> Alemão </option>
							<option value="EL"> Grego </option>
							<option value="GU"> Gujarati </option>
							<option value="HE"> Hebraico </option>
							<option value="HI"> Hindi </option>
							<option value="HU"> Húngaro </option>
							<option value="IS"> Islandês </option>
							<option value="ID"> Indonésio </option>
							<option value="GA"> Irlandês </option>
							<option value="IT"> Italiano </option>
							<option value="JA"> Japonês </option>
							<option value="JW"> Javanês </option>
							<option value="KO"> Coreano </option>
							<option value="LA"> Latim </option>
							<option value="LV"> Letão </option>
							<option value="LT"> Lituano </option>
							<option value="MK"> Macedônio </option>
							<option value="MS"> Malaio </option>
							<option value="ML"> Malayalam </option>
							<option value="MT"> Maltês </option>
							<option value="MI"> Maori </option>
							<option value="MR"> Marathi </option>
							<option value="MN"> Mongol </option>
							<option value="NE"> Nepali </option>
							<option value="NO"> Norueguês </option>
							<option value="FA"> Persa </option>
							<option value="PL"> Polonês </option>
							<option value="PT"> Português </option>
							<option value="BR"> Português (Brasil) </option>
							<option value="PA"> Punjabi </option>
							<option value="QU"> Quechua </option>
							<option value="RO"> Romeno </option>
							<option value="RU"> Russo </option>
							<option value="SM"> Samoano </option>
							<option value="SR"> Sérvio </option>
							<option value="SK"> Eslovaco </option>
							<option value="SL"> Esloveno </option>
							<option value="ES"> Espanhol </option>
							<option value="SW"> Suaíli </option>
							<option value="SV"> Sueco </option>
							<option value="TA"> Tâmil </option>
							<option value="TT"> Tártaro </option>
							<option value="TE"> Telugu </option>
							<option value="TH"> Tailandês </option>
							<option value="BO"> Tibetano </option>
							<option value="TO"> Tonga </option>
							<option value="TR"> Turco </option>
							<option value="UK"> Ucraniano </option>
							<option value="UR"> Urdu </option>
							<option value="UZ"> Uzbeque </option>
							<option value="VI"> Vietnamita </option>
							<option value="CY"> Welsh </option>
							<option value="XH"> Xhosa </option>
							</select>
							<label for="idioma"> Idioma *</label>
						</div>
						<div class="input-field col s12 m3" style=""> 
							<input type="text" id="repositorio" name="repositorio" class="obrigatorio" maxlength="45" > 
							<label for="repositorio"> Repositório *</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m12">
							<textarea id="descricao" name="descricao" class="materialize-textarea obrigatorio" ></textarea>
							<label for="descricao">Descrição *</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m3" style=""> 
							<input type="text" id="palavraschave" data-box="chave" name="palavraschave" class="obrigatorio multiply-adder" maxlength="45" > 
							<label for="palavra-chave"> Palavra-Chave *</label>
						</div>
						<div class="col s9">
							<div class="card blue-grey darken-1">
								<div class="card-content white-text" id="box-chave">
									<p>Para adicionar palavras-chave preencha o campo ao lado e pressione enter.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m3" style=""> 
							<input type="email" id="autor_recurso" name="autor_recurso" data-box="autor_recurso" class="obrigatorio multiply-adder" maxlength="45" >
							<label for="autor_recurso"> Autor(Email do autor) *</label>
						</div>

						<div class="col s12 m9">
							<div class="card blue-grey darken-1">
								<div class="card-content white-text" id="box-autor_recurso">
									<p>Para adicionar autores preencha o campo ao lado e pressione enter.</p>
								</div>
							</div>
						</div>
					</div>
					<!--------------------Fim Geral--------------------->



					<!------------------Ciclo de Vida----------------------->
					<div class="row">
						<div class="input-field col s12 m5"> 
							<input type="text" id="entidade_contribuinte" name="entidade_contribuinte" class="obrigatorio" >
							<label for="entidade_contribuinte">Entidade que contribuiu *</label>
						</div>
						<div class="input-field col s12 m3"> 
							<input type="text" id="versao" name="versao" class="obrigatorio" >
							<label for="versao"> Versão *</label>
						</div>
						<div class="input-field col s12 m4"> 
							<input type="text" id="status" name="status" class="obrigatorio" >
							<label for="status"> Status *</label>
						</div>
					</div>

					<!------------------Fim Ciclo de Vida----------------------->

					<!------------------Técnica----------------------->
					<div class="row">
						<div class="input-field col s12 m4"> 
							<select name="formato" id="formato">

								<option>Executável</option>
								<optgroup label="Vídeo">
									<option>AVI</option>
									<option>QuickTime</option>
									<option>Windows Media Video</option>
									<option>Flash Video</option>
									<option>MPEG-1</option>
									<option>MPEG-2</option>
									<option>MPEG-4</option>
								</optgroup>
								<optgroup label="Outros">
									<option>Site</option>
								</optgroup>
							</select>
							<label for="formato"> Formato *</label>
						</div>
						<div class="input-field col s12 m4"> 
							<input type="number" id="tamanho" name="tamanho" class="obrigatorio">
							<label for="tamanho"> Tamanho</label>
						</div>
						<div class="input-field col s12 m4"> 
							<input type="text" id="duracao" name="duracao" class="obrigatorio">
							<label for="duracao"> Duração</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="text" id="localizacao" name="localizacao" class="obrigatorio" >
							<label for="localizacao"> Localização *</label>
							<span class="helper-text" data-error="wrong" data-success="right">Link para o recurso.</span>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12 m12">
							<textarea id="requisitos_tecnologicos" name="requisitos_tecnologicos" class="materialize-textarea obrigatorio" ></textarea>
							<label for="requisitos_tecnologicos">Requisito Técnologicos *</label>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12 m12">
							<textarea id="instrucoes_instalacao" name="instrucoes_instalacao" class="materialize-textarea obrigatorio" ></textarea>
							<label for="instrucoes_instalacao">Instruções de Instalação *</label>
						</div>
					</div>
					<!------------------Fim Técnica----------------------->



					<!------------------Inicio Educacional----------------------->
					<div class="row">
						<div class="input-field col s12 m6">
							<input type="text" id="tipo_interatividade" name="tipo_interatividade" class="obrigatorio" >
							<label for="tipo_interatividade"> Tipo de Interatividade *</label>
						</div>
						<div class="input-field col s12 m6">
							<input type="text" id="tipo_recurso" name="tipo_recurso" class="obrigatorio" >
							<label for="tipo_recurso"> Tipo de Recurso de Aprendizagem *</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m12">
							<textarea id="descricao_educacional" name="descricao_educacional" class="materialize-textarea obrigatorio" ></textarea>
							<label for="descricao_educacional">Descrição Educacional *</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m3" style=""> 
							<input type="text" id="niveis" name="niveis"  data-box="niveis" class="obrigatorio multiply-adder" maxlength="45" > 
							<label for="niveis">Niveis de Teste *</label>
						</div>

						<div class="col s12 m9">
							<div class="card blue-grey darken-1">
								<div class="card-content white-text" id="box-niveis">
									<p>Para adicionar niveis preencha o campo ao lado e pressione enter.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m3" style=""> 
							<input type="text" id="tecnica" name="tecnica" data-box="tecnica" class="obrigatorio multiply-adder" maxlength="45" > 
							<label for="tecnica"> Técnicas de Teste*</label>
						</div>

						<div class="col s12 m9">
							<div class="card blue-grey darken-1">
								<div class="card-content white-text" id="box-tecnica">
									<p>Para adicionar as técnicas preencha o campo ao lado e pressione enter.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m3" style=""> 
							<input type="text" id="criterio" name="criterio" data-box="criterio" class="obrigatorio multiply-adder"  maxlength="45" > 
							<label for="criterio"> Critérios de Teste *</label>
						</div>

						<div class="col s12 m9">
							<div class="card blue-grey darken-1">
								<div class="card-content white-text" id="box-criterio">
									<p>Para adicionar os critérios preencha o campo ao lado e pressione enter.</p>
								</div>
							</div>
						</div>
					</div>
					<!------------------Fim Educacional----------------------->



					
					<!------------------Inicio Direitos----------------------->
					<div class="row">
						<div class="input-field col s12 m4">

						<label for="custo"> Possui custo? *</label>
						<br>
						<br>
							<div class="switch">
								<label>
									Não
									<input id="custo" name="custo" type="checkbox">
									<span class="lever"></span>
									Sim
								</label>
							</div>
						</div>

						<div class="input-field col s12 m4">
							<input type="text" id="creative_commons" name="creative_commons" class="obrigatorio" >
							<label for="creative_commons"> Creative Common *</label>
						</div>

						<div class="input-field col s12 m4">
							<input type="text" id="copyright" name="copyright" class="obrigatorio" >
							<label for="copyright"> Copyright *</label>
						</div>
					</div>
					<!------------------Fim Direitos----------------------->

					
				</form>
				<div class="input-field col s3 valign-wrapper" style=" margin-top: -10px;"> 
						<button class="btn waves-effect waves-light cyan darken-1" id="enviar" name="enviar">Enviar</button>
					</div>
			</div>
		</div>
		</main>

		<?php include('../footer.php') ?>
		<!--  Scripts-->
		<script src="../jquery/external/jquery/jquery.js"></script>
		<script src="../jquery/jquery-ui.min.js"></script>
		<script src="../js/materialize.js"></script>
		<script src="../js/init.js"></script>


		<script>
		function validateEmail(email) {
			var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			if (regex.test(email)) {
				return true;
			}else{
				return false;
			}
		}
		$(document).ready(function(){
			var multiplos = [];
			$('select').formSelect();

			$('#enviar').on('click',function(e){
				var dataForm = $('#form').serializeArray();

				//Atribuindo os elementos multivalorados
				console.log(dataForm);
				
				dataForm[5]["value"]  = multiplos['autor_recurso'] ;
				dataForm[4]["value"]  = multiplos['chave'] ;
				dataForm[18]["value"] = multiplos['niveis'] ;
				dataForm[19]["value"] = multiplos['tecnica'] ;
				dataForm[20]["value"] = multiplos['criterio'] ;


				$.ajax({
					method : 'POST',
					url    : 'server/inserir.php',
					data   : dataForm,
					dataType: "json",
				})
					.done(function(ret){
						console.log(ret);
					})
					.fail(function(xhr, textStatus, errorThrown) {
						console.log(textStatus);
						console.log(xhr.responseText);   
					})
					.always(function() {
					}); 


			});
			$('#form').submit(function(e){
				e.preventDefault();
				return false;
			});
			$('form').on(
				'click','.box-button-added', function(e){
					let index = multiplos[$(this).data('box')].indexOf($(this).data('val'));
					if (index > -1) {
						multiplos[$(this).data('box')].splice(index, 1);
					}
					$(this).remove();
					
				}
			)
			$('.multiply-adder').on({
				keypress:function(e){
					if (e.keyCode == 13) {
						valor = $(this).val();
						box   = $(this).data('box');
						if(valor){
							if(typeof multiplos[box] === 'undefined'){
								multiplos[box] = [];
							}
							if($(this).attr('type') === 'email'){
								if(!validateEmail(valor))
									return;
							}
							$('#box-'+box+' p').remove();
							multiplos[box].push(valor);
							$('#box-'+box).append('<a style="margin:0 5px 2px 0" data-box="'+box+'" data-val="'+valor+'" class="waves-effect waves-light btn-small box-button-added"><i class="material-icons left">remove_circle</i>'+valor+'</a>');
							$(this).val(' ');
						}

					}
				}
			})
		});
       
		</script>
	</body>
</html>