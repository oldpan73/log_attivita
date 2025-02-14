<?php
require 'db.php';

$stmt = $pdo->query("SELECT activity_log.*, users.username FROM activity_log 
                     LEFT JOIN users ON activity_log.user_id = users.id 
                     ORDER BY timestamp DESC");
$logs = $stmt->fetchAll();

foreach ($logs as $log) {
    echo "<p>[{$log['timestamp']}] <b>{$log['username']}</b> - <i>{$log['action']}</i>: {$log['description']}</p>";
}
?>
