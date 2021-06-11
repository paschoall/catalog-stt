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
		<link href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css" rel="stylesheet"/>

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
			#example_filter{
				display:none!important;
			}
			main {
			    flex: 1 0 auto;
			    text-align: justify;
			}
			table#example td:nth-child(2) {
				display: block;
			}

			.tooltip {
			position: relative;
			display: inline-block;
			}

			.tooltip .tooltiptext {
			visibility: hidden;
			width: 220px;
			background-color: rgb(0, 188, 212);
			color: #fff;
			text-align: center;
			border-radius: 6px;
			padding: 10px;
			
			/* Position the tooltip */
			position: absolute;
			z-index: 1;
			top: 100%;
			left: 50%;
			margin-left: -110px;
			}

			.tooltip:hover .tooltiptext {
			visibility: visible;
			}
		</style>
	</head>
	<body>

		<!-- O logo e os links da navbar deverao ser decididos depois -->
		<?php include BASE_URL."header.php"; ?>

		<main>
			<div class="container" style="margin-top: 50px">
				<div class = "row">
					<div class = "col s9 tooltip" style=" height: 50px;"> 

						<label for="search"> Filtros: </label>
						<div class="collection" style="padding: 0px; margin: 0px;">
								<div class = "row" style="padding: 0px; margin: 0px;"> 
									<div class = "col s11"> 
										<input id="search" style="border: 0px; padding-left: 15px; margin: 0px;">
									</div>

									<!-- Colocar onclick event para botao de pesquisa aqui -->
									<div class = "col s1"> <a id="submit-filtro" class="waves-effect waves-light btn cyan right" style="margin-top: 5px;"><i class="material-icons"> search </i></a> </div>
								</div>	
							
						</div>
						<span class="tooltiptext">Pesquise por vários tipos de informação, selecionados a direita...</span>
					</div>
					<div class = "col s3 tooltip">

						<div class = "col s12" style="font-size: 12pt;">

						<label for="modo_pesquisa"> Escolha o modo de pesquisa </label>
							<select id="modo_pesquisa">
								<option style="color: grey" value="0">Por título</option>
								<option style="color: grey" value="6">Por autor</option>
								<option style="color: grey" value="5">Por palavras-chave</option>
							</select>
						</div>
						<span class="tooltiptext">Selecione o tipo de informação para pesquisar com a caixa de texto a esquerda...</span>
					</div>
				</div>
			
				<div class = "row">
					<div class = "col s9">
						<div class = "divider"> </div> 
						<!-- Aqui eh onde vai aparecer a lista de resultados -->
						<table id="example" class="display" style="width:100%; margin-top: 50px;">
							<thead>
								<tr>
									<th>Título</th>
									<th>Nível de teste</th>
									<th>Técnica de teste</th>
									<th>Critério de teste</th>
									<th>Mais</th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<tbody>
						</table>
					</div>
					<div class = "col s3">
						<div class = "divider"> </div>
						<div class = "card medium" style="margin-top: 50px;">
							<div class = "card-content" style="font-size: 13pt; font-family: 'Open Sans', sans-serif;">
								<span class = "card-title"> <h6> Filtros </h6></span>
								<form>
									<div class="row">
										<div class="input-field col s12"> 
											<select id="idioma" name="idioma">
												<option value="ALL" selected> Todos os idiomas </option>
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
										</div>
										<!-- <div class="input-field col s12"> 
											<select id="formato" name="formato">
												<option value="ALL">Todos os formatos</option>
												<option value="EXE">Executável</option>
												<optgroup label="Vídeo">
													<option value="AVI">AVI</option>
													<option value="QuickTime">QuickTime</option>
													<option value="WMV">Windows Media Video</option>
													<option value="Flash">Flash Video</option>
													<option value="MPEG-1">MPEG-1</option>
													<option value="MPEG-2">MPEG-2</option>
													<option value="MPEG-4">MPEG-4</option>
												</optgroup>
												<optgroup label="Outros">
													<option value="Site">Site</option>
												</optgroup>
											</select>
										</div> -->
									</div>
									<center>
										<a class="waves-effect waves-light btn cyan" id="limpar-filtro" style="width: 60%; position: absolute; bottom: 15px;right: 20%;">Limpar filtros</a>
									</center>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- Modal Structure -->
		<div id="show_info" class="modal">
			<div class="modal-header">
				<a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
			</div>
			<div class="modal-content">
				<div class="row">
					<div class="col s12">
						<ul class="collection" id="insert-contet">
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<?php include BASE_URL."footer.php" ?>	

		<!--  Scripts-->
		<script src="<?=ROOT?>jquery/external/jquery/jquery.js"></script>
		<script src="<?=ROOT?>jquery/jquery-ui.min.js"></script>
		<script src="<?=ROOT?>js/materialize.js"></script>
		<script src="<?=ROOT?>js/init.js"></script>
		<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
		<script src="<?=ROOT?>js/dataTables.material.min.js"></script>

		<?php include(BASE_URL.'export_session.php') ?> <!-- Incluir esse arquivo antes do outro, senao a variavel sessao nao estaria iniciada -->
		<script type="text/javascript" src="<?=ROOT?>consulta.js"> </script>
		<script>

			
			$.extend( true, $.fn.dataTable.defaults, {
				"searching": true,
				"bLengthChange": false
			} );
			$(function(){
				var $tableSel = $('#example');
				

				$('select').formSelect();
				
				$("#limpar-filtro").on('click', function(e){
					e.preventDefault();

					$('input').val("");
					$('select').prop('selectedIndex',0);
					$('select').formSelect();


				});

				$("#search").on('input', function(e){
					filtroExterno();
					$tableSel.dataTable().fnDraw();
				})
				
				$( "select" ).change(function() {
					filtroExterno();
					$tableSel.dataTable().fnDraw();
				})
				var dTable = $tableSel.DataTable({
					language: {
						sEmptyTable: "Nenhum registro encontrado",
						sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
						sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
						sInfoFiltered: "(Filtrados de _MAX_ registros)",
						sInfoPostFix: "",
						sInfoThousands: ".",
						sLengthMenu: "_MENU_ resultados por página",
						sLoadingRecords: "Carregando...",
						sProcessing: "Processando...",
						sZeroRecords: "Nenhum registro encontrado",
						sSearch: "Pesquisar",
						oPaginate: {
							sNext: "Próximo",
							sPrevious: "Anterior",
							sFirst: "Primeiro",
							sLast: "Último"
						},
						oAria: {
							sSortAscending: ": Ordenar colunas de forma ascendente",
							sSortDescending: ": Ordenar colunas de forma descendente"
						}
					},
					
					processing  : true,
					serverSide  : false,
					bServerSide : false,
					ajax        : {
						"url"    : window.root + "queries/consultar-db.php"
					},
					columns  :[
						{ "data": "TITULO" },
						{ "data": "NIVEIS" },
						{ "data": "TECNICAS" },
						{ "data": "CRITERIOS" },
						{
						"targets": 5,
						"data": null,
						"defaultContent": "<button class='select-row waves-effect waves-light btn cyan modal-trigger' href='#show_info'><i class='material-icons'>add</i></button>"
						},
						{ "data": "PALAVRAS_CHAVE" , "visible": false},
						{ "data": "AUTORES" , "visible": false},
						{ "data": "IDIOMA" , "visible": false},
						{ "data": "FORMATO", "visible": false }
					]

				});


				$('#example tbody').on( 'click', '.select-row', function () {
					var data = dTable.row( $(this).parents('tr') ).data();
					
					$.each(data, (index,el) => {
						if(index != 'ID_RECURSO'){
							console.log(typeof index)
							let label = index.replace("_", " ");
							label     = label.charAt(0).toUpperCase() + label.slice(1).toLowerCase();
							$("#insert-contet").append('<li class="collection-item"><b>'+label+': </b><span id="modal-'+index+'">'+el+'</span></li>');
						}
					})
					$('#show_info').modal();
				});


				var filtroExterno = function(){
					var filtro   = $("#search").val();
					var modo     = $("#modo_pesquisa");
					var idioma   = $("#idioma");
					var formato  = $("#formato");

					dTable.columns(parseInt(modo.val())).search(filtro).draw();
					$tableSel.dataTable().fnDraw();
				}
			});


			/**Tratamentos de filtro via js */

			
            
		</script>
	</body>
</html>