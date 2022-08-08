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
			/*table#example td:nth-child(2) {
				display: block;
			}*/

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

			.content:before, .content:after{
			    content: none!important;
			}
		</style>
	</head>
	<body>

		<!-- O logo e os links da navbar deverao ser decididos depois -->
		<?php include BASE_URL."header.php"; ?>

		<main>
			<div class="container" style="margin-top: 50px">
				<div class = "row">
					<div class = "col s3 tooltip">

						<div class = "col s12" style="font-size: 12pt;">

						<label for="modo_pesquisa"> Escolha o modo de pesquisa </label>
							<select id="modo_pesquisa">
								<option style="color: grey" value="0">Por título</option>
								<!-- <option style="color: grey" value="6">Por autor</option> -->
								<option style="color: grey" value="5">Por palavras-chave</option>
							</select>
						</div>
						<span class="tooltiptext">Selecione o modo de busca, indicando se deseja fazer a busca de recursos educacionais por título ou palavras-chave usadas para descrevê-los</span>
					</div>

					<div class = "col s9" style=" height: 50px;"> 

						<label for="search"> Pesquisar </label>
						<div class="collection" style="padding: 0px; margin: 0px;">
								<div class = "row" style="padding: 0px; margin: 0px;"> 
									<div class = "col s11"> 
										<input id="search" style="border: 0px; padding-left: 15px; margin: 0px;">
									</div>

									<!-- Colocar onclick event para botao de pesquisa aqui -->
									<div class = "col s1"> <a id="submit-filtro" class="waves-effect waves-light btn cyan right" style="margin-top: 5px;"><i class="material-icons"> search </i></a> </div>
								</div>	
							
						</div>
						<!-- <span class="tooltiptext">Busque por recursos educacionais registrados no sistema</span> -->
					</div>
				</div>
				<div class = "divider" style="margin: 25px 13px -11px 13px;"> </div> 
				<div class = "row">
					<div class = "col s9">
						<!-- <div class = "divider"> </div> -->
						<!-- Aqui eh onde vai aparecer a lista de resultados -->
						<table id="example" class="display" style="width:100%; margin-top: 50px;">
							<thead>
								<tr>
									<th style="width: 81px;">Título</th>
									<!-- <th style="width: 152px;">Palavras-chave</th> -->
									<th style="width: 138px;">Nível de teste</th>
									<th style="width: 166px;">Técnica de teste</th>
									<th style="width: 161px;">Critério de teste</th>
									<th class="content" style="width: 88px;">Mais informações</th>
								</tr>
							</thead>
							<tbody>
							<tbody>
						</table>
					</div>
					<div class = "col s3">
						<!-- <div class = "divider"> </div> -->
						<div class = "card medium" style="margin-top: 50px;">
							<div class = "card-content" style="font-size: 13pt; font-family: 'Open Sans', sans-serif;">
								<span class = "card-title"> <h6> Filtros </h6></span>
								<form>
									<div class="row">
										<div class="input-field col s12 tooltip"> 
											<!--<select id="idioma" name="idioma" multiple>
												<option value="ALL" selected> Todos os idiomas </option>
												
												<option value="AF"> Afrikanns (AF) </option> 
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
												<option value="XH"> Xhosa (XH) </option>

												// O leo tinha pedido somente esses idiomas
												// Caso precise, descomente estes abaixo e comente
												// Os de cima

												<option value="BR"> Português (BR)</option>
												<option value="EN"> Inglês (EN) </option>
												<option value="ES"> Espanhol (ES) </option>

											</select> -->
											<p>
										      <label>
										        <input type="checkbox" checked="checked" value="BR" />
										        <span>Português (BR)</span>
										      </label>
										    </p>
										    <br>
										    <p>
										      <label>
										        <input type="checkbox" checked="checked" value="EN"/>
										        <span>Inglês (EN) </span>
										      </label>
										    </p>
										    <br>
										    <p>
										      <label>
										        <input type="checkbox" checked="checked" value="ES"/>
										        <span>Espanhol (ES) </span>
										      </label>
										    </p>
										    <br>
											<span class="tooltiptext">Para resultados mais precisos, use filtro para o sistema apresentar recursos educacionais que estão em um idioma específico ou em mais de um idioma</span>
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
									<!-- <center> 
										<a class="waves-effect waves-light btn cyan" id="limpar-filtro" style="width: 60%; position: absolute; bottom: 15px;right: 20%;">Aplicar filtros</a>
									</center>
									-->
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
				<h6 style="float:left; margin-left: 5%; margin-top: 3%;">Mais informações deste recurso.</h6>
				<a href="#!" class="modal-close waves-effect waves-green btn-flat" style="background-color:red;color:white;margin:10px;margin-right: 5%;float: right;" onclick="limpar_modal();">X</a>
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

			function limpar_modal() {
			    $('#show_info ul').empty();
			}

			$(document).on('focusout', $('#show_info').focus(), function (e) {
			    setTimeout(function(){
			        var focus=$(document.activeElement);
			        if (focus.is("#show_info") || $('#show_info').has(focus).length) {
			        } else {
			            limpar_modal();
			            //document.location.reload(true);
			        }
			    },0);
			});

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
				
				$( "input[type=checkbox]" ).change(function() {
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
						"defaultContent": "<button class='select-row waves-effect waves-light btn cyan modal-trigger' href='#show_info' style='margin-left: 30px;'><i class='material-icons'>add</i></button>"
						},
						{ "data": "PALAVRAS_CHAVE" , "visible": false},
						{ "data": "AUTORES" , "visible": false},
						{ "data": "IDIOMA" , "visible": false}
					]
				}); //no lugar do primeiro 'PALAVRAS-CHAVE' eh 'NIVEIS'


				$('#example tbody').on( 'click', '.select-row', function () {
					var data = dTable.row( $(this).parents('tr') ).data();
					
					$.each(data, (index,el) => {
						if(index != 'ID_RECURSO'){
							console.log(typeof index)
							let label = index.replace("_", " ");
							label     = label.charAt(0).toUpperCase() + label.slice(1).toLowerCase();
							// alert(label)
							if(label == 'Localizacao')
								$("#insert-contet").append('<li class="collection-item"><b>'+label+': </b><span id="modal-'+index+'"><a href="http://'+el+'" target="_blank">'+el+'</a></span></li>');
							else
								$("#insert-contet").append('<li class="collection-item"><b>'+label+': </b><span id="modal-'+index+'">'+el+'</span></li>');
						}
					})
					// let link = document.getElementById('modal-LOCALIZACAO').value;
					// let link2 = $( "modal-LOCALIZACAO" ).text();
					$("#insert-contet").append('<a href="http://'+ data.LOCALIZACAO +'" class="modal-open waves-effect waves-green btn-flat" id="butao" target="_blank" style="margin:10px;margin-left:40%;background-color:#00bcd4;color:white;">Acessar recurso</a>')
					$("#insert-contet").append('<br><hr><br>');
					$('#show_info').modal();
					flag = 1;
				});


				var filtroExterno = function(){
					var filtro   = $("#search").val();
					var modo     = $("#modo_pesquisa");
					// var idioma   = $("#idioma");
					var idiomas  = "";

					$("input:checkbox[type=checkbox]:checked").each(function(){
					    idiomas += ($(this).val() + "|");
					});

					var idiomaPesquisa = idiomas.substring(0, idiomas.length - 1);

					// alert(idiomaPesquisa)
					dTable.columns(7).search(idiomaPesquisa, true).columns(parseInt(modo.val())).search(filtro).draw();

					// if(idioma.val() != "ALL"){
					// 	//alert(idioma.val());
					// 	dTable.columns(7).search(idiomas, true).columns(parseInt(modo.val())).search(filtro).draw();
					// 	// dTable.columns(7).search(idioma.val()).columns(parseInt(modo.val())).search(filtro).draw();
					// }else{
					// 	dTable.columns().search("").columns(parseInt(modo.val())).search(filtro).draw();
					// }
					

					$tableSel.dataTable().fnDraw(); 
				}
			});


			/**Tratamentos de filtro via js */
		</script>
	</body>
</html>