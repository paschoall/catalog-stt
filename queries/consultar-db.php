<?php
	include_once "../database_credentials.php";
	include_once "../defines.php";


	// you're developing, so you want all errors to be shown
	
	error_reporting(E_ALL);
ini_set('display_errors', 'on');

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
	function get_niveis($conn, $id) {
		$answer = [];
		$statement = $conn->prepare("SELECT NIVEIS.NOME AS NOME FROM NIVEIS WHERE ID_RECURSO={$id}");
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
	function get_tecnicas($conn, $id) {
		$answer = [];
		$statement = $conn->prepare("SELECT TECNICA.NOME AS NOME FROM TECNICA WHERE ID_RECURSO={$id}");
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
	function get_chaves($conn, $id) {
		$answer = [];
		$statement = $conn->prepare("SELECT PALAVRASCHAVE.NOME AS NOME FROM PALAVRASCHAVE WHERE ID_RECURSO={$id}");
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
	function get_criterios($conn, $id) {
		$answer = [];
		$statement = $conn->prepare("SELECT CRITERIO.NOME AS NOME FROM CRITERIO WHERE ID_RECURSO={$id}");
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


	try {
		$conn = new mysqli($hostname, $username, $password, $database);
		$conn->set_charset("utf8mb4");
	} catch(Exception $e) {
		error_log($e->getMessage());
		exit('Error connecting to the database');
	}


	$statement = $conn->prepare("SELECT * FROM RECURSO");

	try {
		$statement->execute();
		$result = $statement->get_result();

		$answer =array();
		while($row = $result->fetch_assoc()) {
			$save =  $row;
			$save["NIVEIS"] = implode(', ', get_niveis($conn, $row["ID_RECURSO"]));
			$save["TECNICAS"] = implode(', ', get_tecnicas($conn, $row["ID_RECURSO"]));
			$save["PALAVRAS_CHAVE"] = implode(', ', get_chaves($conn, $row["ID_RECURSO"]));
			$save["AUTORES"] = implode(', ', get_autores($conn, $row["ID_RECURSO"]));
			$save["CRITERIOS"] = implode(', ', get_criterios($conn, $row["ID_RECURSO"]));
			unset($save["APROVADO"]);
			unset($save["DATA_AD"]);
			unset($save["CADASTRADOR"]);
			
			$answer[] = $save;
		}
		$retorno = array();
		$retorno["draw"] = 1;
		$retorno["recordsTotal"] = 2;
		$retorno["recordsFiltered"] = 2;	
		$retorno["data"] = $answer;

		echo json_encode($retorno, JSON_UNESCAPED_UNICODE);
		$statement->close();
	} catch(Exception $e) {
		echo $e->getMessage();
    	die('Houve um erro');
	}

	$conn->close();

?>