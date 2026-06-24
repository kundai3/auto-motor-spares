<?php
require 'config.php';

function getProducts() {
    global $conn;
    $query = "SELECT * FROM products";
    return mysqli_query($conn, $query);
}

function getProductById($id) {
    global $conn;
    $query = "SELECT * FROM products WHERE id='$id'";
    return mysqli_query($conn, $query);
}

function getCategories() {
    global $conn;
    $query = "SELECT * FROM categories";
    return mysqli_query($conn, $query);
}
?>
