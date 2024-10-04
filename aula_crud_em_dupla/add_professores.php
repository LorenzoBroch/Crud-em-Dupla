<?php
    
    include 'db_connect.php';

    $sql_read = "SELECT * FROM professor";
    $result_read = $conn -> query($sql_read);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adicionar professores</title>
    </head>
    <body>
        <h1>
            Adicionar professores
        </h1>
        <form action="add_professores.php" method="POST">
            <label for="nome_professor">Nome:</label>
            <br>
            <input type="text" name="nome_professor" placeholder="Digite" required>
            <br>

            <label for="data_nascimento_professor">Data de nascimento:</label>
            <br>
            <input type="date" name="data_nascimento_professor" placeholder="Digite" required>
            <br>

            <label for="cpf_professor">CPF:</label>
            <br>
            <input type="number" name="cpf_professor" placeholder="Digite apenas os números" required>
            <br>

            <label for="telefone_professor">Telefone:</label>
            <br>
            <input type="number" name="telefone_professor" placeholder="Digite apenas os números" required>
            <br>

            <label for="email_professor">Email:</label>
            <br>
            <input type="email" name="email_professor" placeholder="Digite" required>
            <br>

            <button type="submit">Adicionar</button>
            <br>
        </form>
        <br>
        <?php

            if ($result_read -> num_rows > 0) {
                echo"<table border='1'>
                <tr>
                        <th> ID </th>
                        <th> Nome do professor </th>
                        <th> Data de nascimento </th>
                        <th> CPF </th>
                        <th> Telefone </th>
                        <th> Email </th>
                </tr>";
                while($row = $result_read -> fetch_assoc()){
                    echo "<tr>
                            <td> {$row['id_professor']} </td>
                            <td> {$row['nome_professor']} </td>
                            <td> {$row['data_nascimento_professor']} </td>
                            <td> {$row['cpf_professor']} </td>
                            <td> {$row['telefone_professor']} </td>
                            <td> {$row['email_professor']} </td>
                            <td>
                                <a href='update_professor.php?id_atualizar_professor={$row['id_professor']}'>Editar</a> |
                                <a href='add_professores.php?deletar_id={$row['id_professor']}'>Excluir</a>
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
        <br>
        <br>
    </body>
</html>

<?php

    include 'db_connect.php';
    
    // CREATE PROFESSOR
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome_professor'];
        $data_nascimento = $_POST['data_nascimento_professor'];
        $cpf = $_POST['cpf_professor'];
        $telefone = $_POST['telefone_professor'];
        $email = $_POST['email_professor'];

        $sql = "INSERT INTO professor (nome_professor, data_nascimento_professor, cpf_professor, telefone_professor, email_professor) VALUES ('$nome', '$data_nascimento', '$cpf', '$telefone', '$email')";
        header('Location: add_professores.php');

        if($conn -> query($sql) === TRUE) {
            echo "<br>Novo registro de professor criado com sucesso.";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn -> error;
        }
    }

    // DELETE AULAS
    if(isset($_GET['deletar_id'])) {

        $id_professor = $_GET['deletar_id'];
        $sql_excluir = "DELETE FROM professor WHERE id_professor = $id_professor";
        header('Location: add_professores.php');

        if ($conn -> query($sql_excluir) === TRUE) {
            echo "Dados excluídos com sucesso.";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn -> error;
        }
    }

    $conn -> close();

?>