<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "crud_dupla_isabela_lorenzo";

$conn = new mysqli($servername,$username,$password,$dbname);

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO: ERRMODE_EXCEPTION);
} catch {
    echo "Connection Lost: ". $e->getMessage();
}
?>