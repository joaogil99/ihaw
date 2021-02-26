<?php
session_start();
// Destruir sessão
if (session_destroy()) {
    // Redirecionando para a página inicial
    header("Location: ../pages/form-login.php");
}
?>
