<?php
include_once './components/db.php';
include_once './components/headerAcc.php';

if ($_SESSION["type"] !== 'admin') {
    include_once './helpers/redirect.php';
    redirect('./index.php');
}

$coachesQuery = "SELECT id, name, price from coaches";
$result = mysqli_query($conn, $coachesQuery);
echo mysqli_error($conn);
$coachData = mysqli_fetch_all($result, MYSQLI_ASSOC)
?>

<script src="./js/deleteCoach.js" defer></script>

<div class="acc__body">
    <div class="container">
        <div class="acc__inner">
            <?php
            include './components/accSidebar.php';
            ?>
            <div class="acc__content coaches__wrapper">
                <div class="coaches__list_header">
                    <h3>Список тренеров</h3>
                    <a href="./coach_form.php" class="coaches__list_add_link custom__button">Добавить</a>
                </div>
                <table class="coaches__table">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Имя</td>
                            <td>Стоимость</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($coachData as $key => $value) {
                            echo "<tr>";
                            $id = $value["id"];
                            $name = $value["name"];
                            $price = $value["price"];
                            echo "<td>$id</td>";
                            echo "<td>$name</td>";
                            echo "<td>$price</td>";
                            echo "<td>
                            <div class=\"coach__list_btns_wrapper\">
                    <a class=\"coach__list_btn coach__list_btn_edit\" href=\"./coach_form.php?id=$id\">Редактировать</a>
                    <div class=\"coach__list_btn coach__list_btn_delete\" data-coachId=\"$id\" data-coachName=\"$name\">Удалить</div>
                </div>
                            
                            </td>";
                            echo "</tr>";
                        }


                        ?>
                    </tbody>
                </table>



                <div class="popup__background">

                    <div class="popup">
                        <div class="popup__close">
                            <span></span>
                            <span></span>
                        </div>
                        <form id="coach_form" class="popup_record_form" action="./record.php" method="POST">
                            <div>
                                <h2>Удалить тренера <span class="coachid_insert"></span></h2>
                            </div>
                            <div class="popup__coach_name"></div>
                            <div class="popup__btn_wrapper">
                                <button class="custom__button" type="submit">Подтвердить</button>
                                <button class="popup__close_btn custom__button" type="button">Отмена</button>
                            </div>
                        </form>
                    </div>
                </div>