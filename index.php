<?php 
include 'includes/header.php';
include 'includes/functions.php';
?>

<!-- HERO SECTION -->
<section class="hero">
    <img src="assets/images/banner.jpg" alt="Banner">

    <div class="hero-text">
        <h1>Find Genuine Auto Spare Parts</h1>
        <p>Your trusted supplier for all vehicle brands.</p>
    </div>
</section>

<!-- SEARCH SECTION -->
<section class="search-section">
    <h2>Search Your Part</h2>

    <form action="products.php" method="GET">
        <input type="text" name="search" placeholder="Search by part name...">
        <button type="submit">Search</button>
    </form>
</section>

<!-- BRANDS -->
<section class="brands">
    <h2>Popular Brands</h2>

    <div class="brand-container">
        <img src="assets/images/toyota.png" alt="Toyota">
        <img src="assets/images/nissan.png" alt="Nissan">
        <img src="assets/images/mazda.png" alt="Mazda">
        <img src="assets/images/honda.png" alt="Honda">
        <img src="assets/images/ford.png" alt="Ford">
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="featured-products">
    <h2>Featured Products</h2>

    <div class="products">

        <?php
        $products = getProducts();

        while($row = mysqli_fetch_assoc($products)){
        ?>
            <div class="product-card">
                <img src="assets/images/<?php echo $row['image']; ?>" alt="">
                <h3><?php echo $row['name']; ?></h3>
                <p>$<?php echo $row['price']; ?></p>

                <a href="product-details.php?id=<?php echo $row['id']; ?>">
                    View Details
                </a>
            </div>
        <?php } ?>

    </div>
</section>

<!-- WHY CHOOSE US -->
<section class="why-us">
    <h2>Why Choose Us</h2>

    <div class="why-container">
        <div>
            <h3>Genuine Parts</h3>
            <p>We supply trusted quality spare parts.</p>
        </div>

        <div>
            <h3>Affordable Prices</h3>
            <p>Competitive market prices.</p>
        </div>

        <div>
            <h3>Fast Delivery</h3>
            <p>Quick sourcing and delivery.</p>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
