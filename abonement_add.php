<?php
include './components/db.php';
header('Content-Type: application/json; charset=utf-8');
$id = $_SESSION["id"];
$abonement = $_POST["abonement"];
$sqlQuery = "INSERT into abonements (user_id,type,status) values('$id','$abonement', 'Обработка')";
$result = mysqli_query($conn, $sqlQuery);
if (!$result) {
    $data = ["success" => false, "message" => mysqli_error($conn)];
    echo json_encode($data);
} else {
    echo json_encode(["success" => true, "message" => 'Абонемент добавлен']);
}
