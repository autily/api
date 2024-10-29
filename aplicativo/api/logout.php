<?php
session_start();
session_destroy();

// Redireciona para index.php
header("Location: ../public/index.html"); // Ajuste o caminho conforme necessário
exit();
?>