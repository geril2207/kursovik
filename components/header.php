<?php
$accLink = '../login.php';
if (isset($_SESSION['auth'])) {
    $accLink = './profile.php';
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pulse-fit</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500&family=Roboto:ital,wght@0,400;1,500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./styles/index.css" />
</head>

<body>
    <div class="header__fixed">
        <header class="header">
            <div class="header__container">
                <div class="header__inner">
                    <div class="header__logo">
                        <img src="./img/logo-border.svg" alt="" class="header__circle" />
                        <div class="header__logo_item">
                            <img src="./img/logo.svg" alt="" class="header__logo__item_img" />
                            Pulse-fit
                        </div>
                    </div>
                    <div class="header__nav">
                        <div class="header__nav_item header__nav_item_scroll" data-scroll="#why">О НАС</div>
                        <div class="header__nav_item header__nav_item_scroll" data-scroll="#group">
                            ВИДЫ ТРЕНЕРОВОК
                        </div>
                        <div class="header__nav_item header__nav_item_scroll" data-scroll="#price">
                            АБОНЕМЕНТЫ
                        </div>
                        <div class="header__nav_item header__nav_item_scroll" data-scroll="#train">ТРЕНЕРА</div>
                        <div class="header__nav_item header__nav_item_scroll" data-scroll="#contacts">
                            КОНТАКТЫ

                        </div>
                        <div class="header__nav_item">
                            <a class="header__nav_item_acc_link" href=<?php echo $accLink ?>>Личный кабинет</a>
                        </div>
                        <div class="burger__close">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="burger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </header>
    </div>