<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            background-color: white;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .caixa-resultado {
            background: transparent;
            padding: 30px;
            border-radius: 12px;
            font-family: Serif;
            width: 350px;
            text-align: center;
        }

        .caixa {
            color: white;
            font-size: 20px;
            background-color: rgb(0, 0, 0);
            border-left: 5px solid rgb(255, 52, 52);
            padding: 15px;
            margin: 15px 0;
            border-radius: 20px;
            font-family: Arial, sans-serif;
        }

        a {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            color: rgb(0, 0, 0);
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="caixa-resultado">
        <?php
        require 'db.php'; // seu arquivo de conexão, com $pdo usando PDO

        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if (empty($email) || empty($senha)) {
            echo "<div class='caixa'>Preencha todos os campos.</div>";
            echo '<a href="login.html">Tentar novamente?</a>';
            exit;
        }

        $stmt = $pdo->prepare("SELECT id, senha, nome FROM usuario WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            if (password_verify($senha, $usuario['senha'])) {
                echo "<div class='caixa'>Login realizado com sucesso.<br>Bem-vindo, " . htmlspecialchars($usuario['nome']) . "!</div>";
                echo '<a href="porra.html">Continuar ➞</a>';
            } else {
                echo "<div class='caixa'>Senha incorreta.</div>";
                echo '<a href="login.html">Tentar novamente?</a>';
            }
        } else {
            echo "<div class='caixa'>E-mail não encontrado.</div>";
            echo '<a href="cadastro.html">Criar uma conta?</a>';
        }
        ?>
    </div>
</body>
</html>
