<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include './components/db.php';
    if (isset($_SESSION['auth'])) echo "<script>window.location.replace('./account.php');</script>";
    $sqlQuery = 'INSERT INTO users (email, login, password) VALUES ("' . mysqli_real_escape_string($conn, $_POST['email']) . '", "' . mysqli_real_escape_string($conn, $_POST['login']) . '", "' .  password_hash(mysqli_real_escape_string($conn, $_POST['password']), PASSWORD_BCRYPT) . '")';
    $result = mysqli_query($conn, $sqlQuery);
    if (!$result) {
        if (mysqli_errno($conn) === 1062) {
            $repeatErrorType = explode(' ', mysqli_error($conn));
            include './pages/signupPage.php';
        }
    } else {
        echo '<h4>Вы успешно зарегистрированы. <a href="./login.php">Войти</a></h4>';
    }
} else {
    session_start();
    if (isset($_SESSION['auth'])) echo "<script>window.location.replace('./account.php');</script>";
    include './pages/signupPage.php';
}
