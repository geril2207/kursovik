<?php
session_start();
// CLEAR DB CONNECT
// Get Heroku ClearDB connection information
// $cleardb_url = parse_url("mysql://b9be18d5010739:e3a4038f@eu-cdbr-west-02.cleardb.net/heroku_bfc299699a1f095?");
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"], 1);
// $active_group = 'default';
// $query_builder = TRUE;
// $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

$conn = mysqli_connect('localhost', 'root', '', 'kursovik');
