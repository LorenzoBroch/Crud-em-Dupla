<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_dupla_isabela_lorenzo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>