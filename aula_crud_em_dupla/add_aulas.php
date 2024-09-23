<?php 
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_materia = $_POST['nome_materia'];
    $sala_aula = $_POST['sala_aula'];

    $sql = "INSERT INTO aula (nome_materia,sala_aula) VALUES ('$nome_materia','$sala_aula')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo registro de aula criado com sucesso!";
    } else {
        echo "Erro: ". $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aulas</title>
</head>
<body>
    <h1> Adicionar Aulas </h2>
    <form method='post' action='add_aulas.php'>
        Nome da Materia: <input type="text" name='nome_materia' required>
        Sala de Aula:  <input type="text" name='sala_aula' required>
        <input type="submit" value="Adicionar">
    </form>

    <a href="index.php">Ver o Diário.</a>
</body>
</html>