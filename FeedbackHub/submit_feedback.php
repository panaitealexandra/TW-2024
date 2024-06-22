<?php
include 'config.php'; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form_id = $_POST['form_id'];
    $emotion = $_POST['emotion'];


    $query = "INSERT INTO feedback (form_id, emotion) VALUES ('$form_id', '$emotion')";

    if (mysqli_query($conn, $query)) {
        header('Location: Wellcome.html');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
