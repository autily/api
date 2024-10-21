<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Autily</title>
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

    .circle.one { top: 20px; right: 40px; }
    .circle.two { top: 80px; left: 20px; }
    .circle.three { bottom: 50px; right: 60px; }
    .circle.four { bottom: 80px; left: 30px; }
    .circle.five { top: 180px; right: 150px; }
    .circle.six { bottom: 120px; left: 80px; }
    .circle.seven { top: 50px; right: 100px; }

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
      width: 100px;
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
      color: red;
      margin-top: 10px;
    }
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
<div class="background">
  <div class="circle small blue1 one"></div>
  <div class="circle medium blue2 two"></div>
  <div class="circle large blue1 three"></div>
  <div class="circle medium blue1 four"></div>
  <div class="circle small blue2 five"></div>
  <div class="circle large blue2 six"></div>
  <div class="circle small blue1 seven"></div>

  <div class="container">
    <img src="../img/ia (1).png" alt="" class="ia"> <!-- Ajuste o caminho da imagem -->
    <h1>Bem-vindo!</h1>

    <?php
    session_start();
    include_once("../api/conexao.php"); // Ajuste o caminho para o arquivo de conexão

    // Mensagens de sessão
    if (isset($_SESSION['msg'])) {
        echo "<p style='color:red;'>" . $_SESSION['msg'] . "</p>";
        unset($_SESSION['msg']);
    }

    // Lógica de login
    $loginError = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = $_POST['senha'];

        $sql = "SELECT id, senha FROM usuarios WHERE email='$email'";
        $resultado = mysqli_query($conn, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            $usuario = mysqli_fetch_assoc($resultado);
            if ($senha === $usuario['senha'] || password_verify($senha, $usuario['senha'])) {
                $_SESSION['usuario_id'] = $usuario['id'];
                header("Location: pais.php");
                exit();
            } else {
                $_SESSION['msg'] = "Senha incorreta!";
            }
        } else {
            $loginError = true;
        }
    }

    if ($loginError) {
        echo "<p class='message'>Você ainda não tem cadastro!</p>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'criarconta.php';
                }, 3000);
              </script>";
    }

    // Lógica de cadastro
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnCadastro'])) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        $sql = "SELECT id FROM usuarios WHERE email='$email'";
        $resultado = mysqli_query($conn, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            $_SESSION['msg'] = "Email já cadastrado!";
        } else {
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['msg'] = "Usuário cadastrado com sucesso!";
            } else {
                $_SESSION['msg'] = "Erro ao cadastrar usuário!";
            }
        }
    }
    ?>

    <form method="POST">
      <div class="input-group">
        <input type="email" name="email" placeholder="E-mail" required>
      </div>
      <div class="input-group">
        <input type="password" name="senha" placeholder="Senha" required>
      </div>
      <button class="button" name="login">Entrar</button>
    </form>

    <form method="POST" style="display:none;" id="formCadastro">
      <div class="input-group">
        <input type="text" name="nome" placeholder="Nome" required>
      </div>
      <div class="input-group">
        <input type="email" name="email" placeholder="E-mail" required>
      </div>
      <div class="input-group">
        <input type="password" name="senha" placeholder="Senha" required>
      </div>
      <button class="button" type="submit" name="btnCadastro">Criar Conta</button>
    </form>

    <div class="links">
      <a href="criarconta.php" id="">Criar uma conta</a>
      <a href="recuperar_senha.php">Esqueceu a senha?</a>
    </div>
  </div>
</div>

<script>
  const toggleFormLink = document.getElementById('toggleForm');
  const formLogin = document.querySelector('form[action="login.php"]');
  const formCadastro = document.getElementById('formCadastro');

  toggleFormLink.addEventListener('click', function(e) {
    e.preventDefault();
    formLogin.style.display = formLogin.style.display === 'none' ? 'block' : 'none';
    formCadastro.style.display = formCadastro.style.display === '
