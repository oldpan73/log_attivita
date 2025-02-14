<?php
require 'db.php';
require 'functions.php';

session_start();
$user_id = $_SESSION['user_id'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && $user_id) {
    $id = $_POST['id'];
    $new_data = $_POST['new_data'];

    $stmt = $pdo->prepare("UPDATE esempio_tabella SET campo = ? WHERE id = ?");
    if ($stmt->execute([$new_data, $id])) {
        logActivity($user_id, "UPDATE", "Aggiornato record con ID: $id a $new_data");
        echo "Record aggiornato!";
    }
}
?>
