<?php
session_start();
include './helpers/notAuthRedirect.php';
include './components/headerAcc.php';

?>
<div class="acc__body">
    <div class="container">
        <div class="acc__inner">
            <?php
            require_once './components/accSidebar.php';
            ?>