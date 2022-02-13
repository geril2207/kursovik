<?php
include './components/db.php';

if (!isset($_SESSION['auth'])) {
    include './helpers/redirect.php';
    redirect('./');
}
include './components/headerAcc.php';
