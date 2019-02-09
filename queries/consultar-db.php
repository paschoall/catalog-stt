<?php
	include_once "../defines.php";
	function get_autores($conn, $id) {
		$answer = [];
		$statement = $conn->prepare("SELECT USUARIO.NOME AS NOME FROM AUTOR_RECURSO JOIN USUARIO ON AUTOR_RECURSO.NOME = USUARIO.EMAIL WHERE AUTOR_RECURSO.ID_RECURSO = {$id}");
		try {
			$statement->execute();
			$result = $statement->get_result();
			while($row = $result->fetch_assoc()) {
				$answer[] = $row["NOME"];
			}
			$statement->close();
		} catch(Exception $e) {
			error_log("On id = {$id}: " + $e->getMessage());
		}

		return $answer;
	}
	// Script que simplesmente consulta todos os recursos existentes 
	session_start();

	include(BASE_URL.'database_credentials.php');

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	try {
		$conn = new mysqli($hostname, $username, $password, $database);
		$conn->set_charset("utf8mb4");
	} catch(Exception $e) {
		error_log($e->getMessage());
		exit('Error connecting to the database');
	}


	$statement = $conn->prepare("SELECT * FROM RECURSO LIMIT 20");

	try {
		$statement->execute();
		$result = $statement->get_result();

		$answer = [];
		while($row = $result->fetch_assoc()) {
			$row["AUTORES"] = get_autores($conn, $row["ID_RECURSO"]);
			$answer[] = $row;
		}
		
		echo json_encode($answer);
		$statement->close();
	} catch(Exception $e) {
		error_log($e->getMessage());
    	die('Houve um erro');
	}

	$conn->close();

?>