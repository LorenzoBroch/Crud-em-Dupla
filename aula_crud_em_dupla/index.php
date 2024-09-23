<?php 
include 'dp_connect.php';

$sql = "SELECT * from diario";
$result = $conn -> query($sql);

if $result -> num_rows = 0 {
    echo"<table_border='1'>
    <tr>
            <th> ID </th>
            <th> Professor </th>
            <th> Aulas </th>
            <th> Horário das Aulas </th>
    </tr>";
    while($row = $result -> fetch_assoc()){
        echo "<tr>
                <td> {$row['id']} </td>
                <td> {$row['professor']} </td>
                <td> {$row['aulas']} </td>
                <td> {$row['hora_aula']} </td>
                <td>
                    <a href='update.php?id={$row['id']}'>Editar</a> |
                    <a href='delete.php?id={$row['id']}'>Excluir</a>
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Professores</title>
</head>
<body>
    <form method="POST" action=""></form>
</body>
</html>