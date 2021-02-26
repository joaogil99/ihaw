<?php

require_once 'init.php';

// resgata os valores do formulário
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
$fone = isset($_POST['fone']) ? $_POST['fone'] : null;
$login = isset($_POST['login']) ? $_POST['login'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$ddd = isset($_POST['ddd']) ? $_POST['ddd'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

// validação (bem simples, mais uma vez)
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

// atualiza o banco
$PDO = db_connect();
$sql =
    "UPDATE users SET name = :name, email = :email, gender = :gender, birthdate = :birthdate, lastname = :lastname, fone = :fone, login = :login, password = :password, ddd = :ddd WHERE id = :id";
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
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: index.php');
} else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}