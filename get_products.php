<?php
$servername = "localhost"; // Change if needed
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "shopglam"; // Your database name

$conn = new mysqli("localhost", "root", "", "shopglam");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, price, category FROM products";
$result = $conn->query($sql);

$products = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

echo json_encode($products);
$conn->close();
?>
