<?php
session_start();
session_unset();
session_destroy();
include_once './helpers/redirect.php';
redirect('./');
