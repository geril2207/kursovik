<?php

function getUserQuery($id, $param = "id")
{
    return "SELECT * FROM users Where $param = '" . $id . "'";
}

function getCoachesQuery($id = null)
{
    if (isset($id)) {
        return "SELECT * FROM coaches Where id = '" . $id . "'";
    }
    return "SELECT * FROM coaches";
}

function getCoachDates($id = null)
{
    if (isset($id)) {
        return "SELECT id,date,time FROM records Where coach_id = '" . $id . "'";
    }
    return "SELECT * FROM records";
}
