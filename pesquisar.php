<?php
require_once 'db.php';

function getNomeStatus($id_status) {
    $statusMap = [
        1 => 'Disponível',
        2 => 'Indisponível',
        3 => 'Reservado'
    ];
    return $statusMap[$id_status] ?? 'Desconhecido';
}


$termo = isset($_GET['q']) ? trim($_GET['q']) : '';

$resultados = [];
if ($termo !== '') {
    $sql = "SELECT * FROM livro
            WHERE titulo LIKE :termo 
               OR autor LIKE :termo 
               OR editora LIKE :termo";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':termo' => "%$termo%"]);
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pesquisa de Livros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(0, 0, 0);
            padding: 40px;
            margin: 0;
        }

        h1 {
            text-align: center;
            color: rgb(95, 1, 1)
        }

        form {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        input[type="text"] {
            padding: 12px 20px;
            width: 350px;
            border: 1px solid #ccc;
            border-radius: 25px 0 0 25px;
            outline: none;
            box-shadow: 0 2px 4px rgb(255, 255, 255);
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 12px 20px;
            border: none;
            background-color:rgb(204, 6, 6);
            color: white;
            font-weight: bold;
            border-radius: 0 25px 25px 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color:rgb(82, 2, 2);
        }

        table {
            width: 90%;
            max-width: 1000px;
            margin: auto;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgb(255, 4, 4);
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background-color: #fafafa;
            font-weight: bold;
        }
tr{
    color: rgb(156, 3, 3);
}
        p {
            text-align: center;
            font-size: 18px;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Pesquisar Livros</h1>

    <form method="GET" action="pesquisar.php">
        <input type="text" name="q" placeholder="Digite título, autor ou editora" value="<?= htmlspecialchars($termo) ?>">
        <input type="submit" value="Pesquisar">
    </form>

    <?php if ($termo !== ''): ?>
        <?php if (count($resultados) > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Editora</th>
                    <th>Ano</th>
                    <th>Criado em</th>
                </tr>
                <?php foreach ($resultados as $livro): ?>
                    <tr>
                        <td><?= $livro['id_livro'] ?></td>
                       <td><?= getNomeStatus($livro['id_status']) ?></td>
                        <td><?= htmlspecialchars($livro['titulo']) ?></td>
                        <td><?= htmlspecialchars($livro['autor']) ?></td>
                        <td><?= htmlspecialchars($livro['editora']) ?></td>
                        <td><?= $livro['ano_publicacao'] ?></td>
                        <td><?= $livro['criado_em'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Nenhum resultado encontrado.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
<footer>
    <p style="text-align: center; color: rgb(255, 255, 255);">Deseja <a href="porra.html" style="color: rgb(255, 255, 255);">Voltar?</a></p>
</html>
