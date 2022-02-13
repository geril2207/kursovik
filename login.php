<?php
session_start();
if (isset($_SESSION['auth'])) {
    include './helpers/redirect.php';
    redirect('./account.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include './components/db.php';
    include './helpers/query.php';
    $sql = getUserQuery(mysqli_real_escape_string($conn, $_POST['login']));
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo mysqli_error($conn);
    } else {
        $user = mysqli_fetch_assoc($result);

        if (isset($user) && password_verify($_POST['password'], $user['password'])) {
            include './helpers/redirect.php';
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $user['login'];
            $_SESSION['type'] = $user['type'];
            $_SESSION['email'] = $user['email'];
            redirect('./account.php');
        } else {
            $logError = true;
            include './pages/loginPage.php';
        }
    }
} else {
    include './pages/loginPage.php';
}
