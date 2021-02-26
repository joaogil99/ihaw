<?php
require 'init.php';
include 'auth-session.php';

// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

// valida o ID
if (empty($id)) {
    echo "ID para alteração não definido";
    exit();
}

// busca os dados du usuário a ser editado
$PDO = db_connect();
$sql =
    "SELECT name, email, gender, birthdate, lastname, fone, login, password, ddd  FROM users WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($user)) {
    echo "Nenhum usuário encontrado";
    exit();
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">

    <title>Edição de Usuário</title>
</head>

<body>

    <p>Online como: <b><?php echo $_SESSION['login']; ?></b></p>

    <form action="edit.php" method="post">
        <fieldset style="width:0px">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name" value="<?php echo $user[
                'name'
            ]; ?>">

            <br><br>

            <label for="lastname">Sobrenome: </label>
            <br>
            <input type="text" name="lastname" id="lastname" value="<?php echo $user[
                'lastname'
            ]; ?>">

            <br><br>

            <label for="birthdate">Data de Nascimento: </label>
            <br>
            <input type="text" name="birthdate" id="birthdate" placeholder="dd/mm/YYYY"
                value="<?php echo dateConvert($user['birthdate']); ?>">

            <br><br>

            <label for="ddd">DDD: </label>
            <br>
            <input type="text" name="ddd" id="ddd" maxlength="2" size="1" value="<?php echo $user[
                'ddd'
            ]; ?>">

            <br><br>

            <label for="fone">Telefone: </label>
            <br>
            <input type="text" name="fone" id="fone" value="<?php echo $user[
                'fone'
            ]; ?>">

            <br><br>

            <label for="login">Login: </label>
            <br>
            <input type="text" name="login" id="login" value="<?php echo $user[
                'login'
            ]; ?>">

            <br><br>

            <label for="password">Senha: </label>
            <br>
            <input type="text" name="password" id="password" value="<?php echo $user[
                'password'
            ]; ?>">

            <br><br>

            <label for="email">Email: </label>
            <br>
            <input type="text" name="email" id="email" value="<?php echo $user[
                'email'
            ]; ?>">

            <br><br>

            Gênero:
            <br>
            <input type="radio" name="gender" id="gener_m" value="m" <?php if (
                $user['gender'] == 'm'
            ): ?>
                checked="checked" <?php endif; ?>>
            <label for="gener_m">Masculino </label>
            <input type="radio" name="gender" id="gener_f" value="f" <?php if (
                $user['gender'] == 'f'
            ): ?>
                checked="checked" <?php endif; ?>>
            <label for="gener_f">Feminino </label>

            <br><br>


            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <input type="submit" value="Alterar">
        </fieldset>
    </form>

</body>

</html>