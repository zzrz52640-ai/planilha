<?php
// Array bidimensional
$alunos = [
    ["nome" => "Ana Souza",     "notas" => [7.5, 8.0, 6.5, 9.0]],
    ["nome" => "Bruno Lima",    "notas" => [5.0, 6.0, 5.5, 6.5]],
    ["nome" => "Carla Mendes",  "notas" => [9.0, 8.5, 9.5, 8.0]],
    ["nome" => "Diego Santos",  "notas" => [4.5, 5.0, 6.0, 5.5]],
    ["nome" => "Eduarda Alves", "notas" => [7.0, 6.5, 8.0, 7.5]]
];

// Calcula a média de cada aluno e adiciona ao array.
foreach ($alunos as &$aluno) {
    $aluno["media"] = array_sum($aluno["notas"]) / count($aluno["notas"]);
}
unset($aluno);

// Ordena pela média, da maior para a menor.
usort($alunos, function ($a, $b) {
    return $b["media"] <=> $a["media"];
});

$mediaGeral = array_sum(array_column($alunos, "media")) / count($alunos);

function classeMedia($media) {
    return $media >= 6.0 ? "aprovado" : "reprovado";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Notas - 8º Ano A</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 95%;
            margin: 25px auto;
            border-collapse: collapse;
            background: #658;
        }
        th, td {
            border: 1px solid #999;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #333;
            color: white;
        }
        td:first-child {
            text-align: left;
        }
        .aprovado {
            background-color: #b7e4c7;
            color: #155724;
            font-weight: bold;
        }
        .reprovado {
            background-color: #f5b5b5;
            color: #721c24;
            font-weight: bold;
        }
        tfoot {
            font-weight: bold;
            background: #e9ecef;
        }
    </style>
</head>
<body>

<h1>Notas do 8º Ano A</h1>

<table>
    <thead>
        <tr>
            <th>Aluno</th>
            <th>1º Bimestre</th>
            <th>2º Bimestre</th>
            <th>3º Bimestre</th>
            <th>4º Bimestre</th>
            <th>Média</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($alunos as $aluno): ?>
            <tr>
                <td><?= htmlspecialchars($aluno["nome"]) ?></td>
                <?php foreach ($aluno["notas"] as $nota): ?>
                    <td><?= number_format($nota, 1, ",", ".") ?></td>
                <?php endforeach; ?>
                <td class="<?= classeMedia($aluno["media"]) ?>">
                    <?= number_format($aluno["media"], 1, ",", ".") ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="5">Média geral da turma</td>
            <td><?= number_format($mediaGeral, 1, ",", ".") ?></td>
        </tr>
    </tfoot>
</table>

</body>
</html>
