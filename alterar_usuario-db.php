<?php
	include_once "defines.php";
	session_start();

	include(BASE_URL.'database_credentials.php');

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	try {
		$conn = new mysqli($hostname, $username, $password, $database);
		$conn->set_charset('utf8mb4');
	} catch(Exception $e) {
		error_log($e.getMessage());
		die("Houve um erro ao conectar ao banco");
	}

	$email = $_POST["email"];
	$data_nasc = $_POST["data_nasc"];
	$cep = $_POST["cep"];
	$estado = $_POST["estado"];
	$cidade = $_POST["cidade"];
	$bairro = $_POST["bairro"];
	$rua = $_POST["rua"];
	$numero = $_POST["numero"];
	$complemento = $_POST["complemento"];


	$statement = $conn->prepare("update USUARIO set data_nasc=STR_TO_DATE(?, '%d/%m/%Y'), cep=?, nome_rua=?, bairro=?, cidade=?, estado=?, numero=?, complemento=? where email=?");
	$statement->bind_param("ssssssiss", $data_nasc, $cep, $nome_rua, $bairro, $cidade, $estado, $numero, $complemento, $email);
	try {
		$statement->execute();
		$statement->close();
		echo("Alteracoes realizadas com sucesso");
	} catch(Exception $e) {
		die($e->getMessage());
	}

	$conn->close();
?>