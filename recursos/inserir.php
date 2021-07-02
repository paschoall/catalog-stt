<?php
	include_once "../defines.php";
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

		<!-- Jquery UI -->
		<link rel="stylesheet" href="<?=ROOT?>jquery/jquery-ui.min.css">
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

		<link href="<?=ROOT?>css/styleInserir.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>

		<!-- O logo e os links da navbar deverao ser decididos depois -->
		<?php include(BASE_URL.'../header.php') ?>

		<main>
		<div class="container">
			<div class="row"  style="margin-top: 50px">
				<div class="col s3">
					<div class="collection">
						<a href="<?=ROOT?>recursos/gerenciar.php" class="sidebar collection-item">
							Meus Recursos
						</a>
						<a href="<?=ROOT?>recursos/inserir.php" class="sidebar collection-item active">
							Adicionar Recursos
						</a>
						<a href="<?=ROOT?>perfil.php" class="sidebar collection-item">
							Meus Dados
						</a>
						<a href="<?=ROOT?>logout.php" class="sidebar collection-item">
							Sair <i id="sair_icon" class="material-icons right"> vertical_align_bottom </i>
						</a>
					</div>
				</div>
				<div class="col s9">
					<div class="section" style="margin-top: 20px">
						<h5> Cadastrar recurso </h5>
						<span style="color:red;">Todos os items marcados com (*) são obrigatórios!</span>
					</div>

					<div class="row">
						<form class="col s12" id="form">

							<button class="collapsible waves-effect waves-light">Informações Gerais *</button>
							<div class="content">
							<!----------------------------------------->
								<div class="row" style="">
									<div class="input-field col s12 m5 tooltip"> 
										<input type="text" id="titulo" name="titulo" class="obrigatorio" maxlength="45" />
										<label for="titulo"> Titulo *</label>
										<span class="tooltiptext">O titulo do recurso</span>
									</div>
									<div class="input-field col s12 m4 tooltip"> 
										<select id="idioma" name="idioma">
											<option value="AF"> (AF) Afrikanns </option>
											<option value="AR"> (AR) Árabe </option>
											<option value="BG"> (BG) Búlgaro </option>
											<option value="BN"> (BN) Bengali </option>
											<option value="BO"> (BO) Tibetano </option>
											<option value="BR"> (BR) Português (Brasil) </option>
											<option value="CA"> (CA) Catalão </option>
											<option value="CS"> (CS) Tcheco </option>
											<option value="CY"> (CY) Welsh </option>
											<option value="DA"> (DA) Dinamarquês </option>
											<option value="DE"> (DE) Alemão </option>
											<option value="EL"> (EL) Grego </option>
											<option value="ES"> (ES) Espanhol </option>
											<option value="ET"> (ET) Estoniano </option>
											<option value="EU"> (EU) Basco </option>
											<option value="FA"> (FA) Persa </option>
											<option value="FI"> (FI) Finlandês </option>
											<option value="FJ"> (FJ) Fiji </option>
											<option value="FR"> (FR) Francês </option>
											<option value="GA"> (GA) Irlandês </option>
											<option value="GU"> (GU) Gujarati </option>
											<option value="HE"> (HE) Hebraico </option>
											<option value="HI"> (HI) Hindi </option>
											<option value="HR"> (HR) Croata </option>
											<option value="HU"> (HU) Húngaro </option>
											<option value="HY"> (HY) Armênio </option>
											<option value="ID"> (ID) Indonésio </option>
											<option value="IS"> (IS) Islandês </option>
											<option value="IT"> (IT) Italiano </option>
											<option value="JA"> (JA) Japonês </option>
											<option value="JW"> (JW) Javanês </option>
											<option value="KA"> (KA) Georgiano </option>
											<option value="KM"> (KM) Cambojano </option>
											<option value="KO"> (KO) Coreano </option>
											<option value="LA"> (LA) Latim </option>
											<option value="LT"> (LT) Lituano </option>
											<option value="LV"> (LV) Letão </option>
											<option value="MI"> (MI) Maori </option>
											<option value="MK"> (MK) Macedônio </option>
											<option value="ML"> (ML) Malayalam </option>
											<option value="MN"> (MN) Mongol </option>
											<option value="MR"> (MR) Marathi </option>
											<option value="MS"> (MS) Malaio </option>
											<option value="MT"> (MT) Maltês </option>
											<option value="NE"> (NE) Nepali </option>
											<option value="NL"> (NL) Holandês </option>
											<option value="NO"> (NO) Norueguês </option>
											<option value="PA"> (PA) Punjabi </option>
											<option value="PL"> (PL) Polonês </option>
											<option value="PT"> (PT) Português </option>
											<option value="QU"> (QU) Quechua </option>
											<option value="RO"> (RO) Romeno </option>
											<option value="RU"> (RU) Russo </option>
											<option value="SK"> (SK) Eslovaco </option>
											<option value="SL"> (SL) Esloveno </option>
											<option value="SM"> (SM) Samoano </option>
											<option value="SQ"> (SQ) Albanês </option>
											<option value="SR"> (SR) Sérvio </option>
											<option value="SV"> (SV) Sueco </option>
											<option value="SW"> (SW) Suaíli </option>
											<option value="TA"> (TA) Tâmil </option>
											<option value="TE"> (TE) Telugu </option>
											<option value="TH"> (TH) Tailandês </option>
											<option value="TO"> (TO) Tonga </option>
											<option value="TR"> (TR) Turco </option>
											<option value="TT"> (TT) Tártaro </option>
											<option value="UK"> (UK) Ucraniano </option>
											<option value="UR"> (UR) Urdu </option>
											<option value="UZ"> (UZ) Uzbeque </option>
											<option value="VI"> (VI) Vietnamita </option>
											<option value="XH"> (XH) Xhosa </option>
											<option value="ZH"> (ZH) Chinês (Mandarim) </option>
										</select>
										<label for="idioma"> Idioma *</label>
										<span class="tooltiptext">O idioma atual do recurso</span>
									</div>
									<div class="input-field col s12 m3 tooltip" style=""> 
										<input type="text" id="repositorio" name="repositorio" class="obrigatorio" maxlength="45" > 
										<label for="repositorio"> Repositório *</label>
										<span class="tooltiptext">O tipo de repositório onde o recurso está (não o link absoluto, somente o tipo: YouTube, WordPress, Site Local)</span>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m12 tooltip">
										<textarea id="descricao" name="descricao" class="materialize-textarea obrigatorio" ></textarea>
										<label for="descricao">Descrição *</label>
										<span class="tooltiptext">Uma breve descrição do recurso</span>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m3 tooltip" style=""> 
										<input type="text" id="palavraschave" data-box="chave" name="palavraschave" class="obrigatorio multiply-adder" maxlength="45" > 
										<label for="palavra-chave"> Palavra-Chave *</label>
									</div>
									<div class="col s9">
										<div class="card blue-grey darken-1">
											<div class="card-content white-text tooltip" id="box-chave">
												<p>Para adicionar palavras-chave preencha o campo ao lado e pressione enter.</p>
												<span class="tooltiptext">As palavras-chave do recurso</span>
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
											<div class="card-content white-text tooltip" id="box-autor_recurso">
												<p>Para adicionar autores preencha o campo ao lado e pressione enter.</p>
												<span class="tooltiptext">Os emails dos demais autores do recurso</span>
											</div>
										</div>
									</div>
								</div>
								<br><br><br>
								<!--------------------Fim Geral--------------------->
							</div>


							<button class="collapsible waves-effect waves-light">Ciclo de Vida *</button>
							<div class="content">
								<!------------------Ciclo de Vida----------------------->
								<div class="row">
									<div class="input-field col s12 m5 tooltip"> 
										<input type="text" id="entidade_contribuinte" name="entidade_contribuinte" class="obrigatorio" >
										<label for="entidade_contribuinte">Entidade que contribuiu *</label>
										<span class="tooltiptext">A entidade, governamental ou não, que contribuiu com a criação desse recurso</span>
									</div>
									<div class="input-field col s12 m3 tooltip"> 
										<input type="text" id="versao" name="versao" class="obrigatorio" >
										<label for="versao"> Versão *</label>
										<span class="tooltiptext">A versão do recurso sendo inserido</span>
									</div>
									<div class="input-field col s12 m4 tooltip"> 
										<select id="status" name="status" class="obrigatorio">
											<option value="Disponivel"> Disponivel </option>
											<option value="Indisponivel"> Indisponivel </option>
											<option value="Desconhecido"> Desconhecido </option>
										</select>
										<label for="status"> Status *</label>
										<span class="tooltiptext">Status que se encontra o recurso</span>
									</div>
									<!-- <div class="input-field col s12 m4"> 
										<input type="text" id="status" name="status" class="obrigatorio" >
										<label for="status"> Status *</label>
									</div> -->
								</div>
								<br><br><br><br>
								<!------------------Fim Ciclo de Vida----------------------->
							</div>

							<button class="collapsible waves-effect waves-light">Informações Técnicas *</button>
							<div class="content">
								<!------------------Técnica----------------------->
								<div class="row">
									<div class="input-field col s12 m4 tooltip"> 
										<input type="text" id="formato" name="formato" class="obrigatorio">
										<!-- <select name="formato" id="formato">
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
										</select> -->
										<label for="formato"> Formato *</label>
										<span class="tooltiptext">O formato do recurso (MP4, EXE, Site, etc)</span>
									</div>
									<div class="input-field col s12 m4 tooltip"> 
										<input type="number" id="tamanho" name="tamanho" class="obrigatorio">
										<label for="tamanho"> Tamanho</label>
										<span class="tooltiptext">O tamanho do recurso, em megabytes</span>
									</div>
									<div class="input-field col s12 m4 tooltip"> 
										<input type="text" id="duracao" name="duracao" class="obrigatorio">
										<label for="duracao"> Duração</label>
										<span class="tooltiptext">A duração esperada do recurso, em minutos</span>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 tooltip">
										<input type="text" id="localizacao" name="localizacao" class="obrigatorio" >
										<label for="localizacao"> Localização *</label>
										<span class="helper-text" data-error="wrong" data-success="right">Link para o recurso.</span>
										<span class="tooltiptext">Link para o local mais atual do recurso (favor colocar o link sem 'http://')</span>
									</div>
								</div>

								<div class="row">
									<div class="input-field col s12 m12 tooltip">
										<textarea id="requisitos_tecnologicos" name="requisitos_tecnologicos" class="materialize-textarea obrigatorio" ></textarea>
										<label for="requisitos_tecnologicos">Requisito Técnologicos *</label>
										<span class="tooltiptext">As tecnologias necessárias para utilização do recurso</span>
									</div>
								</div>

								<div class="row">
									<div class="input-field col s12 m12 tooltip">
										<textarea id="instrucoes_instalacao" name="instrucoes_instalacao" class="materialize-textarea obrigatorio" ></textarea>
										<label for="instrucoes_instalacao">Instruções de Instalação *</label>
										<span class="tooltiptext">Instruções básicas de como instalar/executar o recurso</span>
									</div>
								</div>
								<br><br><br>
								<!------------------Fim Técnica----------------------->
							</div>

							<button class="collapsible waves-effect waves-light">Informação Educacional *</button>
							<div class="content">
								<!------------------Inicio Educacional----------------------->
								<div class="row">
									<div class="input-field col s12 m6 tooltip">
										<input type="text" id="tipo_interatividade" name="tipo_interatividade" class="obrigatorio" >
										<label for="tipo_interatividade"> Tipo de Interatividade *</label>
										<span class="tooltiptext">Como é esperado que alguém interaja com esse recurso?</span>
									</div>
									<div class="input-field col s12 m6 tooltip">
										<input type="text" id="tipo_recurso" name="tipo_recurso" class="obrigatorio" >
										<label for="tipo_recurso"> Tipo de Recurso de Aprendizagem *</label>
										<span class="tooltiptext">Qual o tipo desse recurso? ()</span>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m12 tooltip">
										<textarea id="descricao_educacional" name="descricao_educacional" class="materialize-textarea obrigatorio" ></textarea>
										<label for="descricao_educacional">Descrição Educacional *</label>
										<span class="tooltiptext">Uma breve descrição do valor educacional desse recurso</span>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m3" style=""> 
										<input type="text" id="niveis" name="niveis"  data-box="niveis" class="obrigatorio multiply-adder" maxlength="45" > 
										<label for="niveis">Niveis de Teste *</label>
									</div>

									<div class="col s12 m9">
										<div class="card blue-grey darken-1">
											<div class="card-content white-text tooltip" id="box-niveis">
												<p>Para adicionar niveis preencha o campo ao lado e pressione enter.</p>
												<span class="tooltiptext">Os niveis de teste que o recurso pretende ensinar</span>
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
											<div class="card-content white-text tooltip" id="box-tecnica">
												<p>Para adicionar as técnicas preencha o campo ao lado e pressione enter.</p>
												<span class="tooltiptext">As técnicas de teste que o recurso pretende ensinar</span>
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
											<div class="card-content white-text tooltip" id="box-criterio">
												<p>Para adicionar os critérios preencha o campo ao lado e pressione enter.</p>
												<span class="tooltiptext">Os critérios de teste que o recurso pretende ensinar</span>
											</div>
										</div>
									</div>
								</div>
								<br><br><br>
								<!------------------Fim Educacional----------------------->
							</div>


							<button class="collapsible waves-effect waves-light">Direitos Autorais *</button>
							<div class="content">
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

									<div class="input-field col s12 m4 tooltip">
										<input type="text" id="creative_commons" name="creative_commons" class="obrigatorio" >
										<label for="creative_commons"> Creative Common *</label>
										<span class="tooltiptext">O formato de Creative Common (se existir) do recurso</span>
									</div>

									<div class="input-field col s12 m4 tooltip">
										<input type="text" id="copyright" name="copyright" class="obrigatorio" >
										<label for="copyright"> Copyright *</label>
										<span class="tooltiptext">O formato de Copyright (se existir) do recurso</span>
									</div>
								</div>
								<br><br><br>
								<!------------------Fim Direitos----------------------->
							</div>
							
						</form>
						<div class="input-field col s3 valign-wrapper" style=""> 
							<button class="btn waves-effect waves-light cyan darken-1" id="enviar" name="enviar">Enviar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		</main>

		<?php include(BASE_URL.'../footer.php') ?>
		<!--  Scripts-->
		<script src="<?=ROOT?>jquery/external/jquery/jquery.js"></script>
		<script src="<?=ROOT?>jquery/jquery-ui.min.js"></script>
		<script src="<?=ROOT?>js/materialize.js"></script>
		<script src="<?=ROOT?>js/init.js"></script>
		<script src="<?=ROOT?>js/scriptInserir.js"></script>

		<?php include(BASE_URL.'../export_session.php') ?>
		<script type="text/javascript" src="<?=ROOT?>perfil.js"> </script>
		<script>
		function validateEmail(email) {
			var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			if (regex.test(email)) {
				return true;
			}else{
				return false;
			}
		}
		$(function(){
			// console.log(window.sessao);
			if(window.sessao.email === undefined) {
				$("#bem_vindo").hide();
				$("#perfil").hide();
			} else {
				$("#bem_vindo").html("Bem vindo, " + window.sessao["nome"] + "&nbsp;&nbsp;&nbsp;");
				$("#entrar").hide();
				$("#cadastrar").hide();
			}

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
						alert("Dado enviado para revisão, favor aguardar avaliação de um administrador para que seu recurso seja adicionado ou rejeitado.");
						window.location.replace("<?=ROOT?>recursos/gerenciar.php");
					})
					.fail(function(xhr, textStatus, errorThrown) {
						console.log(textStatus);
						console.log(xhr.responseText);   
						alert("Dado enviado para revisão, contudo, temos uma observação:\nSTATUS:" + textStatus + "\nAVISO:" + errorThrown);
						window.location.replace("<?=ROOT?>recursos/gerenciar.php");
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