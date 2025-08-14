<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <style>
        body {
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 1000px;
            margin: 0;
        }

        .caixa-resultado {
            background: black;
            color: rgb(247, 85, 85);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 12px black;
            width: 300px;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .caixa {
            font-size: 22px;
            font-weight: bold;
            margin-top: 15px;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: rgb(255, 255, 255);
        }
    </style>
</head>
<body>
<div class="caixa-resultado">
<?php
require 'db.php'; // ou 'bd.php', dependendo do seu arquivo de conexão

$nome  = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Verifica se os campos estão preenchidos
if (empty($nome) || empty($email) || empty($senha)) {
    echo "<div class='caixa'>Preencha todos os campos.</div>";
    echo '<a href="cadastro.html">Voltar</a>';
    exit;
}

// Criptografa a senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

try {
    // Verifica se o e-mail já existe
    $stmt = $pdo->prepare("SELECT id FROM usuario WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        echo "<div class='caixa'>E-mail já utilizado.</div>";
        echo '<a href="index.html">Voltar</a>';
    } else {
        // Insere novo usuário
        $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
        if ($stmt->execute([$nome, $email, $senha_hash])) {
            echo "<div class='caixa'>Cadastro realizado com sucesso!</div>";
            echo '<a href="porra.html">Continuar ➞</a>';
        } else {
            echo "<div class='caixa'>Erro ao cadastrar usuário.</div>";
            echo '<a href="cadastro.html">Tentar novamente?</a>';
        }
    }
} catch (PDOException $e) {
    echo "<div class='caixa'>Erro no banco: " . htmlspecialchars($e->getMessage()) . "</div>";
}
?>
</div>
</body>
</html>
