<?php
header("Content-Type: application/json");
session_start();
include_once("../config/conexao.php"); // Ajuste o caminho conforme a estrutura do seu projeto

// Lógica de cadastro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografar a senha

    // Verificar se o email já existe
    $sql = "SELECT id FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // Email já cadastrado
        echo json_encode(["status" => "error", "message" => "Email já cadastrado!"]);
    } else {
        // Inserir no banco
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senha);

        if ($stmt->execute()) {
            // Cadastro bem-sucedido
            echo json_encode(["status" => "success", "message" => "Usuário cadastrado com sucesso!"]);
        } else {
            // Erro ao cadastrar
            echo json_encode(["status" => "error", "message" => "Erro ao cadastrar usuário!"]);
        }
    }
} else {
    // Método não permitido
    echo json_encode(["status" => "error", "message" => "Método não permitido"]);
}

$conn->close();
?>
