<?php

function getUserQuery($id, $param)
{
    return "SELECT * FROM users Where $param = '" . $id . "'";;
}
