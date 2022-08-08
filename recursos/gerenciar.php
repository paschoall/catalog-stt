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

			/* Tooltip container */
			.tooltip {
				position: relative;
				display: inline-block;
			}

			/* Tooltip text */
			.tooltip .tooltiptext {
				visibility: hidden;
				width: 200px;
				background-color: rgb(0, 188, 212);
				color: #fff;
				text-align: center;
				padding: 10px;
				border-radius: 6px;

				/* Position the tooltip text */
				position: absolute;
				z-index: 1;
				bottom: 100%;
				left: 50%;
				margin-left: -100px;

				/* Fade in tooltip */
				opacity: 0;
				transition: opacity 0.3s;
			}

			/* Tooltip arrow */
			.tooltip .tooltiptext::after {
				content: " ";
				position: absolute;
				top: 100%; /* At the bottom of the tooltip */
  				left: 50%;
				margin-left: -5px;
				border-width: 5px;
				border-style: solid;
				border-color: rgb(0, 188, 212) transparent transparent transparent;
			}

			/* Show the tooltip text when you mouse over the tooltip container */
			.tooltip:hover .tooltiptext {
				visibility: visible;
				opacity: 1;
			}
		</style>
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
						<a href="<?=ROOT?>recursos/inserir.php" class="sidebar collection-item ">
							Adicionar Recursos
						</a>
						<a href="<?=ROOT?>recursos/gerenciar.php" class="sidebar collection-item active">
							Meus Recursos
						</a>
						<a href="<?=ROOT?>perfil.php" class="sidebar collection-item">
							Meus Dados
						</a>
						<a href="#" onclick="sair('<?=ROOT?>logout.php');" class="sidebar collection-item">
							Sair <i id="sair_icon" class="material-icons right"> reply_all </i>
						</a>
					</div>
				</div>
				<div class="col s9">
					<p style="color:gray;">Pesquisar</p>
				</div>
				<div class="col s9 tooltip">
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
                        </tbody>
					</table>
					<span class="tooltiptext">Faça uma pesquisa aqui!</span>
				</div>
			</div>
		</div>
		</main>
        <!-- Modal Structure -->
        <div id="show_info" class="modal">
			<div class="modal-header">
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
            <div class="modal-footer">
            </div>
        </div>
		<?php include(BASE_URL.'../footer.php') ?>
		<!--  Scripts-->
		<script src="<?=ROOT?>jquery/external/jquery/jquery.js"></script>
		<script src="<?=ROOT?>jquery/jquery-ui.min.js"></script>
		<script src="<?=ROOT?>js/materialize.js"></script>
		<script src="<?=ROOT?>js/init.js"></script>
		<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
		<script src="<?=ROOT?>js/dataTables.material.min.js"></script>
		<script src="<?=ROOT?>js/materialize.js"></script>
		<script src="<?=ROOT?>js/material-dialog.js"></script>

		<!-- <//?php include(BASE_URL.'../export_session.php') ?> -->
		<?php include(BASE_URL.'export_session.php') ?>
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
                sSearch: " ",
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
                "url"    : window.root +"recursos/server/consultar-db.php"
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
                { "data": "IDIOMA" , "visible": false}
            ]

        });


        $('#example tbody').on( 'click', '.select-row', function () {
            var data = dTable.row( $(this).parents('tr') ).data();
            
            $.each(data, (index,el) => {
                if(index != 'ID_RECURSO'){
                    console.log(typeof index)
                    let label = index.replace("_", " ");
                    label     = label.charAt(0).toUpperCase() + label.slice(1).toLowerCase();
                    if(label == 'Localizacao')
						$("#insert-contet").append('<li class="collection-item"><b>'+label+': </b><span id="modal-'+index+'"><a href="http://'+el+'" target="_blank">'+el+'</a></span></li>');
					else
						$("#insert-contet").append('<li class="collection-item"><b>'+label+': </b><span id="modal-'+index+'">'+el+'</span></li>');
                }
            })
			$("#insert-contet").append('<a href="http://'+ data.LOCALIZACAO +'" class="modal-open waves-effect waves-green btn-flat" id="butao" target="_blank" style="margin:10px;margin-left:40%;background-color:#00bcd4;color:white;">Acessar recurso</a>')
			$("#insert-contet").append('<br><hr><br>');
			console.log(JSON.stringify(data, null, 4));
            $('#show_info').modal();
        });
	});

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


/**Tratamentos de filtro via js */



</script>
	</body>
</html>