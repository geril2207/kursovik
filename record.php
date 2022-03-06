<?php
include './components/db.php';
header('Content-Type: application/json; charset=utf-8');
$sqlQuery = 'INSERT INTO records (date, time, coach_id, user_id) VALUES ("' . mysqli_real_escape_string($conn, $_POST['date']) . '", "' . mysqli_real_escape_string($conn, $_POST['time']) . '", "' .  mysqli_real_escape_string($conn, $_POST['coach_id']) . '", "' .  mysqli_real_escape_string($conn, $_SESSION['id']) . '")';
$result = mysqli_query($conn, $sqlQuery);
if (!$result) {
    $data = ["success" => false, "message" => mysqli_error($conn)];
    echo json_encode($data);
} else {

    echo json_encode(["success" => true, "message" => 'Запись добавлена']);
}
