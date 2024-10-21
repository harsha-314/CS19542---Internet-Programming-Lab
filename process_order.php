<?php
include 'db.php';
session_start();

// Check if order details are received
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    
    // Here you would process the order (e.g., save to the database)
    // Example: INSERT INTO orders (name, address, email, ...) VALUES (?, ?, ?, ...)

    // Clear the cart after order confirmation
    unset($_SESSION['cart']);

    // Redirect to a thank you or confirmation page
    header('Location: thank_you.php');
    exit();
}
?>
