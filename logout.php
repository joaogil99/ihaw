<?php
session_start();
// Destruir sessão
if (session_destroy()) {
    // Redirecionando para a página inicial
    header("Location: form-login.php");
}
?>
