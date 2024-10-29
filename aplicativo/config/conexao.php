<?php
$servidor = "localhost";  // O servidor que está rodando seu MySQL
$usuario = "root";        // Usuário padrão do MySQL
$senha = "";              // Senha do MySQL
$dbname = "bd_autily";       // Nome do banco de dados

// Criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

// Verificar a conexão
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>
