<?php
include '../config/config.php';
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: Profil.php');
    exit();
}

$anon_username = 'anonim_' . uniqid();

$anon_email = uniqid() . '@anon.com';

$anon_password = password_hash(uniqid(), PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, email, password) VALUES ('$anon_username', '$anon_email', '$anon_password')";

if ($conn->query($sql) === TRUE) {
    $user_id = $conn->insert_id;

    $_SESSION['user_id'] = $user_id;

    header('Location: Profil.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
