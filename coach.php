<?php
include './components/db.php';

include './helpers/query.php';
include './components/headerAcc.php';

$dayFromEnglishToRussian = ["Monday" => "Понедельник", "Tuesday" => "Вторник", "Wednesday" => "Среда", "Thursday" => "Четверг", "Friday" => "Пятница", "Saturday" => "Суббота", "Sunday" => "Воскресенье"];
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
                <div class="coach__back_link_wrapper">
                    <a href="./coach_list.php">Назад</a>
                    <?php

                    $imgStr = $resultCoaches["img"];
                    $name = $resultCoaches["name"];
                    $coachId = $resultCoaches["id"];
                    $price = $resultCoaches["price"];
                    ?>
                    <div class="coaches__item_wrapper coach__wrapper">

                        <h3><?php echo $name ?></h3>
                        <img src=<?php echo "./img/coaches/$imgStr" ?> alt='Картинка'>
                        <h4>Стоимость тренировки(полтора часа): <?php echo $price ?>&#8381;</h4>
                        <h5>Выберите дату тренировки</h5>
                        <select class="coach__select_time" placeholder="Выберите дату" def>
                            <?php foreach ($dates as $key => $value) {
                                $valueDate = $value["full_date"];
                                $optionStr = $dayFromEnglishToRussian[$value["weekday"]] . ' ' . $value["mday"] . ' ' . $months_name[$value["mon"] - 1];
                                echo "<option value=\"$valueDate\" >$optionStr</option>";
                            } ?>
                        </select>
                        <div class="coach__times_list">
                            <?php
                            foreach ($dates as $dateKey => $dateValue) {
                                $dataDay = $dateValue["full_date"];
                                if ($dateKey != array_key_first($dates)) {
                                    echo "<div class=\"coach_times_item_wrapper coach_times_item_wrapper_hidden\" data-day=\"$dataDay\">";
                                } else echo "<div class=\"coach_times_item_wrapper\" data-day=\"$dataDay\">";
                                if (isset($timesDisabled[$dataDay])) {

                                    foreach ($times as $timeKey => $timeValue) {
                                        $itemClass = array_search($timeValue, $timesDisabled[$dataDay]) === false ? "coach_times_item" : "coach_times_item coach_times_item_disabled";
                                        echo "<div class=\"$itemClass\" data-time=\"$timeValue\">$timeValue</div>";
                                    }
                                } else {
                                    foreach ($times as $timeKey => $timeValue) {
                                        echo "<div class=\"coach_times_item\" data-time=\"$timeValue\">$timeValue</div>";
                                    }
                                }
                                echo "</div>";
                            } ?>

                        </div>

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