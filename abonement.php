<?php
include './components/db.php';
include './helpers/notAuthRedirect.php';
include './components/headerAcc.php';




$abonements_result = mysqli_query($conn, "SELECT * FROM abonements");

$abonements_result = mysqli_fetch_all($abonements_result, MYSQLI_ASSOC)

?>
<div class="acc__body">
    <div class="container">
        <div class="acc__inner">
            <?php
            require_once './components/accSidebar.php';
            ?>
            <div class="abonement__body_wrapper">
                <h2 class="abonement__title">Абонемент</h2>
                <h3 class="abonement__personal_title">Мой абонемент</h3>
                <div class="abonement__personal_content">
                    Standart
                </div>
                <div class="abonement__personal_content">
                    Выберите абонемент
                </div>
                <div class="abonement__pesronal_payment">
                    Оплата
                    Следующий платеж на сумму будет 530Р списан 16.03.2022
                    Номер карты заканчивается на
                </div>

                <div class="">
                    Выберите один из доступных абонементов
                </div>

                <div class="abonement__personal_abonements_wrapper">
                    <h3 class="abonement__personal_abonements_title">Список абонементов</h3>
                    <div class="abonement__personal_abonements_list">
                        <?php


                        foreach ($abonements_result as $key => $value) {
                            $price = $value["price"];
                            $title = $value["title"];
                            echo " <div class=\"abonement__personal_abonements_item\">
                            <div class=\"abonement__personal_abonements_item_title\">$title</div>
                            <div class=\"abonement__personal_abonements_item_price\">Стоимость : $price&#8381;</div>
                            <button class=\"custom__button\">Выбрать</button>
                            </div>";
                        }
                        ?>

                    </div>

                </div>
                <?php
                ?>
                <div>
                    <button class="custom__button">Изменить карту</button>
                </div>


            </div>

        </div>