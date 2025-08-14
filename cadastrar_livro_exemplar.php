<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Livro</title>
    <style>
        body {
            background-color: rgb(255, 255, 255);
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .caixa-resultado {
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 12px;
            color: rgb(253, 97, 97);
            box-shadow: 0 10px 12px rgba(0, 0, 0, 0.7);
            width: 350px;
            text-align: center;
        }

        .caixa {
            font-size: 20px;
            font-weight: bold;
            margin-top: 15px;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: rgb(0, 0, 0);
        }
    </style>
</head>
<body>
    <div class="caixa-resultado">
    <?php
    require 'db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $editora = $_POST['editora'];
        $ano = $_POST['ano_publicacao'];
        $status_nome = $_POST['status']; 

      
        $stmtStatus = $pdo->prepare("SELECT id_status FROM status WHERE nome_status = ?");
        $stmtStatus->execute([$status_nome]);
        $rowStatus = $stmtStatus->fetch(PDO::FETCH_ASSOC);

        if (!$rowStatus) {
            echo "<div class='caixa'>Status inválido.</div>";
            exit;
        }

        $id_status = $rowStatus['id_status'];

      
        $stmtLivro = $pdo->prepare("INSERT INTO livro (id_status, titulo, autor, editora, ano_publicacao) VALUES (?, ?, ?, ?, ?)");
        $okLivro = $stmtLivro->execute([$id_status, $titulo, $autor, $editora, $ano]);

        if ($okLivro) {
            $id_livro = $pdo->lastInsertId();

           
            $localizacao = "não definido";
            $stmtExemplar = $pdo->prepare("INSERT INTO exemplar (id_livro, id_status, localizacao) VALUES (?, ?, ?)");
            $okExemplar = $stmtExemplar->execute([$id_livro, $id_status, $localizacao]);

            if ($okExemplar) {
                $id_exemplar = $pdo->lastInsertId();
                $codigo = "A" . str_pad($id_exemplar, 1, "0", STR_PAD_LEFT);

                $stmtUpdate = $pdo->prepare("UPDATE exemplar SET codigo_exemplar = ? WHERE id_exemplar = ?");
                $stmtUpdate->execute([$codigo, $id_exemplar]);

                echo "<div class='caixa'>Livro cadastrado com sucesso!<br>ID Livro: $id_livro<br>Código Exemplar: $codigo</div>";
            } else {
                echo "<div class='caixa'>Erro ao cadastrar exemplar.</div>";
            }
        } else {
            echo "<div class='caixa'>Erro ao cadastrar livro.</div>";
        }
    } else {
        echo "<div class='caixa'>Acesso inválido.</div>";
    }
    ?>
    <a href="porra.html">← Voltar</a>
    </div>
</body>
</html>
