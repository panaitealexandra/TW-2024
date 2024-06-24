<?php
include 'config.php';

if (!isset($_GET['id'])) {
    die("Invalid Form ID.");
}

$form_id = $_GET['id'];

$query = "SELECT * FROM feedback_forms WHERE id = ?";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    die("Error preparing the statement: " . htmlspecialchars($conn->error));
}

$stmt->bind_param('i', $form_id);
$stmt->execute();

$result = $stmt->get_result();
$form = $result->fetch_assoc();

if (!$form) {
    die("Form not found.");
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <h1>Provide Feedback</h1>
        <img src="<?php echo htmlspecialchars($form['image']); ?>" alt="Form Image" style="width:300px;">
        <h3>Form Name: <?php echo htmlspecialchars($form['form_name']); ?></h3>
        <h3>Category: <?php echo htmlspecialchars($form['category']); ?></h3>
        <p>Feedback Period: <?php echo htmlspecialchars($form['start_date']); ?> to <?php echo htmlspecialchars($form['end_date']); ?></p>
        
        <?php
        if (isset($_GET['message'])) {
            echo '<p>' . htmlspecialchars($_GET['message']) . '</p>';
        }
        ?>
        
        <form action="submit_feedback.php" method="post">
            <input type="hidden" name="form_id" value="<?php echo htmlspecialchars($form_id); ?>">
            
            

            <?php
            if (!(isset($_GET['message']))) {
                echo '
                <label for="emotion">Select your emotion:</label>
            <select id="emotion" name="emotion" required>
                <option value="joy">Joy</option>
                <option value="trust">Trust</option>
                <option value="fear">Fear</option>
                <option value="surprise">Surprise</option>
                <option value="sadness">Sadness</option>
                <option value="disgust">Disgust</option>
                <option value="anger">Anger</option>
                <option value="anticipation">Anticipation</option>
            </select>
            <label for="feedback_text">Your Feedback:</label>
            <textarea id="feedback_text" name="feedback_text" required></textarea>
            <button type="submit">Submit Feedback</button>';
            }
            ?>
        </form>
       
    </div>
</body>
</html>
