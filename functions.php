<?php
require 'db.php';

function logActivity($user_id, $action, $description = null) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO activity_log (user_id, action, description) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $action, $description]);
}
?>
