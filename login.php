<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include './components/db.php';
    if (isset($_SESSION['auth'])) echo "<script>window.location.replace('./account.php');</script>";
    $sql = "SELECT * FROM users Where login = '" . mysqli_real_escape_string($conn, $_POST['login']) . "'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo mysqli_error($conn);
    } else {
        $user = mysqli_fetch_assoc($result);

        if (isset($user) && password_verify($_POST['password'], $user['password'])) {
            session_start();
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $user['login'];
            echo "<script>window.location.replace('./account.php');</script>";
        } else {
            $logError = true;
            include './pages/loginPage.php';
        }
    }
} else {
    session_start();
    if (isset($_SESSION['auth'])) echo "<script>window.location.replace('./account.php');</script>";
    include './pages/loginPage.php';
}
