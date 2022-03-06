<?php
include_once './components/db.php';
include './components/headerAcc.php';
$name = "";
$img = "";
$price = "";
$id = null;
var_dump($_SERVER);
if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    include_once './helpers/redirect.php';
    $delete_id = $_REQUEST["id"];
    var_dump($_REQUEST);
    // $coach_delete_query = "DELETE FROM coaches where id ="
}
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    include_once './helpers/redirect.php';
    if (isset($_POST["coach_id"]) && $_POST["coach_id"] != null) {
        include_once './helpers/query.php';
        $userQuery = getCoachesQuery($_POST["coach_id"]);
        $resultQuery = mysqli_query($conn, $userQuery);
        $result = mysqli_fetch_assoc($resultQuery);
        $coach_id = mysqli_real_escape_string($conn, $_POST["coach_id"]);
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $price = mysqli_real_escape_string($conn, $_POST["price"]);
        if ($_FILES["img"]["name"] !== "" && $_FILES["img"]["tmp_name"] !== "") {
            $exploded_file_name = explode('.', $_FILES["img"]["name"]);
            $file_name = mktime(0) . '.' . $exploded_file_name[array_key_last($exploded_file_name)];
            move_uploaded_file($_FILES["img"]["tmp_name"], "./img/coaches/$file_name");
            $old_file = $result["img"];
            unlink("./img/coaches/$old_file");
            $coach_update_query = "UPDATE coaches set name = \"$name\", img = \"$file_name\", price = \"$price\"  where id = \"$coach_id\"";
            mysqli_query($conn, $coach_update_query);
            if ($error = mysqli_error($conn)) {
                echo "<script>alert(\"Что-то пошло не так $error\")</script>";
            } else {
                redirect('./coaches.php');
            }
        } else {
            $coach_update_query = "UPDATE coaches set name = \"$name\", price = \"$price\"  where id = \"$coach_id\"";
            mysqli_query($conn, $coach_update_query);
            if ($error = mysqli_error($conn)) {
                echo "<script>alert(\"Что-то пошло не так $error\")</script>";
            } else {
                redirect('./coaches.php');
            }
        }
    } else {
        $file_name = "default.jfif";
        if ($_FILES["img"]["name"] !== "" && $_FILES["img"]["tmp_name"] !== "") {
            $exploded_file_name = explode('.', $_FILES["img"]["name"]);
            $file_name = mktime(0) . '.' . $exploded_file_name[array_key_last($exploded_file_name)];
            move_uploaded_file($_FILES["img"]["tmp_name"], "./img/coaches/$file_name");
        }
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $price = mysqli_real_escape_string($conn, $_POST["price"]);
        $add_coach_query = "INSERT INTO coaches(name, img, price) VALUES (\"$name\", \"$file_name\", \"$price\")";
        $result = mysqli_query($conn, $add_coach_query);
        if ($error = mysqli_error($conn)) {
            echo "<script>alert(\"Что-то пошло не так $error\")</script>";
        } else {
            redirect('./coaches.php');
        }
    }
}


if (isset($_GET["id"]) && $_GET["id"] !== '') {
    include_once './helpers/query.php';
    $userQuery = getCoachesQuery($_GET["id"]);
    $resultQuery = mysqli_query($conn, $userQuery);
    $result = mysqli_fetch_assoc($resultQuery);
    $name = $result["name"];
    $name = str_replace(" ", "&nbsp;", $name);
    $img = $result["img"];
    $price = $result["price"];
    $id = $result["id"];
}

?>
<script src="./js/showImg.js" defer></script>

<div class="acc__body">
    <div class="container">
        <div class="acc__inner">
            <?php
            include './components/accSidebar.php';
            ?>
            <div class="acc__content">
                <form class="acc__form" id="form" action="./coach_form.php" method="POST" enctype="multipart/form-data">
                    <input name="coach_id" type="hidden" value=<?php echo $id ?>>
                    <h2>Создание тренера</h2>
                    <div class="profile__input_section">
                        <h4>Имя</h4>
                        <?php var_dump($name) ?>
                        <input class="custom__input" name="name" type="text" required placeholder="Введите имя" value=<?= str_replace('"', '&quot;', $name) ?>>
                    </div>
                    <div class="profile__input_section">
                        <h4>Стоимость тренировки</h4>
                        <input class="custom__input" name="price" type="number" required placeholder="Введите стоимость" value=<?php echo $price ?>>
                    </div>

                    <div class="profile__input_section">
                        <h4>Фото</h4>
                        <label class="file_input" for="file">Выберите файл</label>

                        <input id="file" value="123.jpg" name="img" type="file" hidden accept="image/*" placeholder="Введите стоимость">
                    </div>

                    <div class="coach_create_show_img"></div>


                    <div class="profile__input_section profile__btn_section">
                        <button class="custom__button" type="submit">Сохранить</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>