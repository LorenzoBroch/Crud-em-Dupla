<?php

    include 'db_connect.php';

    $id_atualizar = $_GET['atualizar_id'];

    $sql_aulas = "SELECT id_aula, nome_aula FROM aula";
    $result_aulas = $conn -> query($sql_aulas);

    $sql_professores = "SELECT id_professor, nome_professor FROM professor";
    $result_professores = $conn -> query($sql_professores);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fk_aula = $_POST['nome_aula'];
        $fk_professor = $_POST['nome_professor'];
        $duracao_aula = $_POST['duracao_aula'];

        $sql = "UPDATE diario SET fk_aula = '$fk_aula', fk_professor = '$fk_professor', duracao_aula = '$duracao_aula' WHERE id_diario = $id_atualizar";

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
        <title>Atualizar histórico de aulas</title>
    </head>
    <body>
        <h1>
            Atualizar histórico de aulas
        </h1>
        <h4>
            Abaixo, atualize as informações que deseja:
        </h4>
        <form method="POST" action="update_diario.php?atualizar_id=<?php echo $id_atualizar; ?>">
            <label for="nome_aula">Aula:</label>
            <br>
            <select name="nome_aula" required>
                <option selected disabled>Selecione</option>
                
                <?php
                
                    if ($result_aulas ->  num_rows > 0) {
                        while($row = $result_aulas -> fetch_assoc()) {
                            echo "<option value='{$row['id_aula']}'>{$row['nome_aula']}</option>";
                        }
                    } else {
                        echo "<option disabled>Nenhuma aula encontrada</option>";
                    }
                    
                ?>
                
            </select>
            <br>

            <label for="nome_professor">Professor:</label>
            <br>
            <select name="nome_professor" required>
                <option selected disabled required>Selecione</option>

                <?php

                    if ($result_professores -> num_rows > 0) {
                        while($row = $result_professores -> fetch_assoc()) {
                            echo "<option value='{$row['id_professor']}'>{$row['nome_professor']}</option>";
                        }
                    } else {
                        echo "<option disabled>Nenhum professor encontrado</option>";
                    }

                ?>

            </select>
            <br>

            <label for="duracao_aula">Duração da aula:</label>
            <br>
            <input type="time" name="duracao_aula" required>
            <br>

            <button type="submit" name="atualizar_aula_historico">
                Atualizar
            </button>

            <br>
        </form>
    </body>
</html>