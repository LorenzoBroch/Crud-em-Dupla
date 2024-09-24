<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar professores</title>
</head>
<body>
    <h2>
        Adicionar professores
    </h2>
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
    <a href="index.php">Ver histórico de aulas</a>
</body>
</html>

<?php
 include 'db_connect.php';

 if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_professor'];
    $data_nascimento = $_POST['data_nascimento_professor'];
    $cpf = $_POST['cpf_professor'];
    $telefone = $_POST['telefone_professor'];
    $email = $_POST['email_professor'];

    $sql = "INSERT INTO professor (nome_professor, data_nascimento_professor, cpf_professor, telefone_professor, email_professor) VALUES ('$nome', '$data_nascimento', '$cpf', '$telefone', '$email')";

    if($conn -> query($sql) === TRUE) {
        echo "Novo registro de professor criado com sucesso.";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn -> error;
    }
 }

?>