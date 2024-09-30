<?php

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fk_professor = $_POST['nome_professor'];
    $fk_aula = $_POST['nome_aula'];
    $duracao_aula = $_POST['duracao_aula'];

    $sql = "UPDATE user SET nome_aula = '$fk_aula', fk_professor = '$nome_professor', duracao_aula = '$duracao_aula'";
    if ($conn->query($sql) === TRUE) {
        echo "Atualização realidada com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE do Diário</title>
</head>

<body>
    <h2>Alterar professor</h2>
    <form method="POST" action="update.php">
        <label>Novo nome: </label>
        <input type="text" name="nome_professor" required>
    </form>
    <h2>Alterar aula</h2>
    <form method="POST" action="update.php">
        <label>Nova aula: </label>
        <input type="text" name="nome_aula" required>
    </form>
    <h2>Alterar Duração da Aula</h2>
    <form method="POST" action="update.php">
        <label>Nova Duração: </label>
        <input type="text" name="duracao_aula" required>
    </form>
    <button type="submit" name="adicionar_aula_historico"> Atualizar </button>
</body>

</html>
