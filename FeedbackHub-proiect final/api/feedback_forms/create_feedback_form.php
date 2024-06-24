<?php
session_start();  

include '../../config/config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../users/login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id']; 
    $form_name = $_POST['form_name'];
    $category = $_POST['category'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    $target_save = "../../public/uploads/";

    $target_file_bd = "uploads/" . basename($_FILES["image"]["name"]); 

    $target_file = $target_save . basename($_FILES["image"]["name"]);

    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO feedback_forms (user_id, image, form_name, category, start_date, end_date) 
            VALUES ('$user_id', '$target_file_bd', '$form_name', '$category', '$start_date', '$end_date')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../../public/FeedbackForms.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
