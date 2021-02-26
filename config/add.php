<?php

require_once 'init.php';

// pega os dados do formuário
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
$fone = isset($_POST['fone']) ? $_POST['fone'] : null;
$login = isset($_POST['login']) ? $_POST['login'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$ddd = isset($_POST['ddd']) ? $_POST['ddd'] : null;

// validação (bem simples, só pra evitar dados vazios)
if (
    empty($name) ||
    empty($email) ||
    empty($gender) ||
    empty($birthdate) ||
    empty($lastname) ||
    empty($fone) ||
    empty($login) ||
    empty($password) ||
    empty($ddd)
) {
    echo "Volte e preencha todos os campos";
    exit();
}

// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
$isoDate = dateConvert($birthdate);

// insere no banco
$PDO = db_connect();
$sql =
    "INSERT INTO users(name, email, gender, birthdate, lastname, fone, login, password, ddd) VALUES(:name, :email, :gender, :birthdate, :lastname, :fone, :login, :password, :ddd)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':birthdate', $isoDate);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':fone', $fone);
$stmt->bindParam(':login', $login);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':ddd', $ddd);

if ($stmt->execute()) {
    header('Location: ../index.php');
} else {
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
