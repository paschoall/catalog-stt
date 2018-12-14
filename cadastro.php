<?php
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

/* Retirado de https://www.w3schools.com/php/php_mysql_select.asp */

$servername = "localhost";
$username = "lucas";
$password = "lucas123";
$dbname = "Catalog_STT";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST variables
$email = $_POST['email'];
$nome = $_POST['nome'];
if(isset($_POST['senha'])) $senha = $_POST['senha'];
else $senha = generateRandomString();
if(isset($_POST['cep'])) $cep = $_POST['cep'];
if(isset($_POST['data_nascimento'])) {
    /* Retirado de: https://stackoverflow.com/questions/5201383/how-to-convert-a-string-to-date-in-mysql */
    $data_nasc = "STR_TO_DATE('" . $_POST['data_nascimento'] . "', '%d/%m/%Y')"; 
}
if(isset($_POST['rua'])) $rua = $_POST['rua'];
if(isset($_POST['bairro'])) $bairro = $_POST['bairro'];
if(isset($_POST['numero'])) $numero = $_POST['numero'];
if(isset($_POST['cidade'])) $cidade = $_POST['cidade'];
if(isset($_POST['uf'])) $uf = $_POST['uf'];
if(isset($_POST['complemento'])) $complemento = $_POST['complemento'];

if(isset($_POST['senha'])) { // cadastro realizado normalmente
    $sql = "insert into usuario(email, nome, senha, data_nasc, cep, nome_rua, bairro, numero, cidade, estado, complemento) values(" .
        "'". $email . "'" . ",".
        "'". $nome . "'" . ",".
        "'". $senha . "'" . ",".
        $data_nasc . "," . //numero nao precisa por entre aspas
        "'". $cep . "'" . ",".
        "'". $rua . "'" . ",".
        "'". $bairro . "'" . ",".
        $numero . "," . //numero nao precisa por entre aspas
        "'". $cidade . "'" . "," .
        "'". $uf . "'" . "," .
        "'". $complemento . "'" .
        ")";
} else { // pre-cadastro eh realizado (somente nome email e senha)
    $sql = "insert into usuario(email, nome, senha) values(" .
        "'". $email . "'" . ",".
        "'". $nome . "'" . ",".
        "'". $senha . "'" .
        ")";
}

$result = $conn->query($sql);
if($result == null) {
    die($conn->error);
}

echo "Cadastro realizado com sucesso";

$conn->close();
?> 