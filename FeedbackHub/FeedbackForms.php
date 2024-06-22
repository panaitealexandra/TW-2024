<?php
include 'config.php';

$query = "SELECT * FROM feedback_forms WHERE end_date >= CURDATE()"; 
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Forms</title>
    <link rel="stylesheet" href="styleFeedbackForms.css">
</head>
<body>
    <div class="container">
        <h1>Feedback Forms</h1>
        <div class="forms-list">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="form">';
                    echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Form Image">';
                    echo '<h2>' . htmlspecialchars($row['form_name']) . '</h2>';
                    echo '<p><strong>Category:</strong> ' . htmlspecialchars($row['category']) . '</p>';
                    echo '<p><strong>Feedback Period:</strong> ' . htmlspecialchars($row['start_date']) . ' to ' . htmlspecialchars($row['end_date']) . '</p>';
                    echo '<a href="feedback.php?id=' . htmlspecialchars($row['id']) . '">Provide Feedback</a>';
                    echo '</div>';
                }
            } else {
                echo '<p>No feedback forms available.</p>';
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>
