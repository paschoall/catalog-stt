<?php
/*
    ! ATENCAO: Esse script nao esta seguro contra ataques de SQL injection e XSS !
    Eh preciso corrigir depois
*/

/* Retirado de https://www.w3schools.com/php/php_mysql_select.asp */

$hostname = "localhost";
$dbname = "Catalog_STT";
$user = "lucas";
$password = "lucas123";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $conn = new mysqli($hostname, $user, $password, $dbname);
    $conn->set_charset('utf8mb4');
} catch(Exception $e) {
    error_log($e->getMessage());
    die('Nao foi possivel conectar ao banco');
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$statement = $conn->prepare("select nome from usuario where email = ? and senha = ?");
$statement->bind_param("ss", $email, $senha);

try {
    $statement->execute();
    $result = $statement->get_result();
    if($result->num_rows === 0) die('Nenhuma linha');
    while($row = $result->fetch_assoc()) {
        echo $row['nome'];
    }
} catch(Exception $e) {
    error_log($e->getMessage());
    die('Houve um erro');
}

$statement->close();
$conn->close();

?> 