<?php
require 'db.php';
require 'functions.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        logActivity($user['id'], "LOGIN", "Utente $username ha effettuato l'accesso");
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Credenziali errate!";
    }
}
?>
