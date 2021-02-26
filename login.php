<?php
require_once 'init.php';
session_start();

$login = isset($_POST['login']) ? $_POST['login'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

$con = mysqli_connect("localhost", "root", "", "register");
$result = mysqli_query(
    $con,
    "SELECT * FROM `users` WHERE `login` = '$login' AND `password`= '$password'"
);

if (empty($login) || empty($password)) {
    echo "Volte e preencha todos os campos";
    exit();
} elseif (mysqli_num_rows($result) > 0) {
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    header('location:index.php');
} else {
    unset($_SESSION['login']);
    unset($_SESSION['password']);
    header('location:form-login.php');
}

?>
