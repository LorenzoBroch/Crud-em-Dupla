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
    <p>
        Abaixo, adicione todas as aulas que já aconteceram e a sua duração.
    </p>
    <form action="index.php" method="$_POST">
        <label for="nome_aula">Aula:</label>
        <select name="nome_aula" required>
            <option selected disabled>Selecione</option>
            <?php
            include 'db_connect.php';

            $sql_aulas = "SELECT id_aula, nome_aula FROM aula";
            $result_aulas = $conn -> query($sql_aulas);

            if ($result_aulas ->  num_rows > 0) {
                while($row = $result_aulas -> fetch_assoc()) {
                    echo "<option value='{$row['id_aula']}'>{$row['nome_aula']}</option>";
                }
            } else {
                echo "<option disabled>Nenhuma matéria encontrada</option>";
            }
            
            ?>
        </select>

        <label for="nome_professor">Professor:</label>
        <select name="nome_professor" required>
            <option selected disabled>Selecione</option>
            <?php
            include 'db_connect.php';

            $sql_professores = "SELECT id_professor, nome_professor FROM professor";
            $result_professores = $conn -> query($sql_professores);

            if ($result_professores -> num_rows > 0) {
                while($row = $result_professores -> fetch_assoc()) {
                    echo "<option value='{$row['id_professor']}'>{$row['nome_professor']}</option>";
                }
            } else {
                echo "<option disabled>Nenhum professor encontrada</option>";
            }
            ?>
        </select>

        <label for="duracao_aula">Duração da aula:</label>
        <input type="time" name="duracao_aula" required>

        <button type="submit" name="adicionar_aula_historico">
            Adicionar
        </button>
    </form>
</body>
</html>

<?php 
include 'db_connect.php';

if(isset($_POST['adicionar_aula_historico'])) {
    $duracao_aula = $_POST['duracao_aula'];
    $fk_professor = $_POST['professor'];
    $fk_aula = $_POST['aula'];

    $sql_create = "INSERT INTO diario (duracao_aula) VALUE ('$duracao_aula)";

    if($conn -> query($sql_create) === TRUE){
        echo "Novo pedido feito com sucesso!";
    }else{
        echo "Erro:". $sql."<br>".$conn -> error;
    }
}

/*$sql = "SELECT horario_aula, nome_aula, nome_professor, numero_sala, duracao_aula FROM diario INNER JOIN professor on fk_professor = id_professor INNER JOIN aula on fk_aula = id_aula;";

$result = $conn -> query($sql);

if ($result -> num_rows > 0) {
    echo"<table_border='1'>
    <tr>
            <th> ID </th>
            <th> Horário da aula </th>
            <th> Aula </th>
            <th> Professor </th>
            <th> Número da sala </th>
            <th> Duração da aula </th>
    </tr>";
    while($row = $result -> fetch_assoc()){
        echo "<tr>
                <td> {$row['id_diario']} </td>
                <td> {$row['horario_aula']} </td>
                <td> {$row['nome_aula']} </td>
                <td> {$row['nome_professor']} </td>
                <td> {$row['numero_sala']} </td>
                <td> {$row['duracao_aula']} </td>
                <td>
                    <a href='update.php?id={$row['id']}'>Editar</a>
                </td>
            </tr>"; 
}
echo "</table>";
}
else{
    echo "Nenhum registro encontrado.";
}

$conn -> close();
*/
?>