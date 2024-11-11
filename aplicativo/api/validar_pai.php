<?php
session_start();
include_once("../config/conexao.php"); // Ajuste o caminho

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    $sql = "SELECT id, senha FROM usuarios WHERE email='$email'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
        if ($senha === $usuario['senha'] || password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            header("Location: pais.html"); // Verifique o caminho
            exit();
        } else {
            $_SESSION['msg'] = "Senha incorreta!";
        }
    } else {
        $_SESSION['msg'] = "Usuário não encontrado!";
    }
}
?>