<?php
require '../config/init.php';
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">

    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <form action="../config/register.php" method="post">
        <fieldset style="width:0px">
            <legend class="form-legend">Cadastro</legend>
            <label for="name">Nome: <span class=attention>*</span></label>
            <br>
            <input type="text" name="name" id="name" maxlength="60">

            <br><br>

            <label for="lastname">Sobrenome:<span class=attention>*</span></label>
            <br>
            <input type="text" name="lastname" id="lastname" maxlength="60">

            <br><br>

            <label for="birthdate">Data de Nascimento:<span class=attention>*</span></label>
            <br>
            <input type="text" name="birthdate" id="birthdate" maxlength="10" size="9" placeholder="dd/mm/YYYY">

            <br><br>

            <label for="ddd">DDD:<span class=attention>*</span>
                <br>
                <input type="text" name="ddd" id="ddd" maxlength="2" size="3">
            </label>

            <br><br>

            <label for="fone">Telefone: <span class=attention size=2 color="red">*only numbers</span></label>
            <br>
            <input type="text" name="fone" id="fone" maxlength="9" size="11">

            <br><br>

            <label for="login">Login: <span class=attention>*</span></label>
            <br>
            <input type="text" name="login" id="login" maxlength="15">

            <br><br>

            <label for="password">Senha: <span class=attention>*</span></label>
            <br>
            <input type="text" name="password" id="password" maxlength="30">

            <br><br>

            <label for="email">Email: <span class=attention>*</span></label>
            <br>
            <input type="text" name="email" id="email" maxlength="50">

            <br><br>

            Gênero: <span class=attention>*</span>
            <br>
            <input type="radio" name="gender" id="gener_m" value="m">
            <label for="gener_m">Masculino </label>
            <input type="radio" name="gender" id="gener_f" value="f">
            <label for="gener_f">Feminino </label>

            <br><br>

            <input type="submit" value="Cadastrar">
        </fieldset>
    </form>

</body>

</html>