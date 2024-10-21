<?php
include 'db.php';

session_start(); // Start the session to access cart data

// Assuming cart data is stored in session for simplicity
if (isset($_SESSION['cart'])) {
    $cartItems = [];
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($product) {
            $cartItems[] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity
            ];
        }
    }
    header('Content-Type: application/json');
    echo json_encode($cartItems);
} else {
    echo json_encode([]);
}
?>
