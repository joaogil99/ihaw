<?php
require_once 'init.php';
session_start();

// pega os valores de $login e $password
$login = isset($_POST['login']) ? $_POST['login'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

// conecta com o banco e busca pelos valores
$con = mysqli_connect("localhost", "root", "", "ihaw");
$result = mysqli_query(
    $con,
    "SELECT * FROM `users` WHERE `login` = '$login' AND `password`= '$password'"
);


// verificação dos campos
if (mysqli_num_rows($result) > 0) {
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    header('location:../pages/home.php');
} else {
    unset($_SESSION['login']);
    unset($_SESSION['password']);
    header('location:../pages/form-login.php');
}

?>