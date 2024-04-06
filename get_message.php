<?php
include("connection.php");

$sql = "SELECT username, content, timestamp FROM messages ORDER BY timestamp DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($messages);
?>
