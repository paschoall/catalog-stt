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

		<!-- Materialize icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
			    font-size: 16pt;
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
		<?php include BASE_URL."header.php"; ?>

		<main>
			<div class="container" style="margin-top: 50px">
				<div class="section">
					<h4> Bem vindo ao Catalog-STT! </h4> 
				</div>
				<div class="divider"> </div>
				<div class="section">
					<p> O Catalog-STT - acrônimo para <i> A Catalog of Open Educational Resources to Support Software Testing Teaching </i> - é um sistema criado por um grupo de pesquisa do ICMC-USP com o objetivo de facilitar o registro e a consulta de recursos educacionais abertos no domínio de teste de software. Dessa forma, o Catalog-STT nada mais é do que um lugar para reunir links para materiais didáticos sobre teste de software. Se você deseja explorar ou procurar um material didático - seja vídeo, apostila ou qualquer tipo de recurso educacional, faça uma <a href="<?=ROOT?>consulta.php"> consulta. </a> </p>
					<p>Contribuições para o sistema funcionam de uma forma bem prática: após criar uma conta, você pode acessar a página "<a href="<?=ROOT?>/recursos/inserir.php">Adicionar recursos</a>" e preencher as informações do recurso educacional que você deseja adicionar na nossa base de dados. Não se preocupe com nenhum arquivo: o Catalog-STT só trabalha com referências e links para o recurso (NÃO é necessário fazer upload de qualquer coisa). Após enviado o recurso, aguarde até que um administrador verifique e aprove o recurso que o mesmo aparecerá na nossa base para todos acessarem.</p>
					<p>Seguem alguns exemplos de recursos salvos no sistema:</p>
				</div>

			</div>
			<div class="container" style="margin-top: 50px">
				<div class = "row text-center">
					<div class = "col-fluid">
						<div class = "divider"> </div> 
						<!-- Aqui eh onde vai aparecer a lista de resultados -->
						<table id="example" class="display" style="width:100%; margin-top: 50px;">
							<thead>
								<tr>
									<th>Título</th>
									<th>Nível de teste</th>
									<th>Técnica de teste</th>
									<th>Critério de teste</th>
									<th></th>
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

		<?php include(BASE_URL."export_session.php") ?> <!-- Incluir esse arquivo antes do outro, senao a variavel sessao nao estaria iniciada -->
		<script type="text/javascript" src="<?=ROOT?>index.js"> </script>
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
						"defaultContent": ""
						},
						{ "data": "PALAVRAS_CHAVE" , "visible": false},
						{ "data": "AUTORES" , "visible": false},
						{ "data": "IDIOMA" , "visible": false},
						{ "data": "FORMATO", "visible": false }
					]

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