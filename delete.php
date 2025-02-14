<?php
require 'db.php';
require 'functions.php';

session_start();
$user_id = $_SESSION['user_id'] ?? null;

if (isset($_GET['id']) && $user_id) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM esempio_tabella WHERE id = ?");
    if ($stmt->execute([$id])) {
        logActivity($user_id, "DELETE", "Eliminato record con ID: $id");
        echo "Record eliminato!";
    }
}
?>
