<?php
session_start();
include '../db/connection.php';
include '../client/functions.php';
//loading parameters
$isSearching = false;
$isFiltering = false;
$isSorting = false;
$sortDefaultValue = 1;
$filterDefaultValue = 0;
$pagingDefaultValue = 1;
$perPageDefaultValue = 8;

//content parameters
$searchQuery = "";
$nbProductsInPage = $perPageDefaultValue;
$currentPage = $pagingDefaultValue;
$sort_by = $sortDefaultValue;
$filter_by = $filterDefaultValue;
$productsToShow = mysqli_num_rows(mysqli_query($con, "SELECT * FROM product WHERE stock > 0"));

if (isset($_GET["page"])) {
    if (($_GET["page"] > 0) || (!empty($_GET["page"]))) {
        $currentPage = $_GET["page"];
    }
}

if (isset($_GET["search"])) {
    if (!empty($_GET["search"])) {
        $isSearching = true;
        $searchQuery = addslashes($_GET["search"]);
    }
}

if (isset($_GET["filter_by"])) {
    if (($_GET["filter_by"] != 0) || (!empty($_GET["filter_by"]))) {
        $isFiltering = true;
        $filter_by = $_GET['filter_by'];
    }
}

if (isset($_GET["sort_by"])) {
    if (!empty($_GET["sort_by"])) {
        $isSorting = true;
        $sort_by = $_GET['sort_by'];
    }
}

if (isset($_GET["per_page"])) {
    if (($_GET["per_page"] != 0) || (!empty($_GET["per_page"])))
        $nbProductsInPage = $_GET["per_page"];
}

$loadQuery = "SELECT * FROM product WHERE stock > 0";

//content parameters

if ($isSearching) {
    $search = $searchQuery;
    if ($isFiltering) {
        $filter = $filter_by;
        if ($isSorting) {
            switch ($sort_by) {
                case 1:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 AND (category = '" . $filter . "') AND ((name LIKE '%" . $search . "%') OR (description LIKE '%" . $search . "%')) ORDER BY sale_price DESC";
                    break;

                case 2:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 AND (category = '" . $filter . "') AND ((name LIKE '%" . $search . "%') OR (description LIKE '%" . $search . "%')) ORDER BY sale_price ASC";
                    break;

                case 3:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 AND (category = '" . $filter . "') AND ((name LIKE '%" . $search . "%') OR (description LIKE '%" . $search . "%')) ORDER BY add_date DESC";
                    break;

                case 4:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 AND (category = '" . $filter . "') AND ((name LIKE '%" . $search . "%') OR (description LIKE '%" . $search . "%')) ORDER BY add_date ASC";
                    break;

                case 5:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 AND (category = '" . $filter . "') AND ((name LIKE '%" . $search . "%') OR (description LIKE '%" . $search . "%')) ORDER BY sales DESC";
                    break;
            }
        } else {
            $loadQuery = "SELECT * FROM product WHERE stock > 0 AND (category = '" . $filter . "') AND ((name LIKE '%" . $search . "%') OR (description LIKE '%" . $search . "%'))";
        }
    } else {
        if ($isSorting) {
            switch ($sort_by) {
                case 1:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 AND ((name LIKE '%" . $search . "%') OR (description LIKE '%" . $search . "%')) ORDER BY sale_price DESC";
                    break;

                case 2:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 AND ((name LIKE '%" . $search . "%') OR (description LIKE '%" . $search . "%')) ORDER BY sale_price ASC";
                    break;

                case 3:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 AND ((name LIKE '%" . $search . "%') OR (description LIKE '%" . $search . "%')) ORDER BY add_date DESC";
                    break;

                case 4:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 AND ((name LIKE '%" . $search . "%') OR (description LIKE '%" . $search . "%')) ORDER BY add_date ASC";
                    break;

                case 5:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 AND ((name LIKE '%" . $search . "%') OR (description LIKE '%" . $search . "%')) ORDER BY sales DESC";
                    break;
            }
        } else {
            $loadQuery = "SELECT * FROM product WHERE stock > 0 AND ((name LIKE '%" . $search . "%') OR (description LIKE '%" . $search . "%'))";
        }
    }
} else {
    if ($isFiltering) {
        $filter = $filter_by;
        if ($isSorting) {
            switch ($sort_by) {
                case 1:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 AND (category = '" . $filter . "') ORDER BY sale_price DESC";
                    break;

                case 2:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 AND (category = '" . $filter . "') ORDER BY sale_price ASC";
                    break;

                case 3:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 AND (category = '" . $filter . "') ORDER BY add_date DESC";
                    break;

                case 4:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 AND (category = '" . $filter . "') ORDER BY add_date ASC";
                    break;

                case 5:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 AND (category = '" . $filter . "') ORDER BY sales DESC";
                    break;
            }
        } else {
            $loadQuery = "SELECT * FROM product WHERE stock > 0 AND (category = '" . $filter . "')";
        }

    } else {
        if ($isSorting) {
            switch ($sort_by) {
                case 1:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 ORDER BY sale_price DESC";
                    break;

                case 2:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 ORDER BY sale_price ASC";
                    break;

                case 3:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 ORDER BY add_date DESC";
                    break;

                case 4:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 ORDER BY add_date ASC";
                    break;

                case 5:
                    $loadQuery = "SELECT * FROM product WHERE stock > 0 ORDER BY sales DESC";
                    break;
            }
        } else {
            $loadQuery = "SELECT * FROM product WHERE stock > 0";
        }
    }
}

