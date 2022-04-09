<?php
include '../db/connection.php';
$product_id = $_GET['id'];
$sql = "SELECT * FROM product WHERE productID = '$product_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$product_image = $row['product_image'];
$product_name = $row['name'];
$product_price = $row['sale_price'];
$product_description = $row['description'];
$product_stock = $row['stock'];
$product_category = $row['category'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Product Deatils</title>
    <link rel="icon" href="../res/img/logo.svg" type="image/png"/>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
            integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
            crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../style/select_text.css"/>
</head>
<style>

    @font-face {
        font-family: 'cairo';
        src: url('../res/fonts/Cairo.ttf') format('ttf');
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-image: radial-gradient(circle farthest-corner at 10% 20%, rgb(129, 182, 255) 0%, rgb(31, 125, 255) 90.1%);
        font-family: Cairo;
        display: grid;
        place-items: center;
        min-height: 100vh;
    }

    .container {
        background-color: #fff;
        position: relative;
        display: grid;
        grid-template-columns: 300px 600px;
        border-radius: 5px;
        box-shadow: 0 15px 20px rgba(0, 0, 0, 0.356);
    }

    .container img {
        width: 300px;
        height: 300px;
        padding: 12px;
        object-fit: contain;
        border-radius: 5px 0 0 5px;
    }

    .container .btn {
        position: absolute;
        bottom: -20px;
        right: -20px;
        border: none;
        outline: none;
        display: flex;
        align-items: center;
        background-color: #fc9400;
        color: #fff;
        padding: 22px 45px;
        font-size: 1rem;
        text-transform: uppercase;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.294);
    }

    .container .btn i {
        margin-right: 20px;
        font-size: 1.5rem;
    }

    .container__text {
        padding: 40px 40px 0;
    }

    .container__text h1 {
        color: #351897;
        font-weight: 400;
    }

    .container__text .container__text__star span {
        font-size: 0.8rem;
        color: #ffa800;
        margin: -5px 0 20px;
    }

    .container__text p {
        font-size: 0.9rem;
    }

    .container__text .container__text__timing {
        display: flex;
        margin: 20px 0 10px;
    }

    .container__text .container__text__timing .container__text__timing_time {
        margin-right: 40px;
    }

    .container__text .container__text__timing h2 {
        margin-bottom: 5px;
        font-size: 1rem;
        font-weight: 400;
        color: #818189;
    }

    .container__text .container__text__timing p {
        color: #351897;
        font-weight: bold;
        font-size: 1.2rem;
    }

</style>
<body>
<div class="container">
    <img <?php echo 'src="../uploads/' . $product_image . '"' ?> class="product-image" alt="product image"/>
    <div class="container__text">
        <h1><?php echo $product_name ?></h1>
        <div class="container__text__star">
            <!-- you can add this class="fa fa-star-o checked" to span -->
            <span>&#9734;</span>
            <span>&#9734;</span>
            <span>&#9734;</span>
            <span>&#9734;</span>
            <span>&#9734;</span>
        </div>
        <p>
            <?php echo $product_description ?>
        </p>
        <div class="container__text__timing">
            <div class="container__text__timing_time">
                <h2>Price</h2>
                <p>
                    $<?php echo $product_price ?>
                </p>
            </div>
            <div class="container__text__timing_time">
                <h2>Category</h2>
                <p>
                    <?php echo $product_category ?>
                </p>
            </div>
            <div class="container__text__timing_time">
                <h2>Stock</h2>
                <p>
                    <?php echo $product_stock ?>
                </p>
            </div>
        </div>
        <button class="btn" onclick="history.back()"><i class="fa fa-arrow-left"></i>Back Home</button>
    </div>
</div>
<script src="../node_modules/zooming/build/zooming.min.js"></script>
<script>
    //zoom the image
    const img = document.querySelector('.product-image');
    const zoom = new Zooming();
    zoom.listen(img);

    function goBack() {
        window.location.href = "index.php";
    }
</script>
</body>
</html>