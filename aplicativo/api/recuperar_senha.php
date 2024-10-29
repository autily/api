<?php
header("Content-Type: application/json");
session_start();
include_once("../config/conexao.php"); // Ajuste o caminho conforme a estrutura do seu projeto

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe o JSON e decodifica
    $data = json_decode(file_get_contents("php://input"), true);
    $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
    
    // Log do email recebido (opcional)
    error_log("Email recebido: " . $email);

    // Verificar se o email existe no banco de dados
    $sql = "SELECT id FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Log da contagem de resultados (opcional)
    error_log("Resultados encontrados: " . $resultado->num_rows);

    if ($resultado->num_rows > 0) {
        // Aqui vai ser a lógica para enviar um email de recuperação
        //
        echo json_encode(["status" => "success", "message" => "Email enviado para recuperação!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Email não cadastrado!"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Método não permitido"]);
}

$conn->close();
?>