$productsToShow = mysqli_num_rows(mysqli_query($con, $loadQuery));

$nbPages = ceil($productsToShow / $nbProductsInPage);

if ($currentPage > $nbPages) {
    $currentPage = $nbPages;
}

$bound = ($currentPage - 1) * $nbProductsInPage;

$loadQuery = $loadQuery . " LIMIT " . $bound . ", " . $nbProductsInPage;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../res/img/logo.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="../style/select_text.css">
    <title>TexGear</title>
    <script language='JavaScript'>
        var products = [];
        var product = [];
    </script>
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
            background-image: linear-gradient(135deg, #52bfe7 10%, #130CB7 100%);
            display: flex;
        }

        main .banner .image-container {
            max-height: 500px;
            margin-right: 0;
            margin-left: auto;
        }

        @media all and (max-width: 1024px) {
            main .banner .image-container {
                display: none;
            }
        }

        @media all and (min-width: 1024px) {
            main .banner {
                background-image: linear-gradient(135deg, #52bfe7 10%, #130CB7 100%);
                max-height: 500px;
                display: flex;
            }

            main .banner .content {
                position: relative;
            }

            main .banner .content .actionbtn {
                margin-bottom: 0;
                margin-top: auto;
                position: absolute;
                bottom: 0;
            }

            main .banner .image-container {
                display: block;
            }

            main .banner .image-container img {
                height: 395px;
            }
        }

        .form-select-sm {
            margin: 6px 0;
        }

        .pop-up .cart-pop .pop-content {
            min-width: 400px;
        }

        .removeBtn .fa-trash {
            margin: 0 12px;
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

        main .banner #log-in {
            background-color: #dc3545;
            margin-right: 12px;
        }

        @media only screen and (max-width: 600px) {
            main .banner h1 {
                font-size: 30px;
                padding: 0;
            }
        }

        @media only screen and (min-width: 600px) {
            main .banner h1 {
                font-size: 40px;
                padding: 0;
            }
        }

        .pop-up .register-pop .pop-content form .field {
            margin: 0 20px;
        }

        .field .button {
            margin-top: 6px;
        }

        main .categories .products .card .product-name {
            padding: 0;
        }

        main .categories .products .card .product-price,
        main .categories .products .card .product-stock {
            display: inline;
        }

        main .categories .products .card .read-more {
            color: #ffc107;
            transition: 0.2s ease all;
            text-decoration: none;
        }

        main .categories .products .card .read-more:hover {
            text-decoration: underline;
        }
    </style>

</head>
<body>
<?php

$full_name = "";

if (isset($_SESSION['customerID'])) {
    $full_name = $_SESSION['full_name'];
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
        <a href="index.php" class="logo navbar-brand fw-bold"><span>Tex</span><span
                    style="color: #28C7FA">GEAR</span></a>
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
                '<div class="content">' +
                '   <h1 class="">Welcome <?php
                    echo $full_name;
                    ?></h1>' +
                '   <p class="">Enjoy a safe, convenient shopping experience</p>' +
                '   <div class="actionbtn">' +
                '       <button id="log-out" class="" style="width: 120px; background-color: red;">Log out</button>' +
                '   </div>' +
                '</div>' +
                '<div class="image-container">' +
                '   <div class="image-overlay"></div>' +
                '   <img src="../res/img/Picture1.png">' +
                '</div>'
            ;
        } else {
            banner.innerHTML =
                '<div class="content">' +
                '   <h1 class="">Welcome to TexGEAR: E-commerce web app</h1>' +
                '   <p class="">Enjoy a safe, convenient shopping experience</p>' +
                '   <div class="actionbtn">' +
                '      <button id="log-in" class="" style="width: 120px;" onclick="showLogin()">Login <i class="fa fa-sign-in" style="margin-left: 4px; font-size: 18px;"></i></button>' +
                '      <button id="register" class="" style="width: 120px;" onclick="showRegistration()">Register<i class="fa fa-user-plus" style="margin-left: 4px;"></i></button>' +
                '   </div>' +
                '</div>' +
                '<div class="image-container">' +
                '   <div class="image-overlay"></div>' +
                '   <img src="../res/img/Picture1.png">' +
                '</div>'
            ;
        }

    </script>
    <?php include '../client/categories_dropdown.php'; ?>

    <div class="products">
        <div class="categories" id="categories"></div>
        <div class="pages">
            <form id="pages">
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
                    function loadPagingButtons(totalProducts) {
                        var pages_form = document.getElementById('pages');
                        var slider_nav = document.getElementById('slider-nav');
                        var nbProductsInPage = <?php echo $nbProductsInPage; ?>;
                        var nbPages = Math.ceil(totalProducts / nbProductsInPage);
                        var currPage = <?php echo $currentPage; ?>;
                        var buttons = "";

                        if (nbPages > 1) {
                            for (let i = 0; i < nbPages; i++) {
                                if (i == currPage - 1) {
                                    buttons += '<input type="radio" class="pages_radios" name="page" id="' + (i + 1) + '" value="' + (i + 1) + '" checked>' +
                                        '<label for="' + (i + 1) + '" class="page_link">' + (i + 1) + '</label>'
                                    ;
                                } else {
                                    buttons += '<input type="radio" class="pages_radios" name="page" id="' + (i + 1) + '" value="' + (i + 1) + '">' +
                                        '<label for="' + (i + 1) + '" class="page_link">' + (i + 1) + '</label>'
                                    ;
                                }
                            }
                        }

                        slider_nav.innerHTML = buttons;

                    }
                </script>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/sweetalert.js"></script>
    <script language="JavaScript">
        function displayProducts() {
            <?php loadProducts($con, $loadQuery); ?>
            const products_box = document.getElementById("categories");
            var products_inner_html = "";
            if (products.length > 0) {
                for (var i = 0; i < products.length; i++) {
                    //format description
                    var product_description = products[i][6];
                    if (product_description.length >= 30) {
                        product_description = product_description.substring(0, 30) + ".";
                        product_description = product_description + ".. " + '<a href="view_product.php?id=' + products[i][4] + '" class="read-more">read more</a>';
                    } else if (product_description.length > 0 && product_description.length < 30) {
                        product_description = product_description + ' <a href="view_product.php?id=' + products[i][4] + '" class="read-more">read more</a>';
                    } else {
                        product_description = '<a href="view_product.php?id=' + products[i][4] + '" class="read-more">read more</a>';
                    }

                    //format product name
                    var product_name = products[i][0];
                    if (product_name.length > 20) {
                        product_name = product_name.substring(0, 20) + "...";
                    } else if (product_name.length == 0) {
                        product_name = "No name";
                    } else {
                        product_name = product_name;
                    }
                    products_inner_html +=
                        '<!-- PRODUCT CARD -->' +
                        '<div class="products shadow-lg mb-5 bg-body rounded">' +
                        '   <div class="card">' +
                        '      <div class="product-image">' +
                        '           <img id="product-image" src="' + products[i][3] + '" alt="product image">' +
                        '       </div>' +
                        '       <h1 class="product-name">' + product_name +
                        '       </h1>' +
                        '       <div class="description" style="width: 220px; height: 48px; color: rgba(255, 255, 255, 0.6);">' +
                        '       ' + product_description +
                        '       </div>' +
                        '       <div class="product-price">' +
                        '           <span class="txt">Price : </span><span class="txt" id="base-price"' +
                        '                                           style="font-weight: bold; margin: 16px;">' + Intl.NumberFormat("en-US", {
                            style: "currency",
                            currency: "USD"
                        }).format(products[i][2]) + '</span>' +
                        '       </div>' +
                        '       <div class="product-stock">' +
                        '           <span class="txt">In Stock : </span><span class="txt" style="font-weight: bold; margin: 16px;">' + products[i][1] + '</span>' +
                        '       </div>' +
                        '       <button class="addToCart btn btn-warning">' +
                        '           <img src="../res/img/cart.ico" alt="">' +
                        '       </button>' +
                        '   </div>' +
                        '</div>';
                }
                products_box.innerHTML = products_inner_html;
                loadPagingButtons(<?php echo $productsToShow; ?>);
            } else {
                products_box.innerHTML = '<div style="width: 100%; height: 600px; display: flex; justify-content: center; align-items: center;"><img src="../res/img/no-result.gif" ></div>';
            }
        }

        displayProducts();
    </script>
</main>

<form action="index.php" id="reload" method="get" style="display: none;">
    <input type="number" id="per_page_hidden" name="per_page" value="<?php echo $nbProductsInPage; ?>">
    <input type="number" id="page_h" name="page" value="<?php echo $currentPage; ?>">
    <input type="number" id="sort_by_h" name="sort_by" value="<?php echo $sort_by; ?>">
    <input type="text" id="filter_by_h" name="filter_by" value="<?php echo $filter_by; ?>">
    <input type="search" id="search_h" name="search" value="<?php echo $searchQuery; ?>">
</form>

<!-- ALL POP UPS MODALS -->
<?php include '../client/pop_ups.php' ?>
<?php include 'services.php' ?>
<?php include 'footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/addToCart.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script language="JavaScript">

    function showLogOut() {
        document.getElementById("log-out-pop").classList.toggle("hidden");
    }

    var hidden_form = document.forms["reload"];

    var per_page_hidden = document.getElementById("per_page_hidden");
    var page_hidden = document.getElementById("page_h");
    var sort_hidden = document.getElementById("sort_by_h");
    var filter_hidden = document.getElementById("filter_by_h");
    var search_hidden = document.getElementById("search_h");

    const category_menu = document.getElementById('categories_list');
    var sort_menu = document.getElementById("sort_selector");
    var per_page_menu = document.getElementById("per_page_selector");

    function setParmeters() {
        filter_hidden.value = category_menu.value;
        sort_hidden.value = sort_menu.value;
        per_page_hidden.value = per_page_menu.value;
    }

    //submit search value
    const searchButton = document.getElementById('search-button');
    const searchBar = document.getElementById('search-input');
    searchButton.onclick = function (e) {
        e.preventDefault();
        search_hidden.value = searchBar.value;
        document.forms["reload"].submit();
    }

    //submit filter value
    const category_link = document.getElementsByClassName("category_option");

    for (let i = 0; i < category_link.length; i++) {
        category_link[i].addEventListener("click", function (evt) {
            setParmeters();
            document.forms["reload"].submit();
        })
    }

    //submit sort value
    const sort_link = document.getElementsByClassName("sort_option");

    for (let i = 0; i < sort_link.length; i++) {
        sort_link[i].addEventListener("click", function (evt) {
            setParmeters();
            document.forms["reload"].submit();
        })
    }

    //submit page number
    var slider_nav = document.getElementById('slider-nav');
    var pages_links = slider_nav.querySelectorAll('label');
    var pages_radios = document.getElementsByClassName('pages_radios');

    for (let i = 0; i < pages_links.length; i++) {
        pages_links[i].setAttribute('index', i);
        pages_links[i].addEventListener("click", function (e) {
            var index = pages_links[i].getAttribute('index')
            pages_radios[index].checked = true;
            page_hidden.value = pages_radios[index].value;
            document.forms["reload"].submit();
        })
    }

    //submit per page value
    const per_page_link = document.getElementsByClassName("per_page_option");
    for (let i = 0; i < per_page_link.length; i++) {
        per_page_link[i].addEventListener("click", function (evt) {
            setParmeters();
            document.forms["reload"].submit();
        })
    }

    //logout button
    if (isLogin) {
        const logout_button = document.getElementById('log-out');
        logout_button.addEventListener("click", logout);
    }

    function logout() {
        swal({
            title: "Are you sure?",
            text: "You will be logged out",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "../client/logOut.php";
                } else {
                    swal("Enjoy a great shopping experience!");
                }
            });
    }

    //view product details
</script>
</body>
</html>