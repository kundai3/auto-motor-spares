<?php
include 'includes/header.php';
include 'includes/functions.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $product = getProductById($id);
    $row = mysqli_fetch_assoc($product);
}
?>

<section class="product-details">

    <div class="product-image">
        <img src="assets/images/<?php echo $row['image']; ?>" alt="">
    </div>

    <div class="product-info">
        <h1><?php echo $row['name']; ?></h1>

        <p><strong>Part Number:</strong> <?php echo $row['part_number']; ?></p>

        <p><strong>Price:</strong> $<?php echo $row['price']; ?></p>

        <p><strong>Available Stock:</strong> <?php echo $row['quantity']; ?></p>

        <p><strong>Description:</strong></p>
        <p><?php echo $row['description']; ?></p>

        <form action="cart.php" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">

            <input type="number" name="quantity" value="1" min="1">

            <button type="submit" name="add_to_cart">
                Add To Cart
            </button>
        </form>
    </div>

</section>

<?php include 'includes/footer.php'; ?>
