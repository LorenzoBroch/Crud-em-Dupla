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
            echo "Atualização realidada com sucesso";
            header('Location: index.php');
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
        <title>Atualizar Aulas</title>
    </head>
    <body>
        <h2>
        Atualizar Aulas
        </h2>
        <h4>
            Abaixo, atualize as informações que deseja:
        </h4>
        <form method="POST" action="update_aulas.php?id_atualizar_aula=<?php echo $id_atualizar_aula; ?>">
            <label for="nome_aula">Aula:</label>
            <br>
            <input type="text" name="nome_aula" required>
            <br>
            </select>
            <br>
            <label for="duracao_aula">Duração da aula:</label>
            <br>
            <input type="time" name="duracao_aula" required>
            <br>
            <br>
            <label for="numero_sala">Número da sala:</label>
            <br>
            <input type="number" name="numero_sala" required>

            <button type="submit" name="id_atualizar_aula">
                Atualizar
            </button>
        </form>
    </body>
</html>