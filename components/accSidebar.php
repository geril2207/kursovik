    <div class="acc__sidebar">
        <a class="acc__sidebar_item" href="./profile.php">
            Аккаунт
        </a>
        <a class="acc__sidebar_item" href="./abonement.php">
            Абонемент
        </a>
        <a class="acc__sidebar_item" href="./entry.php">
            Запись к тренеру
        </a>
        <?php
        if ($_SESSION["type"] === 'admin') {
            echo ' <a class="acc__sidebar_item" href="./coaches.php">
                Управление тренерами
            </a>';
        }
        ?>
    </div>