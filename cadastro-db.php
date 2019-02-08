<?php
session_start(); // cria o hash do browser do usuario no servidor ou entao recupera se existente
/*
    ! ATENCAO: Esse script nao esta seguro contra ataques de SQL injection e XSS !
    Eh preciso corrigir depois
*/

/* Retirado de: https://stackoverflow.com/questions/4356289/php-random-string-generator*/
function generateRandomPassword($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/* Retirado de https://websitebeaver.com/prepared-statements-in-php-mysqli-to-prevent-sql-injection */

include('database_credentials.php');


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $conn = new mysqli($hostname, $username, $password, $database); // Create connection
    $conn->set_charset("utf8mb4");
} catch(Exception $e) {
  error_log($e->getMessage());
  exit('Error connecting to database'); //Should be a message a typical user could understand
}

// Get POST variables
$email = $_POST['email'];
$nome = $_POST['nome'];
if(isset($_POST['senha'])) $senha = $_POST['senha'];
else $senha = generateRandomString();
if(isset($_POST['cep'])) $cep = $_POST['cep'];
if(isset($_POST['data_nascimento'])) $data_nasc = $_POST['data_nascimento']; 
if(isset($_POST['rua'])) $rua = $_POST['rua'];
if(isset($_POST['bairro'])) $bairro = $_POST['bairro'];
if(isset($_POST['numero'])) $numero = $_POST['numero'];
if(isset($_POST['cidade'])) $cidade = $_POST['cidade'];
if(isset($_POST['uf'])) $uf = $_POST['uf'];
if(isset($_POST['complemento'])) $complemento = $_POST['complemento'];

$senha = password_hash($senha, PASSWORD_DEFAULT); // faz um hash da senha

if(isset($_POST['senha'])) { // cadastro realizado normalmente
    $statement = $conn->prepare(
        "insert into USUARIO(email, nome, senha, data_nasc, cep, nome_rua, bairro, numero, cidade, estado, complemento)"
        ."values(?, ?, ?, STR_TO_DATE(?, '%d/%m/%Y'), ?, ?, ?, ?, ?, ?, ?);"
    );
    $statement->bind_param("sssssssisss", $email, $nome, $senha, $data_nasc, $cep, $rua, $bairro, $numero, $cidade, $uf, $complemento);

} else { // pre-cadastro eh realizado (somente nome email e senha)
    $statement = $conn->prepare("insert into USUARIO(email, nome, senha) values(?, ?, ?);");
    $statement->bind_param("sss", $email, $nome, $senha);
}

try {
    $statement->execute();
    $statement->close();
} catch(Exception $e) {
    if($conn->errno === 1062) echo 'Duplicate entry';
    else die($e->getMessage());
}

echo "Cadastro realizado com sucesso";

$conn->close();
?> 