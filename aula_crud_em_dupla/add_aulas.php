<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar aulas</title>
</head>
<body>
    <h1> Adicionar aulas </h2>
    <form method='post' action='add_aulas.php'>
        <label for="nome_aula">Nome da aula (matéria a que se refere):</label>
        <br>
        <input type="text" name='nome_aula' required>
        <br>

        <label for="numero_sala">Número da sala:</label>
        <br>
        <input type="number" name='numero_sala' required>
        <br>

        <label for="horario_aula">Horário padrão de início da aula:</label>
        <br>
        <input type="time" name='horario_aula' required>
        <br>

        <button type="submit">
            Adicionar
        </button>
        <br>
    </form>

    <a href="index.php">Ver histórico de aulas</a>
</body>
</html>

<?php 
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_aula = $_POST['nome_aula'];
    $numero_sala = $_POST['numero_sala'];
    $horario_aula = $_POST['horario_aula'];

    $sql = "INSERT INTO aula (nome_aula, numero_sala, horario_aula) VALUES ('$nome_aula', '$numero_sala', '$horario_aula')";

    if ($conn -> query($sql) === TRUE) {
        echo "Novo registro de aula criado com sucesso.";
    } else {
        echo "Erro: ". $sql . "<br>" . $conn->error;
    }
}

$conn -> close();

?>