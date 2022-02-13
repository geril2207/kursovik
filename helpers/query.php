<?php

function getUserQuery($login)
{
    return "SELECT * FROM users Where login = '" . $login . "'";;
}
