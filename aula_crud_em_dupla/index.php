<?php 
include 'db_connect.php';

$sql = "SELECT * from diario";
$result = $conn -> query($sql);

if ($result -> num_rows > 0) {
    echo"<table_border='1'>
    <tr>
            <th> ID </th>
            <th> Horário </th>
            <th> Professor </th>
            <th> Aula </th>
    </tr>";
    while($row = $result -> fetch_assoc()){
        echo "<tr>
                <td> {$row['id_diario']} </td>
                <td> {$row['hora_aula']} </td>
                <td> {$row['fk_professor']} </td>
                <td> {$row['fk_aula']} </td>
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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Professores</title>
</head>
<body>
</body>
</html>