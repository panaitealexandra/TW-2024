<?php
include 'config.php';

// Verificăm dacă sesiunea pentru utilizator există deja
session_start();

// Verificăm dacă utilizatorul anonim este deja logat
if (isset($_SESSION['user_id'])) {
    header('Location: Profil.php');
    exit();
}

// Generăm un nume de utilizator anonim unic
$anon_username = 'anonim_' . uniqid();

// Generăm o adresă de email anonimă unică
$anon_email = uniqid() . '@anon.com';

// Generăm o parolă random (pentru scopuri de exemplu, dar nu este necesară pentru logarea anonimă)
$anon_password = password_hash(uniqid(), PASSWORD_DEFAULT);

// Înscriem utilizatorul anonim în baza de date
$sql = "INSERT INTO users (username, email, password) VALUES ('$anon_username', '$anon_email', '$anon_password')";

if ($conn->query($sql) === TRUE) {
    // Obținem ID-ul utilizatorului anonim nou creat
    $user_id = $conn->insert_id;

    // Începem sesiunea pentru utilizatorul anonim
    $_SESSION['user_id'] = $user_id;

    // Redirecționăm utilizatorul la pagina de profil
    header('Location: Profil.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
