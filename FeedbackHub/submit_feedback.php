<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("User ID not found in session.");
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_id = $_POST['form_id'];
    $emotion = $_POST['emotion'];
    $feedback_text = $_POST['feedback_text'];

    // Verificăm dacă există deja un feedback pentru această combinație de user_id și form_id
    $check_query = "SELECT * FROM user_feedback WHERE user_id = ? AND form_id = ?";
    $check_stmt = $conn->prepare($check_query);

    if ($check_stmt === false) {
        die("Error preparing the statement: " . htmlspecialchars($conn->error));
    }

    $check_stmt->bind_param('ii', $user_id, $form_id);
    $check_stmt->execute();

    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $message = "Feedback-ul a fost deja trimis pentru acest formular.";
    } else {
         //Incrementăm contorul emoției
        $count_query = "INSERT INTO feedback_counts (emotion, form_id, count) VALUES (?, ?, 1)
                        ON DUPLICATE KEY UPDATE count = count + 1, form_id = VALUES(form_id)";

        $count_stmt = $conn->prepare($count_query);
         
        if ($count_stmt === false) {
            die("Error preparing the statement: " . htmlspecialchars($conn->error));
        }

        $count_stmt->bind_param('si', $emotion, $form_id);

        if ($count_stmt->execute()) {
            // Salvăm feedback-ul utilizatorului în tabelul user_feedback
            $user_feedback_query = "INSERT INTO user_feedback (user_id, form_id, emotion, feedback_date, feedback_text) VALUES (?, ?, ?, NOW(), ?)";
            $user_feedback_stmt = $conn->prepare($user_feedback_query);

            if ($user_feedback_stmt === false) {
                die("Error preparing the statement: " . htmlspecialchars($conn->error));
            }

            $user_feedback_stmt->bind_param('iiss', $user_id, $form_id, $emotion, $feedback_text);

            if ($user_feedback_stmt->execute()) {
                $message = "Feedback completat cu succes!";
            } else {
                $message = "Eroare la salvarea feedback-ului utilizatorului: " . htmlspecialchars($user_feedback_stmt->error);
            }

            $user_feedback_stmt->close();
        } else {
            $message = "Eroare la incrementarea contorului: " . htmlspecialchars($count_stmt->error);
        }

        $count_stmt->close();
    }

    $check_stmt->close();
    $conn->close();

    // Redirecționăm înapoi către formular cu un mesaj de succes
    header("Location: feedback.php?id=$form_id&message=" . urlencode($message));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Feedback</title>
</head>
<body>
    <?php
    if (!empty($message)) {
        echo '<p>' . htmlspecialchars($message) . '</p>';
    }
    ?>
</body>
</html>
