<?
include './components/db.php';
header('Content-Type: application/json; charset=utf-8');
$id = $_POST["id"];
$sqlQuery = "DELETE from abonements where id = \"$id\"";
$result = mysqli_query($conn, $sqlQuery);
if (!$result) {
    $data = ["success" => false, "message" => mysqli_error($conn)];
    echo json_encode($data);
} else {
    echo json_encode(["success" => true, "message" => 'Заказ абонемента удален']);
}
