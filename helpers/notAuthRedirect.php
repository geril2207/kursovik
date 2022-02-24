<?php

if (!isset($_SESSION['auth'])) {
    include './helpers/redirect.php';
    redirect('./');
}
