<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "livingkost_notification";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, username, bukti_pembayaran, status FROM notifications";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

$notifications = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notifications[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($notifications);

$conn->close();
