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

			main {
			    flex: 1 0 auto;
			    text-align: justify;
			}

		</style>
	</head>
	<body>

		<!-- O logo e os links da navbar deverao ser decididos depois -->
		<?php include BASE_URL."header.php"; ?>

		<main>
			<div class="container" style="margin-top: 50px">
				<div class = "row">
					<div class = "col s9" style=" height: 50px;"> 

					<label for="search"> Escolha o modo de pesquisa </label>
						<div class="collection" style="padding: 0px; margin: 0px;">
								<div class = "row" style="padding: 0px; margin: 0px;"> 
									<div class = "col s11"> <input id="search" style="border: 0px; padding-left: 15px; margin: 0px;"></div>

									<!-- Colocar onclick event para botao de pesquisa aqui -->
									<div class = "col s1"> <a class="btn-flat right" style="margin-top: 5px;"><i class="material-icons"> search </i></a> </div>
								</div>	
							
						</div>
					</div>
					<div class = "col s3">

						<div class = "col s12" style="font-size: 12pt;">

						<label for="modo_pesquisa"> Escolha o modo de pesquisa </label>
							<select id="modo_pesquisa">
								<option style="color: grey" value="1">Por título</option>
								<option style="color: grey" value="2">Por autor</option>
								<option style="color: grey" value="3">Por palavras-chave</option>
							</select>
						</div>
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
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Tiger Nixon</td>
									<td>System Architect</td>
									<td>Edinburgh</td>
									<td>61</td>
								</tr>
								<tr>
									<td>Garrett Winters</td>
									<td>Accountant</td>
									<td>Tokyo</td>
									<td>63</td>
								</tr>
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
										</div>
										<div class="input-field col s12"> 
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
										</div>
									</div>
									<center>
										<a class="waves-effect waves-light btn cyan" style="width: 60%; position: absolute; bottom: 15px;right: 20%;">Limpar filtros</a>
									</center>
								</form>
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
		<script src="<?=ROOT?>js/init.js"></script>
		<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
		<script src="<?=ROOT?>js/dataTables.material.min.js"></script>

		<?php include(BASE_URL.'export_session.php') ?> <!-- Incluir esse arquivo antes do outro, senao a variavel sessao nao estaria iniciada -->
		<script type="text/javascript" src="<?=ROOT?>consulta.js"> </script>
		<script>
			$.extend( true, $.fn.dataTable.defaults, {
				"searching": false,
				"bLengthChange": false
			} );
			$(function(){
				$('select').formSelect();
				
				$(document).ready(function() {
				$('#example').DataTable( {
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
					processing: true,
					serverSide: false,
					ajax:window.root + "queries/consultar-db.php",

					columnDefs: [
						{
							targets: [ 0, 1, 2 ],
							className: 'mdl-data-table__cell--non-numeric'
						}
					]
					} );
				} );
			});
		</script>
	</body>
</html>