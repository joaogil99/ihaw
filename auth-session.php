<?php
require_once 'init.php';

// inicia sessão e verifica se possui sessão 
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: form-login.php");
    exit();
}
?>
