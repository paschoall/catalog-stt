<?php
	session_start();

	if($_SESSION['admin'] == "0") exit; // Nao pode acessar esta pagina
	$id = $_POST['id_recurso'];

	include('database_credentials.php');

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	try {
		$conn = new mysqli($hostname, $username, $password, $database);
		$conn->set_charset("utf8mb4");
	} catch(Exception $e) {
		error_log($e->getMessage());
		die('Houve um erro ao conectar');
	}

	$statement = $conn->prepare("update RECURSO set APROVADO = 1 where ID_RECURSO = ?");
	$statement->bind_param('i', $id);

	try {
		$statement->execute();
		$statement->close();
		echo "success";
	} catch(Exception $e) {
		die($e->getMessage());
	}
	$conn->close();
?>