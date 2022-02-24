<?php
include './components/db.php';
include './helpers/notAuthRedirect.php';
include './helpers/query.php';
$errors = false;
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    include_once './helpers/redirect.php';
    $updateSql;
    if (isset($_POST["old_password"]) && $_POST["old_password"] !== '') {
        $userSqlCheckPass = getUserQuery($_SESSION['id'], 'id');
        $result = mysqli_query($conn, $userSqlCheckPass);
        $userDataPass = mysqli_fetch_assoc($result);
        var_dump(password_verify($_POST["new_password"], $userDataPass["password"]));
        if (password_verify($_POST["old_password"], $userDataPass["password"])) {
            $updateSql = "UPDATE users SET login = '" . mysqli_real_escape_string($conn, $_POST["login"]) . "',email = '" . mysqli_real_escape_string($conn, $_POST["email"]) . "',password = '" . password_hash(mysqli_real_escape_string($conn, $_POST["new_password"]), PASSWORD_BCRYPT)  . "',firstname = '" . mysqli_real_escape_string($conn, $_POST["firstname"]) . "',lastname = '" . mysqli_real_escape_string($conn, $_POST["lastname"]) . "',surname = '" . mysqli_real_escape_string($conn, $_POST["surname"]) . "' WHERE id =" . mysqli_real_escape_string($conn, $_POST["user_id"]) . "";
            $updateResult = mysqli_query($conn, $updateSql);
            redirect('./profile.php');
        } else {
            $errors = "Старый пароль неверный";
        }
    } else {
        $updateSql = "UPDATE users SET login = '" . mysqli_real_escape_string($conn, $_POST["login"]) . "',email = '" . mysqli_real_escape_string($conn, $_POST["email"]) . "',firstname = '" . mysqli_real_escape_string($conn, $_POST["firstname"]) . "',lastname = '" . mysqli_real_escape_string($conn, $_POST["lastname"]) . "',surname = '" . mysqli_real_escape_string($conn, $_POST["surname"]) . "' WHERE id =" . mysqli_real_escape_string($conn, $_POST["user_id"]) . "";
        $updateResult = mysqli_query($conn, $updateSql);
        redirect('./profile.php');
    }
}
$userSql = getUserQuery($_SESSION['id'], 'id');

$result = mysqli_query($conn, $userSql);




include './components/headerAcc.php';

$userData = mysqli_fetch_assoc($result)

?>

<div class="acc__body">
    <div class="container">
        <div class="acc__inner">
            <?php
            include './components/accSidebar.php';
            ?>
            <div class="acc__content">
                <form class="acc__form" id="form" action="profile.php" method="POST">
                    <input name="user_id" type="hidden" value=<?php echo $userData["id"] ?>>
                    <h2>Личная информация</h2>
                    <div class="profile__input_section">
                        <h4>Фамилия</h4>
                        <input class="custom__input" name="lastname" type="text" placeholder="Введите фамилию" value=<?php echo $userData["lastname"] ?>>
                    </div>
                    <div class="profile__input_section">
                        <h4>Имя</h4>
                        <input class="custom__input" name="firstname" type="text" placeholder="Введите имя" value=<?php echo $userData["firstname"] ?>>
                    </div>
                    <div class="profile__input_section">
                        <h4>Отчество</h4>
                        <input class="custom__input" name="surname" type="text" placeholder="Введите отчество" value=<?php echo $userData["surname"] ?>>
                    </div>
                    <div class="profile__input_section">
                        <h4>Логин</h4>
                        <input class="custom__input" name="login" type="text" placeholder="Введите логин" value=<?php echo $userData["login"] ?>>
                    </div>
                    <div class="profile__input_section">
                        <h4>Почта</h4>
                        <input class="custom__input" name="email" type="email" placeholder="Введите email" value=<?php echo $userData["email"] ?>>
                    </div>
                    <div class="profile__input_section">
                        <h4>Изменение пароля</h4>
                        <input class="custom__input" name="old_password" type="password" placeholder="Введите старый пароль">
                        <?php if ($errors !== false) echo '<span>Старый пароль неверный</span>' ?>
                        <input id="formInputPassword" class="custom__input" name="new_password" type="password" placeholder="Введите новый пароль">
                        <input id="formInputConfirmPassword" class="custom__input" name="confirm_new_password" type="password" placeholder="Подтвердите новый пароль">
                    </div>
                    <div class="profile__input_section profile__btn_section">
                        <button class="custom__button" type="submit">Сохранить</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="./js/formValidation.js"></script>