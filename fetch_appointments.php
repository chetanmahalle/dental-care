<?php
header('Content-Type: application/json');
$host = "localhost";
$user = "root";
$password = "";
$dbname = "dental";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed']));
}

$sql = "SELECT id, name, email, phone, message, date FROM appointments ORDER BY date DESC";
$result = $conn->query($sql);

$appointments = [];
while ($row = $result->fetch_assoc()) {
    $appointments[] = $row;
}

echo json_encode($appointments);
$conn->close();
?>
