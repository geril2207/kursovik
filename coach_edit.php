<?php
include './components/db.php';

include './helpers/query.php';
include './components/headerAcc.php';

$dayFromEnglishToRussian = ["Monday" => "Пн", "Tuesday" => "Вт", "Wednesday" => "Ср", "Thursday" => "Чт", "Friday" => "Пт", "Saturday" => "Сб", "Sunday" => "Вс"];
$months_name = [
    'января', 'февраля', 'марта',
    'апреля', 'мая', 'июня',
    'июля', 'августа', 'сентября',
    'октября', 'ноября', 'декабря'
];


$times = ['11:00', '13:00', '15:00', '17:00'];
$coachQuery = mysqli_query($conn, getCoachesQuery($_GET["id"]));
$resultCoaches = mysqli_fetch_assoc($coachQuery);

$dates = [];
$today =  getdate();
for ($i = 1; count($dates) !== 7; $i++) {
    $dateStamp = mktime(0, 0, 0, $today["mon"], $today["mday"] + $i, $today["year"]);
    $date = getdate($dateStamp);
    $date["full_date"] = date('Y-m-d', $dateStamp);
    if ($date["wday"] == 0 || $date["wday"] == 6) continue;
    $dates[$i] = $date;
}



$datesQuery = mysqli_query($conn, getCoachDates($_GET["id"]));
$resultDates = mysqli_fetch_all($datesQuery, MYSQLI_ASSOC);

$timesDisabled = [];


foreach ($resultDates as $key => $value) {
    $timeDisabled = [];
    if (isset($timesDisabled[$value["date"]])) {

        array_push($timesDisabled[$value["date"]], $value["time"]);
        continue;
    }
    $timesDisabled[$value["date"]] = [$value["time"]];
}
?>

<div class="acc__body">
    <div class="container">
        <div class="acc__inner">
            <?php
            include './components/accSidebar.php';
            ?>

            <div class="acc__content">
                <div>
                    <h3>Редактирование</h3>
                </div>
                <div class="coach__back_link_wrapper">
                    <a href="./coach_list.php">Назад</a>
                    <?php

                    $imgStr = $resultCoaches["img"];
                    $name = $resultCoaches["name"];
                    $coachId = $resultCoaches["id"];
                    $price = $resultCoaches["price"];
                    ?>
                    <div class="coaches__item_wrapper">

                        <h3><?php echo $name ?></h3>
                        <img src=<?php echo "./img/coaches/$imgStr" ?> alt='Картинка'>
                        <h4>Стоимость тренировки(полтора часа): <?php echo $price ?>&#8381;</h4>

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
        <form id="coach_form" class="popup_record_form" action="./record.php" method="POST">
            <input id="coach_id" value=<?php echo $resultCoaches["id"] ?> type="hidden" name="coach_id">
            <div>
                <h2>Подтвердите запись к тренеру</h2>
            </div>
            <div class="poup__date_value">Дата:</div>
            <div class="poup__time_value">Время:</div>
            <div class="popup__btn_wrapper">
                <button class="custom__button" type="submit">Подтвердить</button>
                <button class="popup__close_btn custom__button" type="button">Отмена</button>
            </div>
        </form>
    </div>
</div>
<script src="./js/coachTabs.js"></script>