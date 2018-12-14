<?php
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

$sql = "select * from usuario";

$result = $conn->query($sql);
if($result == null) {
    die($conn->error);
}

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["nome"]. " - Email " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?> 