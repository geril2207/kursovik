<?php
include './components/db.php';

include './helpers/query.php';
include './components/headerAcc.php';

$coachQuery = mysqli_query($conn, getCoachesQuery());

$resultCoaches = mysqli_fetch_all($coachQuery, MYSQLI_ASSOC);


$userId = $_SESSION["id"];
$abonementsQuery = mysqli_query($conn, "SELECT * from abonements where user_id = $userId");


$abonementsResult = mysqli_fetch_all($abonementsQuery, MYSQLI_ASSOC)

?>
<div class="acc__body">
    <div class="container">
        <div class="acc__inner">
            <?php
            include './components/accSidebar.php';
            if (count($abonementsResult) == 0) {
                echo "<h3 class=\"coach_abonement\">Необходима клубная карта для записи к тренеру</h3>";
            }
            ?>
            <?php
            if (count($abonementsResult) != 0) {  ?>
                <div class="coaches__wrapper">
                    <?php foreach ($resultCoaches as $key => $value) {

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
                }
                ?>



                </div>