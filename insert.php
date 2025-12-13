<?php
// Include the DB config file
include 'db_config.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    // Prepare SQL query
    $sql = "INSERT INTO students (name, email, number, message) 
            VALUES ('$name', '$email', '$number', '$message')";

    // Run query
    if (mysqli_query($conn, $sql)) {
        // Redirect to contact.php with success status
        header("Location: contact.php?status=success");
        exit();
    } else {
        // Redirect with error
        header("Location: contact.php?status=error");
        exit();
    }
}
?>
