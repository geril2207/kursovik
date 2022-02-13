<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="../styles/index.css">
</head>

<body>
    <div class="login_body_wrapper">
        <div>

            <a href="./index.php">На главную</a>
            <div class="login__form_wrapper">
                <div class="title__inner">
                    <h4 class="auth__title">Авторизация</h4>
                </div>
                <form action="../login.php" method="post">
                    <div class="login__form_block">
                        <input class="popup__input" type="text" name="login" placeholder="Логин" required>
                    </div>
                    <div class="login__form_block">
                        <input class="popup__input" type="password" name="password" placeholder="Пароль" required>
                    </div>
                    <?php if (isset($logError)) echo '<span class="login__form_erorr">Логин или пароль неверны</span>' ?>
                    <div class="login__form_block">
                        Нету аккаунта? <a href="../signup.php">Регистрация</a>
                    </div>
                    <div class="login__form_block_btns">
                        <button class="form__button" type="submit">Войти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>