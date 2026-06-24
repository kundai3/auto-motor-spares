<?php
session_start();
include 'includes/config.php';
include 'includes/header.php';

if(isset($_POST['place_order'])){

    $customer_name = $_POST['customer_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $total_amount = 0;

    foreach($_SESSION['cart'] as $cart){

        $product_id = $cart['product_id'];
        $quantity = $cart['quantity'];

        $query = mysqli_query($conn, "SELECT * FROM products WHERE id='$product_id'");
        $product = mysqli_fetch_assoc($query);

        $subtotal = $product['price'] * $quantity;
        $total_amount += $subtotal;
    }

    mysqli_query($conn, "INSERT INTO orders 
    (customer_name, phone, address, total_amount, status) 
    VALUES 
    ('$customer_name','$phone','$address','$total_amount','Pending')");

    $order_id = mysqli_insert_id($conn);

    foreach($_SESSION['cart'] as $cart){

        $product_id = $cart['product_id'];
        $quantity = $cart['quantity'];

        $query = mysqli_query($conn, "SELECT * FROM products WHERE id='$product_id'");
        $product = mysqli_fetch_assoc($query);

        $price = $product['price'];

        mysqli_query($conn, "INSERT INTO order_items
        (order_id, product_id, quantity, price)
        VALUES
        ('$order_id','$product_id','$quantity','$price')");
    }

    unset($_SESSION['cart']);

    echo "<script>alert('Order placed successfully');</script>";
}
?>

<section class="checkout-page">
    <h1>Checkout</h1>

    <form method="POST">

        <input type="text" name="customer_name" placeholder="Full Name" required>

        <input type="text" name="phone" placeholder="Phone Number" required>

        <textarea name="address" placeholder="Delivery Address" required></textarea>

        <button type="submit" name="place_order">
            Place Order
        </button>

    </form>
</section>

<?php include 'includes/footer.php'; ?>
