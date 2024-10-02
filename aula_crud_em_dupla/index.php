<?php

    include 'db_connect.php';

    $sql_aulas = "SELECT id_aula, nome_aula FROM aula";
    $result_aulas = $conn -> query($sql_aulas);

    $sql_professores = "SELECT id_professor, nome_professor FROM professor";
    $result_professores = $conn -> query($sql_professores);

    $sql_read = "SELECT id_diario, horario_aula, nome_aula, nome_professor, numero_sala, duracao_aula FROM diario INNER JOIN professor on fk_professor = id_professor INNER JOIN aula on fk_aula = id_aula;";
    $result_read = $conn -> query($sql_read);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Histórico de aulas</title>
    </head>
    <body>
        <a href="add_aulas.php"><button>Adicionar aulas</button></a>
        <a href="add_professores.php"><button>Adicionar professores</button></a>
        <h2>
            Histórico de aulas
        </h2>
        <h4>
            Abaixo, adicione todas as aulas que já aconteceram e a sua duração.
        </h4>
        <form action="index.php" method="POST">
            <label for="nome_aula">Aula:</label>
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

            <label for="nome_professor">Professor:</label>
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

            <label for="duracao_aula">Duração da aula:</label>
            <input type="time" name="duracao_aula" required>

            <button type="submit" name="adicionar_aula_historico">
                Adicionar
            </button>
        </form>
        <br>
    </body>
</html>

<?php

    include 'db_connect.php';

    // CREATE NO DIÁRIO
    if(isset($_POST['adicionar_aula_historico'])) {
        $fk_aula = $_POST['nome_aula'];
        $fk_professor = $_POST['nome_professor'];
        $duracao_aula = $_POST['duracao_aula'];
    
        $sql_create = "INSERT INTO diario (duracao_aula, fk_professor, fk_aula) VALUE ('$duracao_aula','$fk_professor','$fk_aula')";
        header('Location: index.php');

        if($conn -> query($sql_create) === TRUE){
            echo "Novo cadastro feito com sucesso!";
        }else{
            echo "Erro:". $sql."<br>".$conn -> error;
        }
    }

    // READ DIÁRIO
    if ($result_read -> num_rows > 0) {
        echo"<table border='1'>
        <tr>
                <th> ID </th>
                <th> Horário da aula </th>
                <th> Aula </th>
                <th> Professor </th>
                <th> Número da sala </th>
                <th> Duração da aula </th>
        </tr>";
        while($row = $result_read -> fetch_assoc()){
            echo "<tr>
                    <td> {$row['id_diario']} </td>
                    <td> {$row['horario_aula']} </td>
                    <td> {$row['nome_aula']} </td>
                    <td> {$row['nome_professor']} </td>
                    <td> {$row['numero_sala']} </td>
                    <td> {$row['duracao_aula']} </td>
                    <td>
                        <a href='update_diario.php?atualizar_id={$row['id_diario']}'>Editar</a> |
                        <a href='index.php?deletar_id={$row['id_diario']}'>Excluir</a>
                    </td>
                </tr>";
    }
        echo "</table>";
    } else{
            echo "Nenhum registro encontrado.";
    }


    // DELETE DIÁRIO
    if(isset($_GET['deletar_id'])) {

        $id_diario = $_GET['deletar_id'];
        $sql_excluir = "DELETE FROM diario WHERE id_diario = $id_diario";
        header('Location: index.php');

        if ($conn -> query($sql_excluir) === TRUE) {
            echo "<br> Dados excluídos com sucesso.";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn -> close();
?>