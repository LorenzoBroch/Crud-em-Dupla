<?php

    include 'db_connect.php';

    $id_atualizar_aula = $_GET['id_atualizar_aula'];

    $sql_aulas = "SELECT nome_aula, numero_sala, horario_aula FROM aula";
    $result_aulas = $conn -> query($sql_aulas);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $novo_nome_aula = $_POST['nome_aula'];
        $novo_numero_sala = $_POST['numero_sala'];
        $novo_horario_aula = $_POST['horario_aula'];

        $sql = "UPDATE aula SET nome_aula = '$novo_nome_aula', numero_sala = '$novo_numero_sala', horario_aula = '$novo_horario_aula' WHERE id_aula = $id_atualizar_aula";

        if ($conn -> query($sql) === TRUE) {
            header('Location: add_aulas.php');
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        $conn -> close();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Atualizar aulas</title>
    </head>
    <body>
        <h1>
            Atualizar aulas
        </h1>
        <h4>
            Abaixo, atualize as informações que deseja:
        </h4>
        <form method="POST" action="update_aulas.php?id_atualizar_aula=<?php echo $id_atualizar_aula; ?>">
            <label for="nome_aula">Nome da aula (matéria a que se refere):</label>
            <br>
            <input type="text" name="nome_aula" placeholder="Digite" required>
            <br>
            <label for="numero_sala">Número da sala:</label>
            <br>
            <input type="number" name="numero_sala" placeholder="Insira um número" required>
            <br>
            <label for="duracao_aula">Horário padrão de início da aula:</label>
            <br>
            <input type="time" name="horario_aula" required>
            <br>
            <button type="submit" name="id_atualizar_aula">
                Atualizar
            </button>
            <br>
            <br>
            <a href="add_aulas.php">Voltar para as aulas</a>
        </form>
    </body>
</html>