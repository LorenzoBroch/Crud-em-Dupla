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
        <title>Atualizar Professores</title>
    </head>
    <body>
        <h2>
        Atualizar Professores
        </h2>
        <h4>
            Abaixo, atualize as informações que deseja:
        </h4>
        <form method="POST" action="update_professor.php?id_atualizar_professor=<?php echo $id_atualizar_professor; ?>">
            <label for="nome_professor">Professor:</label>
            <br>
            <input type="text" name="nome_professor">
            <br>
            <label for="data_nascimento_professor">Data de Nascimento do Professor:</label>
            <br>
            <input type="date" name="data_nascimento_professor" required>
            <br>
            <label for="cpf_professor">CPF do professor:</label>
            <br>
            <input type="text" name="cpf_professor" required>
            <br>
            <label for="telefone_professor">Telefone do professor:</label>
            <br>
            <input type="text" name="telefone_professor" required>
            <br>
            <label for="email_professor">Email do professor:</label>
            <br>
            <input type="text" name="email_professor" required>

            <button type="submit" name="id_atualizar_professor">
                Atualizar
            </button>
        </form>
    </body>
</html>