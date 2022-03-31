<?php
include './components/db.php';
include './helpers/notAuthRedirect.php';
include './components/headerAcc.php';



include './helpers/query.php';
$userQuery = getUserQuery($_SESSION["id"]);
$userRes = mysqli_query($conn, $userQuery);
$userRes = mysqli_fetch_assoc($userRes);



$userId = $_SESSION["id"];
$abonementsQuery = "SELECT * FROM abonements WHERE user_id = $userId";
$abonementsResult = mysqli_query($conn, $abonementsQuery);
$abonementsResult = mysqli_fetch_all($abonementsResult, MYSQLI_ASSOC);



?>
<script src="./js/addAbonement.js" defer></script>
<div class="acc__body">
    <div class="container">
        <div class="acc__inner">
            <?php
            require_once './components/accSidebar.php';
            ?>
            <div class="container price_container">


                <div class="abonement__body_wrapper">
                    <div class="clubcard__mycards_wrapper">
                        <div class="clubcard__mycards_title">Мои клубные карты</div>
                        <div class="clubcard__mycards_list">
                            <table>
                                <thead>
                                    <tr>
                                        <td class="w-40">Тип карты</td>
                                        <td class="w-40">Статус</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                    foreach ($abonementsResult as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?php echo $value["type"] ?></td>
                                            <td><?php echo $value["status"] ?></td>
                                            <td>
                                                <button class="delete_abonement_btn custom__button" data-abonementname=<?php echo $value["type"] ?> data-abonementid=<?php echo $value["id"] ?>>Оменить</button>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php if (isset($userRes["phone"]) && $userRes["phone"] != "") {

                    ?> <section id="price" class="price">
                            <div class="clubcard__mycards_title">Список клубных карт</div>

                            <div class=" clubcard__inner">

                                <div class="clubcard__item">
                                    <div class="clubcard__item_title">LITE</div>

                                    <div class="clubcard__item_list">
                                        <ul>
                                            <li>Посещение зала до 18:00 в любой день недели</li>
                                            <li>Групповые тренировки</li>
                                            <li>Использование других услуг</li>
                                        </ul>
                                    </div>
                                    <div class="clubcard__item_btn custom__button" data-abonement="Lite">Заказать</div>
                                </div>
                                <div class="clubcard__item">
                                    <div class="clubcard__item_title">STANDART</div>
                                    <div class="clubcard__item_list">
                                        <ul>
                                            <li>Включает в себя абонемент “LITE”</li>
                                            <li>Посещение зала до 22:00</li>
                                        </ul>
                                    </div>
                                    <div class="clubcard__item_btn custom__button" data-abonement="Standart">Заказать</div>
                                </div>

                                <div class="clubcard__item">
                                    <div class="clubcard__item_title">VIP</div>

                                    <div class="clubcard__item_list">
                                        <ul>
                                            <li>Включает в себя абонемент “STANDART”</li>
                                            <li>Программа от тренера</li>
                                            <li>Персональная раздевалка</li>
                                            <li>Подарочная карта</li>
                                        </ul>
                                    </div>
                                    <div class="clubcard__item_btn custom__button" data-abonement="Vip">Заказать</div>
                                </div>
                                <div class="clubcard__item">
                                    <div class="clubcard__item_title"> STUDENT
                                    </div>

                                    <div class="clubcard__item_list">
                                        <ul>
                                            <li>
                                                Включает в себя абонемент “LITE” по сниженной цене, при
                                                предъявлении студенческого билета
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clubcard__item_btn custom__button" data-abonement="Student">Заказать</div>
                                </div>

                            </div>
                        </section>
                    <?php } else {
                        echo "<h4 class=\"clubcard__phone\">Введите телефон в личном профиле чтобы заказать клубную карту</h4>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="popup__background">

    <div class="popup">
        <div class="popup__close">
            <span></span>
            <span></span>
        </div>
        <form id="coach_form" class="popup_record_form" action="./abonement_add.php" method="POST">
            <div>
                <h2>Заказать клубную карту?</h2>
            </div>
            <div class="popup__abonement_name"></div>
            <div class="popup__btn_wrapper">
                <button class="custom__button" type="submit">Подтвердить</button>
                <button class="popup__close_btn custom__button" type="button">Отмена</button>
            </div>
        </form>
    </div>

</div>

<div class="popup__background delete_popup__background">

    <div class="popup delete_popup">
        <div class="popup__close">
            <span></span>
            <span></span>
        </div>
        <form id="coach_form" class="popup_record_form" action="./abonement_add.php" method="POST">
            <div>
                <h2>Удалить клубную карту?</h2>
            </div>
            <div class="popup__abonement_name popup__abonement_delete_name"></div>
            <div class="popup__btn_wrapper">
                <button class="custom__button" type="submit">Подтвердить</button>
                <button class="popup__close_btn custom__button" type="button">Отмена</button>
            </div>
        </form>
    </div>
</div>