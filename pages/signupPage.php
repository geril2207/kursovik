<?php
$error = false;
if (isset($repeatErrorType)) {
    $error = $repeatErrorType[5];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../styles/index.css">
</head>

<body>
    <div class="login_body_wrapper">
        <div>
            <a href="./index.php">На главную</a>

            <div class="login__form_wrapper">
                <div class="title__inner">
                    <h4 class="auth__title">Регистрация</h4>
                </div>
                <form id="form" action="../signup.php" method="post">
                    <div class="login__form_block">
                        <input class="custom__input" type="text" name="login" placeholder="Логин" required>
                        <?php if ($error == "'login'") echo '<span class="login__form_erorr">Пользователь с таким логином уже существует</span>' ?>
                    </div>
                    <div class="login__form_block">
                        <input class="custom__input" type="email" name="email" placeholder="E-mail" required>
                        <?php if ($error == "'email'") echo '<span class="login__form_erorr">Пользователь с такой почтой уже существует</span>' ?>
                    </div>
                    <div class="login__form_block">
                        <input id="formInputPassword" class="custom__input" type="password" name="password" placeholder="Пароль" required>
                    </div>
                    <div class="login__form_block">
                        <input id="formInputConfirmPassword" class="custom__input" type="password" name="confirm_password" placeholder="Подтверждение пароля" required>
                    </div>
                    <div class="login__form_block">
                        Есть аккаунт? <a href="../login.php">Войти</a>
                    </div>
                    <div class="login__form_block_btns">
                        <button class="form__button" type="submit">Зарегистрироваться</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/formValidation.js"></script>
</body>

</html>