<?php
session_start(); // Start the session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

// Add product to cart
if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id] += $quantity; // Increment quantity
} else {
    $_SESSION['cart'][$product_id] = $quantity; // Add new product
}

echo json_encode(['success' => true, 'cart' => $_SESSION['cart']]);
?>
