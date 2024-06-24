<?php
session_start();
include 'config.php'; 

if (isset($_GET['logout'])) {
    $_SESSION = array();

    if (session_id() || isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 86400, '/');
    }

    session_destroy();

    header('Location: Wellcome.php');
    exit();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

$forms_query = "SELECT * FROM feedback_forms WHERE user_id = '$user_id'";
$forms_result = mysqli_query($conn, $forms_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleProfil.css">
    <title>Profile</title>
</head>

<body>
    <div class="user-wrapper">
        <div class="user-header"><h2>Profile</h2></div>
        <div class="user-main">
            <img src="pics/profil.jpg" alt="Profile Picture">
            <h1>Hello, <?php echo htmlspecialchars($user['username']); ?></h1>
            <form action="Profil.php" method="GET">
                <button type="submit" class="home" name="home">Home</button>
                <button type="submit" class="logout" name="logout">Logout</button>
            </form>
        </div>
        <div class="user-info">
            <div class="user-personal">
                <h1>About</h1>
                <p>Username: <?php echo htmlspecialchars($user['username']); ?></p>
                <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
            </div>
            <div class="user-actions">
                <div class="user-options">
                    <h2>Your Feedback Forms</h2>
                    <ul>
                        <?php while ($form = $forms_result->fetch_assoc()): ?>
                            <li>
                                <a href="feedback.php?id=<?php echo htmlspecialchars($form['id']); ?>">
                                    <?php echo htmlspecialchars($form['form_name']); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                    <a href="CreateForm.html">Create a new Feedback Form</a>
                    <a href="FeedbackForms.php">Tell us what you think!</a>

                </div>
            </div>

        </div>
    </div>

    <?php
    if (isset($_GET['home'])) {
        header('Location: Wellcome.php');
        exit();
    }
    ?>
</body>

</html>
