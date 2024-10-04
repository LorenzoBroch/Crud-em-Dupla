<?php
    
    include 'db_connect.php';

    $sql_read = "SELECT * FROM aula";
    $result_read = $conn -> query($sql_read);

?>

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
            <input type="text" name='nome_aula' placeholder="Digite" required>
            <br>

            <label for="numero_sala">Número da sala:</label>
            <br>
            <input type="number" name='numero_sala' placeholder="Insira um número" required>
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
        <br>
        <?php

            if ($result_read -> num_rows > 0) {
                echo"<table border='1'>
                <tr>
                        <th> ID </th>
                        <th> Horário da aula </th>
                        <th> Aula </th>
                        <th> Número da sala </th>
                </tr>";
                while($row = $result_read -> fetch_assoc()){
                    echo "<tr>
                            <td> {$row['id_aula']} </td>
                            <td> {$row['horario_aula']} </td>
                            <td> {$row['nome_aula']} </td>
                            <td> {$row['numero_sala']} </td>
                            <td>
                                <a href='update_aulas.php?id_atualizar_aula={$row['id_aula']}'>Editar</a> |
                                <a href='add_aulas.php?deletar_id={$row['id_aula']}'>Excluir</a>
                            </td>
                        </tr>";
            }
                echo "</table>";
            } else{
                    echo "Nenhum registro encontrado.";
            }

        ?>
        <br>
        <a href="index.php">Ver histórico de aulas</a>
    </body>
</html>

<?php

    include 'db_connect.php';

    // CREATE AULAS
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome_aula = $_POST['nome_aula'];
        $numero_sala = $_POST['numero_sala'];
        $horario_aula = $_POST['horario_aula'];

        $sql = "INSERT INTO aula (nome_aula, numero_sala, horario_aula) VALUES ('$nome_aula', '$numero_sala', '$horario_aula')";
        header('Location: add_aulas.php');

        if ($conn -> query($sql) === TRUE) {
            echo "<br>Novo registro de aula criado com sucesso.";
        } else {
            echo "Erro: ". $sql . "<br>" . $conn->error;
        }
    }

    // DELETE AULAS
    if(isset($_GET['deletar_id'])) {

        $id_aula = $_GET['deletar_id'];
        $sql_excluir = "DELETE FROM aula WHERE id_aula = $id_aula";
        header('Location: add_aulas.php');

        if ($conn -> query($sql_excluir) === TRUE) {
            echo "<br> Dados excluídos com sucesso.";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn -> error;
        }
    }

    $conn -> close();

?>