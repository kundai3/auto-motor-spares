<?php
session_start();
include 'includes/header.php';
include 'includes/functions.php';

if(isset($_POST['add_to_cart'])){

    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = [
        'product_id' => $product_id,
        'quantity' => $quantity
    ];
}
?>

<section class="cart-page">
    <h1>Your Cart</h1>

    <?php
    $total = 0;

    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){

        foreach($_SESSION['cart'] as $cart){

            $product = getProductById($cart['product_id']);
            $row = mysqli_fetch_assoc($product);

            $subtotal = $row['price'] * $cart['quantity'];
            $total += $subtotal;
    ?>

        <div class="cart-item">
            <img src="assets/images/<?php echo $row['image']; ?>" width="100">

            <h3><?php echo $row['name']; ?></h3>

            <p>Price: $<?php echo $row['price']; ?></p>

            <p>Quantity: <?php echo $cart['quantity']; ?></p>

            <p>Subtotal: $<?php echo $subtotal; ?></p>
        </div>

    <?php
        }
    ?>

    <h2>Total: $<?php echo $total; ?></h2>

    <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>

    <?php
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>
</section>

<?php include 'includes/footer.php'; ?>
