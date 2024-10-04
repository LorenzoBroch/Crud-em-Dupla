<?php

    include 'db_connect.php';

    $id_atualizar_professor = $_GET['id_atualizar_professor'];

    $sql_professor = "SELECT nome_professor, data_nascimento_professor, cpf_professor, telefone_professor, email_professor FROM professor";
    $result_professor = $conn -> query($sql_professor);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $novo_nome_professor = $_POST['nome_professor'];
        $novo_data_nascimento_professora = $_POST['data_nascimento_professor'];
        $novo_cpf_professor = $_POST['cpf_professor'];
        $novo_telefone_professor = $_POST['telefone_professor'];
        $novo_email_professor = $_POST['email_professor'];

        $sql = "UPDATE professor SET nome_professor = '$novo_nome_professor', data_nascimento_professor = '$novo_data_nascimento_professora', cpf_professor = '$novo_cpf_professor', telefone_professor = '$novo_telefone_professor', email_professor = '$novo_email_professor'  WHERE id_professor = $id_atualizar_professor";

        if ($conn -> query($sql) === TRUE) {
            header('Location: add_professores.php');
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
        <title>Atualizar professores</title>
    </head>
    <body>
        <h1>
            Atualizar professores
        </h1>
        <h4>
            Abaixo, atualize as informações que deseja:
        </h4>
        <form method="POST" action="update_professor.php?id_atualizar_professor=<?php echo $id_atualizar_professor; ?>">
            <label for="nome_professor">Nome:</label>
            <br>
            <input type="text" name="nome_professor" placeholder="Digite">
            <br>
            <label for="data_nascimento_professor">Data de nascimento:</label>
            <br>
            <input type="date" name="data_nascimento_professor" required>
            <br>
            <label for="cpf_professor">CPF:</label>
            <br>
            <input type="text" name="cpf_professor" placeholder="Digite apenas os números" required>
            <br>
            <label for="telefone_professor">Telefone:</label>
            <br>
            <input type="text" name="telefone_professor" placeholder="Digite apenas os números" required>
            <br>
            <label for="email_professor">Email:</label>
            <br>
            <input type="text" name="email_professor" placeholder="Digite" required>
            <br>
            <button type="submit" name="id_atualizar_professor">
                Atualizar
            </button>
            <br>
            <br>
            <a href="add_professores.php">Voltar para professores</a>
        </form>
    </body>
</html>