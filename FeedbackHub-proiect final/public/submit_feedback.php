
<?php
include '../config/config.php';
session_start();

function createAnonymousUser($conn) {
    $anon_username = 'anon_' . uniqid();
    $anon_email = $anon_username . '@example.com';
    $anon_password = password_hash('anonymous', PASSWORD_DEFAULT);

    $insert_user_query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_user_query);
    if ($stmt === false) {
        die("Error preparing the statement: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param('sss', $anon_username, $anon_email, $anon_password);
    if ($stmt->execute()) {
        return $conn->insert_id; 
    } else {
        die("Error creating anonymous user: " . htmlspecialchars($stmt->error));
    }

    $stmt->close();
}

if (!isset($_SESSION['user_id'])) {
    $check_anon_query = "SELECT id FROM users WHERE username LIKE 'anon_%' ORDER BY id DESC LIMIT 1";
    $result = $conn->query($check_anon_query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
    } else {
        $_SESSION['user_id'] = createAnonymousUser($conn);
    }
}

$user_id = $_SESSION['user_id'];

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_id = $_POST['form_id'];
    $emotion = $_POST['emotion'];
    $feedback_text = $_POST['feedback_text'];

    $check_query = "SELECT * FROM user_feedback WHERE user_id = ? AND form_id = ?";
    $check_stmt = $conn->prepare($check_query);

    if ($check_stmt === false) {
        die("Error preparing the statement: " . htmlspecialchars($conn->error));
    }

    $check_stmt->bind_param('ii', $user_id, $form_id);
    $check_stmt->execute();

    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $message = "Feedback has already been submitted for this form.";
    } else {
        $count_query = "INSERT INTO feedback_counts (emotion, form_id, count) VALUES (?, ?, 1)
                        ON DUPLICATE KEY UPDATE count = count + 1, form_id = VALUES(form_id)";

        $count_stmt = $conn->prepare($count_query);
         
        if ($count_stmt === false) {
            die("Error preparing the statement: " . htmlspecialchars($conn->error));
        }

        $count_stmt->bind_param('si', $emotion, $form_id);

        if ($count_stmt->execute()) {
            $user_feedback_query = "INSERT INTO user_feedback (user_id, form_id, emotion, feedback_date, feedback_text) VALUES (?, ?, ?, NOW(), ?)";
            $user_feedback_stmt = $conn->prepare($user_feedback_query);

            if ($user_feedback_stmt === false) {
                die("Error preparing the statement: " . htmlspecialchars($conn->error));
            }

            $user_feedback_stmt->bind_param('iiss', $user_id, $form_id, $emotion, $feedback_text);

            if ($user_feedback_stmt->execute()) {
                $message = "Feedback completed successfully!";
            } else {
                $message = "Error saving user feedback: " . htmlspecialchars($user_feedback_stmt->error);
            }

            $user_feedback_stmt->close();
        } else {
            $message = "Counter increment error: " . htmlspecialchars($count_stmt->error);
        }

        $count_stmt->close();
    }

    $check_stmt->close();
    $conn->close();

    header("Location: Feedback.php?id=$form_id&message=" . urlencode($message));
    exit();
}
?>


