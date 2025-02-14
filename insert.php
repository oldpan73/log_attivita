<?php
require 'db.php';
require 'functions.php';

session_start();
$user_id = $_SESSION['user_id'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && $user_id) {
    $data = $_POST['data'];

    $stmt = $pdo->prepare("INSERT INTO esempio_tabella (campo) VALUES (?)");
    if ($stmt->execute([$data])) {
        logActivity($user_id, "INSERT", "Inserito nuovo record: $data");
        echo "Record inserito!";
    }
}
?>
