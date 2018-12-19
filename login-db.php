<?php
session_start(); // cria o hash do browser do usuario no servidor ou entao recupera se existente
/*
    ! ATENCAO: Esse script nao esta seguro contra ataques de SQL injection e XSS !
    Eh preciso corrigir depois
*/

/* Retirado de https://www.w3schools.com/php/php_mysql_select.asp */

include('database_credentials.php')

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $conn = new mysqli($hostname, $username, $password, $database);
    $conn->set_charset('utf8mb4');
} catch(Exception $e) {
    error_log($e->getMessage());
    die('Nao foi possivel conectar ao banco');
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$statement = $conn->prepare("select email, nome, data_nasc, cep, nome_rua, bairro, numero, cidade, estado, pais, complemento, admin from usuario where email = ? and senha = ?");
$statement->bind_param("ss", $email, $senha);

try {
    $statement->execute();
    $result = $statement->get_result();
    if($result->num_rows === 0) die('Nenhuma linha');
    if($result->num_rows > 1) die("Algo de errado! Mais de um usuário foi encontrado!");
    while($row = $result->fetch_assoc()) {

        // Seta as variaveis de sessao
        $_SESSION['email'] = $row['email'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['data_nasc'] = $row['data_nasc'];
        $_SESSION['cep'] = $row['cep'];
        $_SESSION['nome_rua'] = $row['nome_rua'];
        $_SESSION['bairro'] = $row['bairro'];
        $_SESSION['numero'] = $row['numero'];
        $_SESSION['cidade'] = $row['cidade'];
        $_SESSION['estado'] = $row['estado'];
        $_SESSION['pais'] = $row['pais'];
        $_SESSION['complemento'] = $row['complemento'];
        $_SESSION['admin'] = $row['admin'];

        echo $row['data_nasc'];
    }
} catch(Exception $e) {
    error_log($e->getMessage());
    die('Houve um erro');
}

$statement->close();
$conn->close();

?> 