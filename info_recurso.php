<?php
	session_start(); // cria o hash do browser do usuario no servidor ou entao recupera se existente

	include ('database_credentials.php');
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	try {
		$conn = new mysqli($hostname, $username, $password, $database);
		$conn->set_charset('utf8mb4');
	} catch(Exception $e) {
		error_log($e->getMessage());
		die('Houve um erro ao conectar');
	}

	$req = [];
	$autores = [];
	$palavraschave = [];
	$niveis = [];
	$tecnicas = [];
	$criterios = [];
	if(isset($_GET['id'])) { // Recupera dados para mostrar na tela
		$id_recurso = $_GET['id'];

		$statement = $conn->prepare("select * from RECURSO where id_recurso = {$id_recurso}");
		try {
			$statement->execute();
			$result = $statement->get_result();
			if($result->num_rows === 0) {
				$req['TITULO'] = "Nao foi encontrado recurso";
			} else {
				while($row = $result->fetch_assoc()) {
					$req = $row;
				}
			}
			$statement->close();
		} catch(Exception $e) {
			error_log($e->getMessage());
			die('Houve um erro desconhecido');
		}

		if(count($req)) { // Achou o recurso, recupera outros dados

			// Recuperar autores
			$statement = $conn->prepare("select USUARIO.NOME as NOME, AUTOR_RECURSO.NOME as EMAIL from AUTOR_RECURSO join USUARIO on AUTOR_RECURSO.NOME = USUARIO.EMAIL where ID_RECURSO = {$id_recurso};");
			try {
				$statement->execute();
				$result = $statement->get_result();

				while($row = $result->fetch_assoc()) {
					$autores[] = $row; 
				}
				$statement->close();
			} catch(Exception $e) {
				error_log($e->getMessage());
				die('Houve um erro desconhecido');				
			}

			// Recuperar palavras chave
			$statement = $conn->prepare("select NOME from PALAVRASCHAVE where ID_RECURSO = {$id_recurso};");

			try {
				$statement->execute();
				$result = $statement->get_result();

				while($row = $result->fetch_assoc()) {
					$palavraschave[] = $row['NOME'];
				}
				$statement->close();
			} catch(Exception $e) {
				error_log($e->getMessage());
				die('Houve um erro desconhecido');
			}

			// Recuperar niveis
			$statement = $conn->prepare("select NOME from NIVEIS where ID_RECURSO = {$id_recurso};");

			try {
				$statement->execute();
				$result = $statement->get_result();

				while($row = $result->fetch_assoc()) {
					$niveis[] = $row['NOME'];
				}
				$statement->close();
			} catch(Exception $e) {
				error_log($e->getMessage());
				die('Houve um erro desconhecido');
			}

			// Recuperar tecnicas
			$statement = $conn->prepare("select NOME from TECNICA where ID_RECURSO = {$id_recurso};");

			try {
				$statement->execute();
				$result = $statement->get_result();

				while($row = $result->fetch_assoc()) {
					$tecnicas[] = $row['NOME'];
				}
				$statement->close();
			} catch(Exception $e) {
				error_log($e->getMessage());
				die('Houve um erro desconhecido');
			}

			// Recuperar criterios
			$statement = $conn->prepare("select NOME from CRITERIO where ID_RECURSO = {$id_recurso};");

			try {
				$statement->execute();
				$result = $statement->get_result();

				while($row = $result->fetch_assoc()) {
					$criterios[] = $row['NOME'];
				}
				$statement->close();
			} catch(Exception $e) {
				error_log($e->getMessage());
				die('Houve um erro desconhecido');
			}
		}
	} else {
		$req['TITULO'] = "Nao foi encontrado recurso";
	}

	$conn->close();

