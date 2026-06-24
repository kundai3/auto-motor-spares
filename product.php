<?php
include 'includes/header.php';
include 'includes/functions.php';

$search = "";

if(isset($_GET['search'])){
    $search = $_GET['search'];
}
?>

<section class="products-page">
    <h1>Our Products</h1>

    <div class="products">

        <?php
        global $conn;

        if($search != ""){
            $query = "SELECT * FROM products 
                      WHERE name LIKE '%$search%' 
                      OR part_number LIKE '%$search%'";
        } else {
            $query = "SELECT * FROM products";
        }

        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)){
        ?>

        <div class="product-card">
            <img src="assets/images/<?php echo $row['image']; ?>" alt="">
            <h3><?php echo $row['name']; ?></h3>
            <p>Part No: <?php echo $row['part_number']; ?></p>
            <p>$<?php echo $row['price']; ?></p>

            <a href="product-details.php?id=<?php echo $row['id']; ?>">
                View Details
            </a>
        </div>

        <?php } ?>

    </div>
</section>

<?php include 'includes/footer.php'; ?>
