<?php
session_start();
include '../db/connection.php';
include '../client/functions.php';


$currentPage = 1;

if (isset($_POST['page'])) {
    $currentPage = $_POST['page'];
}

$totalProducts = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `product` WHERE `stock` > 0"));
$nbProductsInPage = 16;
$nbPages = ceil($totalProducts / $nbProductsInPage);
$limit = 0;

if ($currentPage > 1) {
    $limit = ($currentPage - 1) * $nbProductsInPage + ($currentPage - 2);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../style/index.css">
    <title>TexGear</title>
    <?php
    echo "<script language='JavaScript'>var products = [];\n var product = [];\n filterOpt = false; sortOpt = false</script>";
    ?>
    <style>
        body {
            background-color: rgba(255, 255, 255, 0.95);
            /* background: linear-gradient(-45deg, #006bff, #33e4ff, #006bff, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;*/
            height: 100vh;
        }

        .dec, .inc {
            background: #1f7dff;
            color: #fff;
            padding: 4px 8px;
            display: inline-block;
            font-size: 12px;
            outline: none;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .dec:hover, .inc:hover {
            background: #5a9eff;
            cursor: pointer;
        }

        .dec {
            margin-left: 12px;
        }

        .inc {
            margin-right: 12px;
        }

        .total-input-cart {
            background: transparent;
            border: none;
            color: #fff;
            width: 100px;
            text-align: center;
        }

        .full-input-qnt {
            display: flex;
            justify-content: center;
            margin-top: 16px;
        }

        .product-qnt {
            margin: 0 4px;
            width: 60px;
            text-align: center;
        }

        main .banner {
            background: linear-gradient(to right, #7ceaff, #65C7F7, #0052D4);
        }

        @keyframes gradient {
            0% {
                background-position: 0 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0 50%;
            }
        }


        .closebtn {
            background-color: #f8c822;
            padding: 10px;
        }

        .removeBtn {
            outline: none;
            border: none;
            background: none;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
            text-align: center;
            font-weight: bold;
        }

        span {
            color: #fff;
        }

        .nav-item {
            transition: all 0.3s ease-in-out;
            border-radius: 6px;
        }

        .nav-item:hover {
            background-color: #1f7dff;
            border-radius: 6px;
        }

        .txt {
            color: #fff;
        }
    </style>

</head>
<body>
<?php
if (isset($_SESSION['customerID'])) {
    echo '<script defer>
        isLogin = true;
 </script>';
} else {
    echo '<script defer>
          isLogin = false; 
 </script>';
}
?>
<!-- bootstrap navbar  -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#" class="logo navbar-brand fw-bold"><span>Tex</span><span style="color: #28C7FA">GEAR</span></a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#products-all">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php" target="_blank">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php" target="_blank">Admin</a>
                </li>
            </ul>
            <div class="basket p-1">
                <button class="closebtn btn btn-warning me-3 shadow position-relative" onclick="showCart()">
                    <img src="../res/img/shoppingcart.png" style="width: 30px">
                    <span class="NbOrders hidden position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                          id="Badge">
                        0
                    </span>
                </button>
            </div>
            <div class="toggle"></div>
        </div>
    </div>
</nav>

<main>
    <div class="banner" id="banner">

    </div>
    <script defer>
        const banner = document.getElementById('banner');
        if (isLogin == true) {
            banner.innerHTML =
                '<h1 class="">Welcome <?php
                    echo $_SESSION['full_name'];
                    ?></h1>' +
                '<p class="">Enjoy a safe, convenient shopping experience</p>' +
                '<button id="log-out" class="" style="width: 100px;" onclick="showLogOut()">Log out</button>'
            ;
        } else {
            banner.innerHTML =
                '<h1 class="">Welcome to TexGEAR: E-commerce web app</h1>' +
                '<p class="">Enjoy a safe, convenient shopping experience</p>' +
                '<button id="log-in" class="" style="width: 100px;" onclick="showLogin()">Login</button>' +
                '<button id="register" class="" style="width: 100px;" onclick="showRegistration()">Register</button>'
            ;
        }
    </script>
    <?php include '../client/categories_dropdown.php'; ?>

    <div class="products">
        <div class="categories" id="categories"></div>
        <div class="pages">
            <form action="index.php" method="post" id="pages">
                <style>
                    #slider {
                        margin: 2em auto;
                        width: 100%;
                        overflow: hidden;
                    }

                    #slider-nav {
                        margin: 1em 0;
                        text-align: center;
                    }

                    #slider-nav label {
                        display: inline-block;
                        width: 2em;
                        height: 2em;
                        border: 1px solid #ccc;
                        text-align: center;
                        text-decoration: none;
                        color: #000;
                        display: inline-block;
                        line-height: 2;
                        margin: 0.5em;
                    }

                    #slider-nav label:hover {
                        cursor: pointer;
                    }

                    #slider-nav input[type="radio"] {
                        display: none;
                    }

                    #slider-nav input[type="radio"]:checked + label {
                        border-color: #307cff;
                        color: white;
                        background-color: #59adff;
                    }
                </style>
                <div id="slider">
                    <div id="slider-nav"></div>
                </div>
                <script>
                    var pages_form = document.getElementById('pages');
                    var slider_nav = document.getElementById('slider-nav');
                    var nbPages = <?php echo $nbPages; ?>;
                    var currPage = <?php echo $currentPage; ?>;
                    var buttons = "";

                    if (nbPages > 1) {
                        for (let i = 0; i < nbPages; i++) {
                            if (i == currPage - 1) {
                                buttons += '<input type="radio" class="pages_radios" name="page" id="' + (i+1) + '" value="' + (i+1) + '" checked>' +
                                    '<label for="' + (i+1) + '" class="page_link">' + (i+1) + '</label>'
                                ;
                            } else {
                                buttons += '<input type="radio" class="pages_radios" name="page" id="' + (i+1) + '" value="' + (i+1) + '">' +
                                    '<label for="' + (i+1) + '" class="page_link">' + (i+1) + '</label>'
                                ;
                            }
                        }
                        slider_nav.innerHTML = buttons;
                    }

                    var pages_links = slider_nav.querySelectorAll('label');
                    var pages_radios = document.getElementsByClassName('pages_radios');

                    for (let i = 0; i < pages_links.length; i++) {
                        pages_links[i].addEventListener("click", function (e) {
                            pages_radios[i].checked = true;
                            pages_form.submit();
                        })
                    }
                </script>
            </form>
        </div>
    </div>

    <script language="JavaScript">
        function displayProducts(products) {
            const products_box = document.getElementById("categories");
            var products_inner_html = "";
            if (products.length > 0) {
                for (var i = 0; i < products.length; i++) {
                    products_inner_html +=
                        '<!-- PRODUCT CARD -->' +
                        '<div class="products shadow-lg mb-5 bg-body rounded">' +
                        '   <div class="card">' +
                        '      <div class="product-image">' +
                        '           <img id="product-image" src="' + products[i][3] + '" alt="product image">' +
                        '       </div>' +
                        '       <h1 class="product-name">' + products[i][0] +
                        '       </h1>' +
                        '       <p>Here\'s some description...</p>' +
                        '       <div class="product-price">' +
                        '           <span class="txt">Price : </span><span class="txt" id="base-price"' +
                        '                                           style="font-weight: bold">' + Intl.NumberFormat("en-US", {
                            style: "currency",
                            currency: "USD"
                        }).format(products[i][2]) + '</span>' +
                        '       </div>' +
                        '       <div class="product-stock">' +
                        '           <span class="txt">In Stock : </span><span class="txt" style="font-weight: bold">' + products[i][1] + '</span>' +
                        '       </div>' +
                        '       <button class="addToCart btn btn-warning">' +
                        '           <img src="../res/img/cart.ico" alt="">' +
                        '       </button>' +
                        '   </div>' +
                        '</div> ';
                }
                products_box.innerHTML = products_inner_html;
            }
        }

        function loadProducts(filterOpt, sortOpt) {
            if (!filterOpt && !sortOpt) {
                <?php
                if (isset($_GET["search-button"])) {
                    $sql = "SELECT * FROM `product` WHERE (`name` LIKE '%" . $_GET["search"] . "%') OR (`description` LIKE '%" . $_GET["search"] . "%') AND `stock` > 0 ORDER BY `product`.`category` ASC LIMIT " . $limit . ", " . $nbProductsInPage;
                    $result = mysqli_query($con, $sql);
                    loadProducts($con, $sql);
                } else {
                    $query = "SELECT * FROM `product` WHERE `stock` > 0 ORDER BY `product`.`category` ASC LIMIT " . $limit . ", " . $nbProductsInPage;
                    loadProducts($con, $query);
                }

                ?>
                displayProducts(products);
            } else if (!filterOpt) {
                switch (sortOpt) {
                    case 1 :
                    <?php
                    if (isset($_GET["search-button"])) {
                        $sql = "SELECT * FROM `product` WHERE (`name` LIKE '%" . $_GET["search"] . "%') OR (`description` LIKE '%" . $_GET["search"] . "%') AND `stock` > 0 ORDER BY `product`.`sale_price` DESC LIMIT " . $limit . ", " . $nbProductsInPage;
                        $result = mysqli_query($con, $sql);
                        loadProducts($con, $sql);
                    } else {
                        $query = "SELECT * FROM `product` WHERE `stock` > 0 ORDER BY `product`.`sale_price` DESC LIMIT " . $limit . ", " . $nbProductsInPage;
                        loadProducts($con, $query);
                    }
                    ?>
                        break;

                    case 2 :
                    <?php
                    if (isset($_GET["search-button"])) {
                        $sql = "SELECT * FROM `product` WHERE (`name` LIKE '%" . $_GET["search"] . "%') OR (`description` LIKE '%" . $_GET["search"] . "%') AND `stock` > 0 ORDER BY `product`.`sale_price`  ASC LIMIT " . $limit . ", " . $nbProductsInPage;
                        $result = mysqli_query($con, $sql);
                        loadProducts($con, $sql);
                    } else {
                        $query = "SELECT * FROM `product` WHERE `stock` > 0 ORDER BY `product`.`sale_price`  ASC LIMIT " . $limit . ", " . $nbProductsInPage;
                        loadProducts($con, $query);
                    }
                    ?>
                        break;

                    case 3 :
                    <?php
                    if (isset($_GET["search-button"])) {
                        $sql = "SELECT * FROM `product` WHERE (`name` LIKE '%" . $_GET["search"] . "%') OR (`description` LIKE '%" . $_GET["search"] . "%') AND `stock` > 0 ORDER BY `product`.`add_date` DESC LIMIT " . $limit . ", " . $nbProductsInPage;
                        $result = mysqli_query($con, $sql);
                        loadProducts($con, $sql);
                    } else {
                        $query = "SELECT * FROM `product` WHERE `stock` > 0 ORDER BY `product`.`add_date` DESC LIMIT " . $limit . ", " . $nbProductsInPage;
                        loadProducts($con, $query);
                    }
                    ?>
                        break;

                    case 4 :
                    <?php
                    if (isset($_GET["search-button"])) {
                        $sql = "SELECT * FROM `product` WHERE (`name` LIKE '%" . $_GET["search"] . "%') OR (`description` LIKE '%" . $_GET["search"] . "%') AND `stock` > 0 ORDER BY `product`.`add_date` ASC LIMIT " . $limit . ", " . $nbProductsInPage;
                        $result = mysqli_query($con, $sql);
                        loadProducts($con, $sql);
                    } else {
                        $query = "SELECT * FROM `product` WHERE `stock` > 0 ORDER BY `product`.`add_date` ASC LIMIT " . $limit . ", " . $nbProductsInPage;
                        loadProducts($con, $query);
                    }
                    ?>
                        break;

                    case 5 :
                    <?php
                    if (isset($_GET["search-button"])) {
                        $sql = "SELECT * FROM `product` WHERE (`name` LIKE '%" . $_GET["search"] . "%') OR (`description` LIKE '%" . $_GET["search"] . "%') AND `stock` > 0 ORDER BY `product`.`sales` DESC LIMIT " . $limit . ", " . $nbProductsInPage;
                        $result = mysqli_query($con, $sql);
                        loadProducts($con, $sql);
                    } else {
                        $query = "SELECT * FROM `product` WHERE `stock` > 0 ORDER BY `product`.`sales` DESC LIMIT " . $limit . ", " . $nbProductsInPage;
                        loadProducts($con, $query);
                    }
                    ?>
                        break;
                }
                displayProducts(products);
            } else if (!sortOpt) {
                var category_name = categories[filterOpt - 1];
                var productsAfterFilter = products.filter(product => {
                    return (product[5].localeCompare(category_name) === 0);
                });
                displayProducts(productsAfterFilter);
            } else {
                switch (sortOpt) {
                    case 1 :
                    <?php
                    if (isset($_GET["search-button"])) {
                        $sql = "SELECT * FROM `product` WHERE (`name` LIKE '%" . $_GET["search"] . "%') OR (`description` LIKE '%" . $_GET["search"] . "%') AND `stock` > 0 ORDER BY `product`.`sale_price` DESC LIMIT " . $limit . ", " . $nbProductsInPage;
                        $result = mysqli_query($con, $sql);
                        loadProducts($con, $sql);
                    } else {
                        $query = "SELECT * FROM `product` WHERE `stock` > 0 ORDER BY `product`.`sale_price` DESC LIMIT " . $limit . ", " . $nbProductsInPage;
                        loadProducts($con, $query);
                    }
                    ?>
                        break;

                    case 2 :
                    <?php
                    if (isset($_GET["search-button"])) {
                        $sql = "SELECT * FROM `product` WHERE (`name` LIKE '%" . $_GET["search"] . "%') OR (`description` LIKE '%" . $_GET["search"] . "%') AND `stock` > 0 ORDER BY `product`.`sale_price`  ASC LIMIT " . $limit . ", " . $nbProductsInPage;
                        $result = mysqli_query($con, $sql);
                        loadProducts($con, $sql);
                    } else {
                        $query = "SELECT * FROM `product` WHERE `stock` > 0 ORDER BY `product`.`sale_price`  ASC LIMIT " . $limit . ", " . $nbProductsInPage;
                        loadProducts($con, $query);
                    }
                    ?>
                        break;

                    case 3 :
                    <?php
                    if (isset($_GET["search-button"])) {
                        $sql = "SELECT * FROM `product` WHERE (`name` LIKE '%" . $_GET["search"] . "%') OR (`description` LIKE '%" . $_GET["search"] . "%') AND `stock` > 0 ORDER BY `product`.`add_date` DESC LIMIT " . $limit . ", " . $nbProductsInPage;
                        $result = mysqli_query($con, $sql);
                        loadProducts($con, $sql);
                    } else {
                        $query = "SELECT * FROM `product` WHERE `stock` > 0 ORDER BY `product`.`add_date` DESC LIMIT " . $limit . ", " . $nbProductsInPage;
                        loadProducts($con, $query);
                    }
                    ?>
                        break;

                    case 4 :
                    <?php
                    if (isset($_GET["search-button"])) {
                        $sql = "SELECT * FROM `product` WHERE (`name` LIKE '%" . $_GET["search"] . "%') OR (`description` LIKE '%" . $_GET["search"] . "%') AND `stock` > 0 ORDER BY `product`.`add_date` ASC LIMIT " . $limit . ", " . $nbProductsInPage;
                        $result = mysqli_query($con, $sql);
                        loadProducts($con, $sql);
                    } else {
                        $query = "SELECT * FROM `product` WHERE `stock` > 0 ORDER BY `product`.`add_date` ASC LIMIT " . $limit . ", " . $nbProductsInPage;
                        loadProducts($con, $query);
                    }
                    ?>
                        break;

                    case 5 :
                    <?php
                    if (isset($_GET["search-button"])) {
                        $sql = "SELECT * FROM `product` WHERE (`name` LIKE '%" . $_GET["search"] . "%') OR (`description` LIKE '%" . $_GET["search"] . "%') AND `stock` > 0 ORDER BY `product`.`sales` DESC LIMIT " . $limit . ", " . $nbProductsInPage;
                        $result = mysqli_query($con, $sql);
                        loadProducts($con, $sql);
                    } else {
                        $query = "SELECT * FROM `product` WHERE `stock` > 0 ORDER BY `product`.`sales` DESC LIMIT " . $limit . ", " . $nbProductsInPage;
                        loadProducts($con, $query);
                    }
                    ?>
                        break;
                }
                var category_name = categories[filterOpt - 1];
                var productsAfterFilter = products.filter(product => {
                    return (product[5].localeCompare(category_name) === 0);
                });
                displayProducts(productsAfterFilter);
            }
        }

        loadProducts();
    </script>
</main>

<!-- ALL POP UPS MODALS -->
<?php include '../client/pop_ups.php' ?>
<?php include 'services.php' ?>
<?php include 'footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/addToCart.js"></script>
<script language="JavaScript">
    function showLogOut() {
        document.getElementById("log-out-pop").classList.toggle("hidden");
    }
</script>
</body>
</html>