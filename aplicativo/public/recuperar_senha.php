<?php
// Incluindo o arquivo de conexão
include '../api/conexao.php'; // Ajuste o caminho conforme a estrutura do seu projeto

// Inicia a sessão
session_start();

// Variável para armazenar a mensagem
$message = '';

// Recebe o e-mail do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Verifica se o e-mail existe no banco de dados
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // E-mail encontrado, aqui você pode gerar um link de redefinição de senha
        // Exemplo de envio de e-mail
        $to = $email;
        $subject = "Redefinição de Senha";
        $message = "Clique no link abaixo para redefinir sua senha:\n";
        $message .= "http://seusite.com/redefinir_senha.php?email=" . urlencode($email);
        $headers = "From: no-reply@seusite.com\r\n";

        if (mail($to, $subject, $message, $headers)) {
            $_SESSION['message'] = "Um e-mail de recuperação foi enviado para $email.";
        } else {
            $_SESSION['message'] = "Uma mensagem já vai chegar ao seu email!.";
        }
    } else {
        $_SESSION['message'] = "Ops! Parece que você não possui um email cadastrado.";
    }

    // Redireciona de volta para o formulário
    header("Location: recuperar_senha.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .background {
            background-color: #f9f9f9;
            height: 100vh;
            width: 100vw;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.7;
        }

        .circle.blue1 {
            background-color: #02a7e9;
        }

        .circle.blue2 {
            background-color: #60caf7;
        }

        .circle.small {
            width: 50px;
            height: 50px;
        }

        .circle.medium {
            width: 120px;
            height: 120px;
        }

        .circle.large {
            width: 200px;
            height: 200px;
        }

        .circle.one {
            top: 20px;
            right: 40px;
        }

        .circle.two {
            top: 80px;
            left: 20px;
        }

        .circle.three {
            bottom: 50px;
            right: 60px;
        }

        .circle.four {
            bottom: 80px;
            left: 30px;
        }

        .circle.five {
            top: 180px;
            right: 150px;
        }

        .circle.six {
            bottom: 120px;
            left: 80px;
        }

        .circle.seven {
            top: 50px;
            right: 100px;
        }

        .container {
            background-color: white;
            padding: 30px;
            max-width: 100%;
            width: 500px;
            border-radius: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            z-index: 2;
            position: relative;
        }

        .container img {
            width: 100px; /* Ajuste o tamanho conforme necessário */
            border-radius: 50%;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 12px 20px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 30px;
            outline: none;
        }

        .input-group input::placeholder {
            color: #aaa;
        }

        .input-group input:focus {
            border-color: #02a7e9;
        }

        .button {
            background-color: #02a7e9;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px 20px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            width: 100%;
        }

        .button:hover {
            background-color: #60caf7;
        }

        .links {
            margin-top: 20px;
        }

        .links a {
            text-decoration: none;
            color: #02a7e9;
            font-size: 14px;
            display: block;
            margin-top: 10px;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            color: red;
            font-size: 16px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="background">
        <!-- Bolinhas de fundo -->
        <div class="circle small blue1 one"></div>
        <div class="circle medium blue2 two"></div>
        <div class="circle large blue1 three"></div>
        <div class="circle medium blue1 four"></div>
        <div class="circle small blue2 five"></div>
        <div class="circle large blue2 six"></div>
        <div class="circle small blue1 seven"></div>

        <!-- Caixa principal -->
        <div class="container">
            <!-- Imagem de exemplo -->
            <img src="../img/ia (1).png" alt="Imagem de Recuperação"> <!-- Substitua 'sua_imagem.png' pelo caminho correto da sua imagem -->
            <h1>Recupere sua senha</h1>
            <!-- Caixa de mensagem -->
            <?php
            if (isset($_SESSION['message'])) {
                echo '<div class="message">' . $_SESSION['message'] . '</div>';
                unset($_SESSION['message']); // Limpa a mensagem após exibir
            }
            ?>
            <br>
            <form action="recuperar_senha.php" method="post">
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <button type="submit" class="button">Enviar Email de Recuperação</button>
                <div class="links">
                    <a href="index.php">Voltar ao login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
