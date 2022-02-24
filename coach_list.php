<?php
include './components/db.php';

include './helpers/query.php';
include './components/headerAcc.php';

$coachQuery = mysqli_query($conn, getCoachesQuery());

$resultCoaches = mysqli_fetch_all($coachQuery, MYSQLI_ASSOC);
$dates = [];
$today =  getdate();
for ($i = 1; $i < 10; $i++) {
    $dates[$i] = getdate(mktime(0, 0, 0, $today["mon"], $today["mday"] + $i, $today["year"]));
}
?>
<div class="acc__body">
    <div class="container">
        <div class="acc__inner">
            <?php
            include './components/accSidebar.php';
            ?>
            <div class="coaches__wrapper">
                <?php
                foreach ($resultCoaches as $key => $value) {

                    $imgStr = $value["img"];
                    $name = $value["name"];
                    $coachId = $value["id"];
                ?>
                    <div class="coaches__item_wrapper">
                        <h3><?php echo $name ?></h3>
                        <img src=<?php echo "./img/coaches/$imgStr" ?> alt='Картинка'>
                        <a class="coaches__item_link custom__button" href=<?php echo "./coach.php?id=$coachId" ?>>Выбрать</a>

                    </div>
                <?php
                }
                ?>


            </div>