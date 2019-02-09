<?php
	include_once "defines.php";
	session_start(); // cria hash do browser ou recupera se já existente

	include(BASE_URL.'database_credentials.php');

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	try {
		$conn = new mysqli($hostname, $username, $password, $database);
		$conn->set_charset('utf8mb4');
	} catch(Exception $e) {
		error_log($e->getMessage());
		die("Nao foi possivel conectar ao banco");
	}

	$email = $_POST["email"];
	$anterior = $_POST["anterior"];
	$nova = $_POST["nova"];

	$statement = $conn->prepare("select senha from USUARIO where email=?");
	$statement->bind_param("s", $email);

	$anterior_select = null;

	try {
		$statement->execute();
		$result = $statement->get_result();

		if($result->num_rows == 0) die('Usuario nao encontrado');
		else if($result->num_rows == 1) {
			while($row = $result->fetch_assoc()) {
				$anterior_select = $row["senha"];
			}
		} else die('Algo de errado! Mais de um usuário encontrado');
		$statement->close();
	} catch(Exception $e) {
		error_log($e->getMessage());
    	die('Houve um erro');

	}

	if(!password_verify($anterior, $anterior_select)) die('Senha incorreta');

	$nova = password_hash($nova, PASSWORD_DEFAULT); // cria o hash da senha nova

	$statement = $conn->prepare("update USUARIO set senha=? where email=?");
	$statement->bind_param("ss", $nova, $email);

	try {
		$statement->execute();
		$statement->close();
		echo "Senha alterada com sucesso!";
	} catch(Exception $e) {
		error_log($e->getMessage());
		die('Houve um erro');
	}

	$conn->close();
?>