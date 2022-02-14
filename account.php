<?php
include './components/db.php';

if (!isset($_SESSION['auth'])) {
    include './helpers/redirect.php';
    redirect('./');
}
include './components/headerAcc.php';



?>

<div class="acc__body">
    <div class="container">
        <div class="acc__inner">
            <?php
            include './components/accSidebar.php';
            ?>
            <div class="acc__content">
                <form action="">
                    <div>
                        <img src="" alt="Аватар">
                        <input type="file" placeholder="Загрузите аватар">
                    </div>
                    <h2>Личная информация</h2>
                    <div class="profile__input_section">
                        <h4>Имя</h4>
                        <input class="custom__input" type="text" placeholder="Введите имя">
                    </div>
                    <div class="profile__input_section">
                        <h4>Фамилия</h4>
                        <input class="custom__input" type="text" placeholder="Введите фамилию">
                    </div>
                    <div class="profile__input_section">
                        <h4>Отчество</h4>
                        <input class="custom__input" type="text" placeholder="Введите отчество">
                    </div>
                    <div class="profile__input_section">
                        <h4>Логин</h4>
                        <input class="custom__input" type="text" placeholder="Введите логин">
                    </div>
                    <div class="profile__input_section">
                        <h4>Почта</h4>
                        <input class="custom__input" type="email" placeholder="Введите email">
                    </div>
                    <div class="profile__input_section">
                        <h4>Изменение пароля</h4>
                        <input class="custom__input" type="email" placeholder="Введите старый пароль">
                        <input class="custom__input" type="email" placeholder="Введите новый пароль">
                        <input class="custom__input" type="email" placeholder="Подтвердите новый пароль">
                    </div>
                    <div class="profile__input_section profile__btn_section">
                        <button class="custom__button" type="submit">Сохранить</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>