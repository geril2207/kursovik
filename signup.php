<?php
session_start();
if (isset($_SESSION['auth'])) {
    include './helpers/redirect.php';
    redirect('./profile.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include './components/db.php';
    $sqlQuery = 'INSERT INTO users (email, login, password, firstname, lastname) VALUES ("' . mysqli_real_escape_string($conn, $_POST['email']) . '", "' . mysqli_real_escape_string($conn, $_POST['login']) . '", "' .  password_hash(mysqli_real_escape_string($conn, $_POST['password']), PASSWORD_BCRYPT) . '","' . mysqli_real_escape_string($conn, $_POST['firstname']) . '","' . mysqli_real_escape_string($conn, $_POST['lastname']) . '")';
    $result = mysqli_query($conn, $sqlQuery);
    if (!$result) {
        if (mysqli_errno($conn) === 1062) {
            $repeatErrorType = explode(' ', mysqli_error($conn));
            include './pages/signupPage.php';
        }
    } else {
        include './helpers/redirect.php';
        redirect('./login.php');
    }
} else {
    include './pages/signupPage.php';
}
