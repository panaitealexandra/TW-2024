<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id']; // Presupunem că utilizatorul este autentificat și id-ul său este stocat în sesiune.
    $form_name = $_POST['form_name'];
    $category = $_POST['category'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO feedback_forms (user_id, image, form_name, category, start_date, end_date) 
            VALUES ('$user_id', '$target_file', '$form_name', '$category', '$start_date', '$end_date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Formular creat cu succes!";
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
