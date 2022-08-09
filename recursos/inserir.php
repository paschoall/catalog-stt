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

			.email_box{
				text-transform: lowercase;
			}
		</style>

		<link href="<?=ROOT?>css/styleInserir.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>

		<!-- O logo e os links da navbar deverao ser decididos depois -->
		<!-- <//?php include(BASE_URL.'../header.php') ?> -->
		<?php include(BASE_URL.'header.php') ?>

		<main>
		<div class="container">
			<div class="row"  style="margin-top: 50px">
				<div class="col s3">
					<div class="collection">
						<a href="#" onclick="acessarLink('<?=ROOT?>recursos/inserir.php');" class="sidebar collection-item active">
							Adicionar Recursos
						</a>
						<a href="#" onclick="acessarLink('<?=ROOT?>recursos/gerenciar.php');" class="sidebar collection-item">
							Meus Recursos
						</a>
						<a href="#" onclick="acessarLink('<?=ROOT?>perfil.php');" class="sidebar collection-item">
							Meus Dados
						</a>
						<a href="#" onclick="sair('<?=ROOT?>logout.php');" class="sidebar collection-item">
							Sair <i id="sair_icon" class="material-icons right"> reply_all </i>
						</a>
					</div>
				</div>
				<div class="col s9 card">
					<div class="section" style="margin-top: 20px">
						<h5> Cadastrar recurso </h5>
						<span style="color:red; font-size: 11px;">Todos os items marcados com (*) são obrigatórios!</span>
					</div>

					

					<div class="row">
						<form class="col s12" id="form">

							<button class="collapsible waves-effect waves-light">Informações Gerais *</button>
							<div class="content">
							<!----------------------------------------->
								<div class="row" style="">
									<div class="input-field col s12 m5 tooltip"> 
										<input type="text" id="titulo" name="titulo" class="obrigatorio" maxlength="45" />
										<label for="titulo">Título *</label>
										<span class="tooltiptext">Escreva o título do recurso.</span>
									</div>
									<div class="input-field col s12 m4 tooltip"> 
										<select id="idioma" name="idioma">
											<!-- <option value="AF"> Afrikanns (AF) </option> 
											<option value="SQ"> Albanês (SQ) </option> 
											<option value="DE"> Alemão (DE) </option> 
											<option value="AR"> Árabe (AR) </option> 
											<option value="HY"> Armênio (HY) </option> 
											<option value="EU"> Basco (EU) </option> 
											<option value="BN"> Bengali (BN) </option> 
											<option value="BG"> Búlgaro (BG) </option> 
											<option value="KM"> Cambojano (KM) </option> 
											<option value="CA"> Catalão (CA) </option> 
											<option value="ZH"> Chinês (ZH) (Mandarim) </option> 
											<option value="KO"> Coreano (KO) </option> 
											<option value="HR"> Croata (HR) </option> 
											<option value="DA"> Dinamarquês (DA) </option> 
											<option value="SK"> Eslovaco (SK) </option> 
											<option value="SL"> Esloveno (SL) </option> 
											<option value="ES"> Espanhol (ES) </option> 
											<option value="ET"> Estoniano (ET) </option> 
											<option value="FJ"> Fiji (FJ) </option> 
											<option value="FI"> Finlandês (FI) </option> 
											<option value="FR"> Francês (FR) </option> 
											<option value="KA"> Georgiano (KA) </option> 
											<option value="EL"> Grego (EL) </option> 
											<option value="GU"> Gujarati (GU) </option> 
											<option value="HE"> Hebraico (HE) </option> 
											<option value="HI"> Hindi (HI) </option> 
											<option value="NL"> Holandês (NL) </option> 
											<option value="HU"> Húngaro (HU) </option> 
											<option value="ID"> Indonésio (ID) </option> 
											<option value="EN"> Inglês (EN) </option> 
											<option value="GA"> Irlandês (GA) </option> 
											<option value="IS"> Islandês (IS) </option> 
											<option value="IT"> Italiano (IT) </option> 
											<option value="JA"> Japonês (JA) </option> 
											<option value="JW"> Javanês (JW) </option> 
											<option value="LA"> Latim (LA) </option> 
											<option value="LV"> Letão (LV) </option> 
											<option value="LT"> Lituano (LT) </option> 
											<option value="MK"> Macedônio (MK) </option> 
											<option value="MS"> Malaio (MS) </option> 
											<option value="ML"> Malayalam (ML) </option> 
											<option value="MT"> Maltês (MT) </option> 
											<option value="MI"> Maori (MI) </option> 
											<option value="MR"> Marathi (MR) </option> 
											<option value="MN"> Mongol (MN) </option> 
											<option value="NE"> Nepali (NE) </option> 
											<option value="NO"> Norueguês (NO) </option> 
											<option value="FA"> Persa (FA) </option> 
											<option value="PL"> Polonês (PL) </option> 
											<option value="BR"> Português (BR) (Brasil) </option> 
											<option value="PT"> Português (PT) (Portugal) </option> 
											<option value="PA"> Punjabi (PA) </option> 
											<option value="QU"> Quechua (QU) </option> 
											<option value="RO"> Romeno (RO) </option> 
											<option value="RU"> Russo (RU) </option> 
											<option value="SM"> Samoano (SM) </option> 
											<option value="SR"> Sérvio (SR) </option> 
											<option value="SW"> Suaíli (SW) </option> 
											<option value="SV"> Sueco (SV) </option> 
											<option value="TH"> Tailandês (TH) </option> 
											<option value="TA"> Tâmil (TA) </option> 
											<option value="TT"> Tártaro (TT) </option> 
											<option value="CS"> Tcheco (CS) </option> 
											<option value="TE"> Telugu (TE) </option> 
											<option value="BO"> Tibetano (BO) </option> 
											<option value="TO"> Tonga (TO) </option> 
											<option value="TR"> Turco (TR) </option> 
											<option value="UK"> Ucraniano (UK) </option> 
											<option value="UR"> Urdu (UR) </option> 
											<option value="UZ"> Uzbeque (UZ) </option> 
											<option value="VI"> Vietnamita (VI) </option> 
											<option value="CY"> Welsh (CY) </option> 
											<option value="XH"> Xhosa (XH) </option> -->
											<option value="BR"> Português (BR)</option>
											<option value="EN"> Inglês (EN) </option>
											<option value="ES"> Espanhol (ES) </option>
										</select>
										<label for="idioma">Idioma *</label>
										<span class="tooltiptext">Indique o idioma atual do recurso.</span>
									</div>
									<div class="input-field col s12 m3 tooltip" style=""> 
										<input type="text" id="repositorio" name="repositorio" class="obrigatorio" maxlength="45" > 
										<label for="repositorio">Repositório *</label>
										<span class="tooltiptext">O tipo de repositório onde o recurso está (não o link absoluto, somente o tipo: YouTube, WordPress, Site Local).</span>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m12 tooltip">
										<textarea id="descricao" name="descricao" class="materialize-textarea obrigatorio" ></textarea>
										<label for="descricao">Descrição *</label>
										<span class="tooltiptext">Uma breve descrição do recurso.</span>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m5 tooltip" style=""> 
										<input type="text" id="palavraschave" data-box="chave" name="palavraschave" class="obrigatorio multiply-adder" maxlength="45" > 
										<label for="palavraschave">Palavra-Chave *</label>
									</div>
									<div class="col s7">
										<div class="card blue lighten-4">
											<div class="card-content grey-text text-darken-4 tooltip" id="box-chave">
												<p>Para adicionar palavras-chave, preencha o campo ao lado e pressione enter.</p>
												<span class="tooltiptext">As palavras-chave do recurso.</span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m5" style="">
										<input type="email" id="autor_recurso" name="autor_recurso" data-box="autor_recurso" class="obrigatorio multiply-adder" maxlength="45" style="margin-top: 10px;">
										<label for="autor_recurso">Coautores (E-mail)</label>
										<span class="helper-text" data-error="Campo incorreto" data-success="Ok"></span>
									</div>

									<div class="col s12 m7">
										<div class="card blue lighten-4">
											<div class="card-content grey-text text-darken-4 tooltip" id="box-autor_recurso">
												
												<span class="tooltiptext">Indique os e-mails dos autores do recurso.</span>
											</div>
										</div>
									</div>
								</div>
								<br><br><br>
								<!--------------------Fim Geral--------------------->
							</div>


							<button class="collapsible waves-effect waves-light">Ciclo de Vida *</button>
							<div class="content" style="margin-bottom: 12px;">
								<!------------------Ciclo de Vida----------------------->
								
								<div class="row">
									<!-- <div class="input-field col s12 m5 tooltip"> 
										<input type="text" id="entidade_contribuinte" name="entidade_contribuinte" class="obrigatorio" >
										<label for="entidade_contribuinte">Entidade que contribuiu *</label>
										<span class="tooltiptext">A entidade, governamental ou não, que contribuiu com a criação desse recurso</span>
									</div> -->
									<div class="input-field col s12 m6 tooltip"> 
										<input type="text" id="versao" name="versao" class="obrigatorio" >
										<label for="versao">Versão *</label>
										<span class="tooltiptext">A versão do recurso a ser inserido.</span>
									</div>
									<div class="input-field col s12 m6 tooltip"> 
										<select id="status" name="status" class="obrigatorio">
											<option value="Disponivel"> Disponivel </option>
											<option value="Indisponivel"> Indisponivel </option>
											<option value="Desconhecido"> Desconhecido </option>
										</select>
										<label for="status">Status *</label>
										<span class="tooltiptext">Status que se encontra o recurso.</span>
									</div>


									<div class="input-field col s12 m5 tooltip" style=""> 
										<input type="text" id="entidade_contribuinte" name="entidade_contribuinte" data-box="entidade_contribuinte" class="obrigatorio multiply-adder" style="margin-top: 21px;">
										<label for="entidade_contribuinte">Entidades contribuintes *</label>
										<span class="tooltiptext">Entidade representa as instituções de origem dos autores e orgão de financiamento que apoiar o desenvolvimento do REA.</span>
									</div>

									<div class="col s12 m7">
										<div class="card blue lighten-4">
											<div class="card-content grey-text text-darken-4 tooltip" id="box-entidade_contribuinte">
												<p>Para adicionar as entidades que contribuiram com a criação deste recurso, preencha o campo ao lado e pressione enter.</p>
												<span class="tooltiptext">Os nome das entidades contribuintes (governamentais ou não) do recurso.</span>
											</div>
										</div>
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
								<!--
								<div class="row">
									<div class="input-field col s12 m4 tooltip"> 
										<input type="text" id="formato" name="formato" class="obrigatorio">
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
										<span class="tooltiptext">O formato do recurso (MP4, EXE, Site, etc)</span>
									</div>
									<div class="input-field col s12 m4 tooltip"> 
										<input type="number" id="tamanho" step="0.1" min="0" max="10000" name="tamanho" class="obrigatorio">
										<label for="tamanho"> Tamanho</label>
										<span class="tooltiptext">O tamanho do recurso, em megabytes</span>
									</div>
									<div class="input-field col s12 m4 tooltip"> 
										<input type="text" id="duracao" name="duracao" class="obrigatorio">
										<input type="number" id="duracao" min="0" max="1000" name="duracao" class="obrigatorio">
										<label for="duracao"> Duração</label>
										<span class="tooltiptext">A duração esperada do recurso, em minutos (exemplo: 25)</span>
									</div>
								</div>
								-->
								<div class="row">
									<div class="input-field col s12 tooltip">
										<input type="text" id="localizacao" name="localizacao" class="obrigatorio" >
										<label for="localizacao">Localização *</label>
										<span class="tooltiptext">Link para o local atual do recurso.</span>
									</div>
								</div>

								<div class="row">
									<div class="input-field col s12 m12 tooltip">
										<textarea id="requisitos_tecnologicos" name="requisitos_tecnologicos" class="materialize-textarea obrigatorio" ></textarea>
										<label for="requisitos_tecnologicos">Requisito Técnologicos</label>
										<span class="tooltiptext">As tecnologias necessárias para utilização do recurso.</span>
									</div>
								</div>

								<div class="row">
									<div class="input-field col s12 m12 tooltip">
										<textarea id="instrucoes_instalacao" name="instrucoes_instalacao" class="materialize-textarea obrigatorio" ></textarea>
										<label for="instrucoes_instalacao">Instruções de Instalação</label>
										<span class="tooltiptext">Instruções básicas de como instalar/executar o recurso.</span>
									</div>
								</div>
								<br><br><br>
								<!------------------Fim Técnica----------------------->
							</div>

							<button class="collapsible waves-effect waves-light">Informação Educacional *</button>
							<div class="content">
								<!------------------Inicio Educacional----------------------->
								<!--
								<div class="row">
									<div class="input-field col s12 m6 tooltip">
										<input type="text" id="tipo_interatividade" name="tipo_interatividade" class="obrigatorio" >
										<label for="tipo_interatividade"> Tipo de Interatividade *</label>
										<span class="tooltiptext">Como é esperado que alguém interaja com esse recurso?</span>
									</div>
									<div class="input-field col s12 m6 tooltip">
										<input type="text" id="tipo_recurso" name="tipo_recurso" class="obrigatorio" >
										<label for="tipo_recurso"> Tipo de Recurso de Aprendizagem *</label>
										<span class="tooltiptext">Qual o tipo desse recurso?</span>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m12 tooltip">
										<textarea id="descricao_educacional" name="descricao_educacional" class="materialize-textarea obrigatorio" ></textarea>
										<label for="descricao_educacional">Descrição Educacional *</label>
										<span class="tooltiptext">Uma breve descrição do valor educacional desse recurso</span>
									</div>
								</div>
								-->
								<div class="row">
									<div class="input-field col s12 m5" style=""> 
										<input type="text" id="niveis" name="niveis"  data-box="niveis" class="obrigatorio multiply-adder" maxlength="45" > 
										<label for="niveis">Niveis de Teste *</label>
									</div>

									<div class="col s12 m7">
										<div class="card blue lighten-4">
											<div class="card-content grey-text text-darken-4 tooltip" id="box-niveis">
												<p>Para adicionar niveis de teste, preencha o campo ao lado e pressione enter.</p>
												<span class="tooltiptext">Inclua os níveis de teste que são abordados pelo recurso educacional.</span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m5" style=""> 
										<input type="text" id="tecnica" name="tecnica" data-box="tecnica" class="obrigatorio multiply-adder" maxlength="45" > 
										<label for="tecnica">Técnicas de Teste *</label>
									</div>

									<div class="col s12 m7">
										<div class="card blue lighten-4">
											<div class="card-content grey-text text-darken-4 tooltip" id="box-tecnica">
												<p>Para adicionar as técnicas de teste, preencha o campo ao lado e pressione enter.</p>
												<span class="tooltiptext">Acrescente as técnicas de teste que são discutidas pelo recurso educacional. Por exemplo: teste funcional.</span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m5" style=""> 
										<input type="text" id="criterio" name="criterio" data-box="criterio" class="obrigatorio multiply-adder"  maxlength="45" > 
										<label for="criterio">Critérios de Teste *</label>
									</div>

									<div class="col s12 m7">
										<div class="card blue lighten-4">
											<div class="card-content grey-text text-darken-4 tooltip" id="box-criterio">
												<p>Para adicionar os critérios de teste, preencha o campo ao lado e pressione enter.</p>
												<span class="tooltiptext">Apresente os critérios de teste que são abordados pelo recurso educacional. Por exemplo, análise de valor limite.</span>
											</div>
										</div>
									</div>
								</div>
								<br><br><br>
								<!------------------Fim Educacional----------------------->
							</div>


							<button class="collapsible waves-effect waves-light" onclick="scrollDown()">Direitos Autorais *</button>
							<div class="content">
								<!------------------Inicio Direitos----------------------->
								<div class="row">
									<!--
									<div class="input-field col s12 m4" style="margin-top: -0.8rem;"> 

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

										<p>
									      <label>
									        <input name="custo" value="Não" type="radio" checked />
									        <span>Não</span>
									      </label>
									      <label>
									        <input name="custo" value="Sim" type="radio" />
									        <span>Sim</span>
									      </label>
									    </p>
									</div>
									-->

									<div class="input-field col s12 tooltip" style="margin-top: 19px;">
										<select id="creative_commons" name="creative_commons">
											<option value="CC BY"> CC BY </option>
											<option value="CC BY-SA"> CC BY-SA </option>
											<option value="CC BY-ND"> CC BY-ND </option>
											<option value="CC BY-NC"> CC BY-NC </option>
											<option value="CC BY-NC-SA"> CC BY-NC-SA </option>
											<option value="CC BY-NC-ND"> CC BY-NC-ND </option>
										</select>
										

										<label for="creative_commons">Creative Common *</label>
										<span class="tooltiptext">Indique o tipo de lincença.</span>

									</div>
									<!--
									<div class="input-field col s12 m4 tooltip">
										<input type="text" id="copyright" name="copyright" class="obrigatorio" >
										<label for="copyright"> Copyright *</label>
										<span class="tooltiptext">O formato de Copyright (se existir) do recurso</span>
									</div>
									-->
								</div>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<!------------------Fim Direitos----------------------->
							</div>
							
						</form>
						<div class="input-field col s3 valign-wrapper" style="float: right;width: auto;"> 
							<button class="btn waves-effect waves-light cyan darken-3" id="enviar" name="enviar">Enviar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		</main>

		<?php include(BASE_URL.'../footer.php') ?>
		<!--  Scripts-->
		<script src="<?=ROOT?>jquery/external/jquery/jquery.js"></script>
		<script src="<?=ROOT?>jquery/jquery-ui.min.js"></script>
		<script src="<?=ROOT?>js/materialize.js"></script>
		<script src="<?=ROOT?>js/material-dialog.js"></script>
		<script src="<?=ROOT?>js/init.js"></script>
		<script src="<?=ROOT?>js/scriptInserir.js"></script>

		<!-- <//?php include(BASE_URL.'../export_session.php') ?> -->
		<?php include(BASE_URL.'export_session.php') ?>
		<script type="text/javascript" src="<?=ROOT?>perfil.js"> </script>
		<script>

		//Vetor que guardará os campos multi-valorados.
		var multiplos = [];

		var aux = 0;

		$( document ).ready(function() {
	        $('html, body').animate({scrollTop:100},'0');

	        //Coloca o email do usuário como autor por padrão

	        let email = "<?php print $_SESSION['email']; ?>";

	        $('#box-autor_recurso').append('<a style="margin:0 5px 2px 0" data-box="autor_recurso" data-val="'+email+'" class="waves-effect waves-light btn-small box-button-added email_box">'+email+'</a>');

	        $('#box-autor_recurso').append('<p>Pressione enter para adicionar coautores.</p>');

	        multiplos["autor_recurso"] = []; //Inicializando o vetor multi-valorado com o vetor 'autor_recurso'
	        multiplos["autor_recurso"].push(email); //Adicionando o email do usuario ao vetor 'autor_recurso'

	        // console.log($("label[for='titulo']").parents().eq(2).prev().text());
	    });

	    function scrollDown(){
	    	$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	    }

		//https://rudmanmrrod.github.io/material-dialog/	
	    /* Exibe um modal ao invés de um alert */
		function modalAlert(mensagem, redirecionamento){
			MaterialDialog.alert(
				mensagem, // Corpo do alerta
				{
					title:'Atenção', // Titulo do modal
					buttons:{ // Botoes de recepção (Alerts utilizam apenas botoes de fechar/cancelar)
						close:{
							text:'Fechar', //Texto do btn
							className:'red', // Classe que define a cor do btn
						}
					},
					onCloseEnd: function() {
						if(redirecionamento)
							window.location.replace("<?=ROOT?>recursos/gerenciar.php"); 
					}
				}
			);
		}

		/* Exibe um modal de confirmacao */
		function modalDialog(mensagem, redirecionamento){
			MaterialDialog.dialog(
				mensagem, // Corpo do alerta
				{
					title:'Atenção',
					modalType:"modal-fixed-footer",
					onOpenStart: function(modal) {
						$(".material-dialog").height(200);
					},
					buttons:{
						close:{
							className:"red",
							text:"Ficar na pagina"
						},
						confirm:{
							className:"blue",
							text:"Sair da pagina",
							callback:function(){
								window.location.replace(redirecionamento);
							}
						}
					}
				}
			);
		}

		function sair(caminho){
			modalDialog("Você realmente deseja sair?", caminho);
		}

	    function acessarLink(caminho){
	    	var cont = 0;
	    	//Verificando somente se os input[type=text] estão preenchidos (nao conta o input email, os textarea e os selects)
		    $("input[type=text]").each(function(){
		    	if($(this).val() != ""){
		    		// console.log($(this).val());
		   	        cont++;
		        }
		    });

		    //este '2' é porque o select utiliza input quando uma opção é selecionada
		    if(cont == 2)
		    	window.location.replace(caminho);
		    else
		    	modalDialog("Você realmente deseja sair da pagina?", caminho);
	    }

		$('#test').click(function() {
		    if (!$(this).is(':checked'))
		        $(this).prop('indeterminate', true);
		});

		document.addEventListener('keypress', function (e) {
            if (e.keyCode === 13 || e.which === 13) {
                e.preventDefault();
                return false;
            }
            
        });

		function validateEmail(email) {
			var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			if (regex.test(email)) {
				return true;
			}else{
				return false;
			}
		}

		function validateLink(link) {

			var regex = /(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/;
			if (regex.test(link)) {
				return true;
			}else{
				msgAlerta = 'Insira um link válido. Ex: "www.google.com". "'+link+'" está incorreto';
				modalAlert(msgAlerta, false);
	            return false;
			}
		}
    	$('#localizacao').on('focusout', function() {
			if (! $(this).val() || $(this).val().length === 0) {
			    return;
			}
		  
		  	validateLink($(this).val());
		});

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

			$('select').formSelect();

			$('#enviar').on('click',function(e){

				var dataForm = $('#form').serializeArray();

				//Atribuindo os elementos multivalorados
				console.log(dataForm);
				
				dataForm[4]["value"]  = multiplos['chave'] ;
				dataForm[5]["value"]  = multiplos['autor_recurso'] ;
				dataForm[8]["value"]  = multiplos['entidade_contribuinte'] ;
				dataForm[12]["value"] = multiplos['niveis'] ;
				dataForm[13]["value"] = multiplos['tecnica'] ;
				dataForm[14]["value"] = multiplos['criterio'] ;

				let flag = 0;

                for (let i = 0; i < 16; i++) {
                	if(i != 10 && i != 11 && i != 15){ // excluindo os campos obrigatorios
                		if(dataForm[i].value == null || dataForm[i].value == ""){
	                		flag = 1;
	                		//$('input[name="'+dataForm[i].name+'"]').addClass('invalid');
	                		let labelText = $('label[for='+  dataForm[i].name  +']').text().replace(/ \*/g,'');
	                		let buttonTextParent = $('label[for='+  dataForm[i].name  +']').parents().eq(2).prev().text().replace(/ \*/g,'');
	                		msgAlerta = "O campo '" +labelText+ "', presente em '" + buttonTextParent + "', não está preenchido. Por favor, complete-o.";
							modalAlert(msgAlerta, false);
	                		return;
	                	}
                	}
                }

                if(flag == 0 && !validateLink(dataForm[9].value)){
					return;
				}

				if(dataForm[9].value.indexOf("http://") >= 0)
					dataForm[9].value = dataForm[9].value.replace('http://', '');

				if(dataForm[9].value.indexOf("https://") >= 0)
					dataForm[9].value = dataForm[9].value.replace('https://', '');

                if(flag == 0){
					$.ajax({
						method : 'POST',
						url    : 'server/inserir.php',
						data   : dataForm,
						dataType: "json",
					})
						.done(function(ret){
							console.log(ret);

							if(ret[0] != false){
								msgAlerta = 'O recurso foi registrado com sucesso. Aguarde que em breve entraremos em contato por e-mail para informar se o recurso foi incluído no catálogo de recursos e se há algum problema existente.';
								modalAlert(msgAlerta, true);
								// window.location.replace("<?=ROOT?>recursos/gerenciar.php");
							}else{
								msgAlerta = "O email '"+ret[1]["nao_cad_email"]+"' não está cadastrado na base de dados. Por favor, insira um que esteja cadastrado.";
								modalAlert(msgAlerta, false);
							}
						})
						.fail(function(xhr, textStatus, errorThrown) {
							console.log(textStatus);
							console.log(xhr.responseText);
							console.log(errorThrown);
							msgAlerta = "Dado enviado para revisão, contudo, temos uma observação:\nSTATUS: " + textStatus + "\nAVISO: " + errorThrown;
							modalAlert(msgAlerta, true);
							// window.location.replace("<?=ROOT?>recursos/gerenciar.php");
						})
						.always(function() {
						}); 
				}else{
					msgAlerta = "Há campos vazios. Por favor, complete todos os campos obrigatórios.";
					modalAlert(msgAlerta, false);
				}

			});
			$('#form').submit(function(e){
				e.preventDefault();
				return false;
			});
			$('form').on(
				'click','.box-button-added', function(e){

					let email = "<?php print $_SESSION['email']; ?>";

					if(email != $(this).data('val')){
						let index = multiplos[$(this).data('box')].indexOf($(this).data('val'));
						if (index > -1) {
							multiplos[$(this).data('box')].splice(index, 1);
						}
						$(this).remove();
						if(multiplos[$(this).data('box')].length == 0 || ($(this).data('box') == 'autor_recurso' && multiplos[$(this).data('box')].length == 1)){
							$('#box-'+$(this).data('box')+' p').show();
						}
					}
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
								if(!validateEmail(valor)){
									msgAlerta = 'Insira um email válido. Ex: "lucas@gmail.com". "'+valor+'" está incorreto.';
									modalAlert(msgAlerta, false);
									return;
								}
							}

							if($(this).attr('type') === 'email' && valor == multiplos[box][0]){
								modalAlert("Você já está inserido como um autor deste recurso.", false);
								return;
							}

							if(jQuery.inArray(valor, multiplos[box]) != -1){
								modalAlert("Este valor já está inserido.", false);
								return;
							}

							if(valor.trim().length === 0){
								modalAlert("Este valor é inválido. Não pode-se preencer este campo somenente com espaços em branco.", false);
								return;
							}

							if($(this).attr('type') === 'email'){
								let input_email = $(this);
								$.ajax({
									method : 'POST',
									url    : 'server/proc_email_user.php',
									data   : {"email" : valor},
									success: function(data) {
										if(data){ 
						                	$('#box-'+box+' p').hide();
											multiplos[box].push(valor);
											$('#box-'+box).append('<a style="margin:0 5px 2px 0" data-box="'+box+'" data-val="'+valor+'" class="waves-effect waves-light btn-small box-button-added email_box"><i class="material-icons left">remove_circle</i>'+valor+'</a>');
											//console.log($(this).attr('type'));
											input_email.val('');
										}else{
											modalAlert("Este usuário não está cadastrado.", false);
										}
						            } 
								});
							}else{
								//Antes removia, agora so esconde 
								$('#box-'+box+' p').hide();
								multiplos[box].push(valor);
								$('#box-'+box).append('<a style="margin:0 5px 2px 0" data-box="'+box+'" data-val="'+valor+'" class="waves-effect waves-light btn-small box-button-added"><i class="material-icons left">remove_circle</i>'+valor+'</a>');
								$(this).val('');
							}
						}
					}
				}
			})
		});
       
		</script>
	</body>
</html>