?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title> CATALOG-STT </title>

		<!-- CSS Materialize -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

		<!-- Jquery UI -->
		<link rel="stylesheet" href="jquery/jquery-ui.min.css">

		<style type="text/css">
			body {
				/* Inserir fonte*/
				display: flex;
			    min-height: 100vh;
				flex-direction: column;
			}

			main {
			    flex: 1 0 auto;
			    text-align: justify;
			}

			.clickable {
				cursor: pointer;
			}

			.legenda {
				max-width:70px;
			}


		</style>		
	</head>

	<body>
	
		<!-- O logo e os links da navbar deverao ser decididos depois -->
		<?php include "header.php"; ?>
		<main>
			<div class="container">
				<div class="section"><h5><?php echo $req['TITULO']?></h5></div> 
					<table class="striped" style="margin-bottom: 50px;">
						<tr> <td class="legenda"> Autor(es): </td> 
						<td><?php 
							for($i = 0; $i < count($autores); $i++)  {
								if($i) echo ", ";
								echo "{$autores[$i]['NOME']} ({$autores[$i]['EMAIL']})";
							}
						?>
						</td></tr>
						<tr> <td class="legenda"> Email do Cadastrador: </td> <td><?php echo $req['CADASTRADOR'];?></td></tr>
						<tr> <td class="legenda"> Idioma: </td> <td><?php echo $req['IDIOMA'];?></td></tr>
						<tr> <td class="legenda"> Descrição: </td> <td><?php echo $req['DESCRICAO'];?></td></tr>
						<tr> <td class="legenda"> Palavras chave: </td> 
							<td>
								<?php 
									for($i = 0; $i < count($palavraschave); $i++) {
										if($i) echo ", ";
										echo $palavraschave[$i];
									} 
								?> 
							</td> 
						</tr>
						<tr> <td class="legenda"> Niveis: </td>
							<td>
								<?php 
									for($i = 0; $i < count($niveis); $i++) {
										if($i) echo ", ";
										echo $niveis[$i];
									} 
								?> 
							</td> 
						</tr>
						<tr> <td class="legenda"> Técnicas: </td>
							<td>
								<?php 
									for($i = 0; $i < count($tecnicas); $i++) {
										if($i) echo ", ";
										echo $tecnicas[$i];
									} 
								?> 
							</td> 
						</tr>
						<tr> <td class="legenda"> Criterios: </td>
							<td>
								<?php 
									for($i = 0; $i < count($criterios); $i++) {
										if($i) echo ", ";
										echo $criterios[$i];
									} 
								?> 
							</td> 
						</tr>
						<tr> <td class="legenda"> Localização: </td> <td><a rel='external' href="<?php echo $req['LOCALIZACAO'];?>"> <?php echo $req['LOCALIZACAO'];?></a></td></tr>
						<tr> <td class="legenda"> Repositório: </td> <td><?php echo $req['REPOSITORIO'];?></td></tr>
						<tr> <td class="legenda"> Versão: </td> <td><?php echo $req['VERSAO'];?></td></tr>
						<tr> <td class="legenda"> Status: </td> <td><?php echo $req['STATUS'];?></td></tr>
						<tr> <td class="legenda"> Entidade Contribuinte: </td> <td><?php echo $req['ENTIDADE_CONTRIBUINTE'];?></td></tr>
						<tr> <td class="legenda"> Formato: </td> <td><?php echo $req['FORMATO'];?></td></tr>
						<tr> <td class="legenda"> Tamanho: </td> <td><?php echo $req['TAMANHO']." MB";?></td></tr>
						<tr> <td class="legenda"> Requisitos Tecnológicos: </td> <td><?php echo $req['REQUISITOS_TECNOLOGICOS'];?></td></tr>
						<tr> <td class="legenda"> Instruções Instalação: </td> <td><?php echo $req['INSTRUCOES_INSTALACAO'];?></td></tr>
						<tr> <td class="legenda"> Duração: </td> <td><?php echo $req['DURACAO'] == NULL? "-" : $req['DURACAO'];?></td></tr>
						<tr> <td class="legenda"> Tipo de Interatividade: </td> <td><?php echo $req['TIPO_INTERATIVIDADE'];?></td></tr>
						<tr> <td class="legenda"> Tipo de Recurso: </td> <td><?php echo $req['TIPO_RECURSO'];?></td></tr>
						<tr> <td class="legenda"> Descricao Educacional: </td> <td><?php echo $req['DESCRICAO_EDUCACIONAL'];?></td></tr>
						<tr> <td class="legenda"> Custo: </td> <td><?php echo $req['CUSTO']. ' R$'?></td></tr>
						<tr> <td class="legenda"> Creative Commons: </td> <td><?php echo $req['CREATIVE_COMMONS'];?></td></tr>
						<tr> <td class="legenda"> Copyright: </td> <td><?php echo $req['COPYRIGHT'];?></td></tr>
						<tr> <td class="legenda"> Adicionado em: </td> <td><?php echo $req['DATA_AD'];?></td></tr>
					</table>
			</div>
		</main>
		<?php include "footer.php" ?>

		<!-- Scripts -->
		<script src="jquery/external/jquery/jquery.js"></script>
		<script src="jquery/jquery-ui.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/init.js"></script>

		<?php include('export_session.php') ?> <!-- Incluir esse arquivo antes do outro, senao a variavel sessao nao estaria iniciada -->
		<script type="text/javascript"> 
			$(function() {
				if(window.sessao == null) {
					$("#bem_vindo").hide();
					$("#perfil").hide();
				} else {
					$("#bem_vindo").html("Bem vindo, " + window.sessao["nome"] + "&nbsp;&nbsp;&nbsp;");
					$("#entrar").hide();
					$("#cadastrar").hide();
				}


			})
		</script>
	</body>

</html>