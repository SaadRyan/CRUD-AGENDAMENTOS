<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>Agendamentos Médicos</title>
</head>
<body class="listar">
    <h1>Agendamentos Médicos</h1>
    
<?php
$stmt = $pdo->query('SELECT * FROM agendamentos ORDER BY data, hora');
$agendamento = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($agendamento) == 0) {
    echo '<p>Nenhum compromisso agendado</p>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Data</th><th>Horário</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($agendamento as $agendamentos) {
        echo '<tr>';
        echo '<td>' . $agendamentos['nome'] . '</td>';
        echo '<td>' . $agendamentos['email'] . '</td>';
        echo '<td>' . $agendamentos['telefone'] . '</td>';
        echo '<td>' . date('d/m/y', strtotime($agendamentos['data'])) . '</td>';
        echo '<td>' . date('H:i', strtotime($agendamentos['hora'])) . '</td>';
        echo '<td><a style="color:black;" href="atualizar.php?id=' . $agendamentos['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:black;" href="deletar.php?id=' . $agendamentos['id'] . '">Deletar</a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}
?>

</body>
</html>