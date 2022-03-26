<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../style/index.css">
    <title>TexGear</title>

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
    <div class="banner">
        <h1 class="">Welcome to TexGEAR: E-commerce web app</h1>
        <p class="">Enjoy a safe, convenient shopping experience</p>
        <button id="log-in" class="" style="width: 100px;" onclick="showLogin()">Login</button>
        <button id="register" class="" style="width: 100px;" onclick="showRegistration()">Register</button>
    </div>

    <?php include '../client/categories_dropdown.php'; ?>

    <div class="categories">
        <!-- PRODUCT CARD -->
        <div class="products shadow-lg mb-5 bg-body rounded">
            <div class="card">
                <div class="product-image">
                    <img id="product-image" src="../res/img/website.png" alt="product image">
                </div>
                <h1 class="product-name">
                    Galaxy S20+
                </h1>
                <p>Here's some description...</p>
                <div class="product-price">
                    <span class="txt">Price : </span><span class="txt" id="base-price"
                                                           style="font-weight: bold;">$1299</span>
                </div>
                <div class="product-stock">
                    <span class="txt">In Stock : </span><span class="txt" style="font-weight: bold">20</span>
                </div>
                <button class="addToCart btn btn-warning">
                    <img src="../res/img/cart.ico" alt="">
                </button>
            </div>
        </div>

        <!-- PRODUCT CARD -->
        <div class="products shadow-lg mb-5 bg-body rounded">
            <div class="card">
                <div class="product-image">
                    <img id="product-image" src="../res/img/website.png" alt="product image">
                </div>
                <h1 class="product-name">
                    Huawei Y7
                </h1>
                <p>Here's some description...</p>
                <div class="product-price">
                    <span class="txt">Price : </span><span class="txt" id="base-price"
                                                           style="font-weight: bold;">$599</span>
                </div>
                <div class="product-stock">
                    <span class="txt">In Stock : </span><span class="txt" style="font-weight: bold;">26</span>
                </div>
                <button class="addToCart btn btn-warning">
                    <img src="../res/img/cart.ico" alt="">
                </button>
            </div>
        </div>

        <!-- PRODUCT CARD -->
        <div class="products shadow-lg mb-5 bg-body rounded">
            <div class="card">
                <div class="product-image">
                    <img id="product-image" src="../res/img/website.png" alt="product image">
                </div>
                <h1 class="product-name">
                    EliteBook G360
                </h1>
                <p>Here's some description...</p>
                <div class="product-price">
                    <span class="txt">Price : </span><span class="txt" id="base-price"
                                                           style="font-weight: bold">$899</span>
                </div>
                <div class="product-stock">
                    <span class="txt">In Stock : </span><span class="txt" style="font-weight: bold">20</span>
                </div>
                <button class="addToCart btn btn-warning">
                    <img src="../res/img/cart.ico" alt="">
                </button>
            </div>
        </div>

        <!-- PRODUCT CARD -->
        <div class="products shadow-lg mb-5 bg-body rounded">
            <div class="card">
                <div class="product-image">
                    <img id="product-image" src="../res/img/reset_password.png" alt="product image">
                </div>
                <h1 class="product-name">
                    Lenovo IDEA PAD 320S
                </h1>
                <p>Here's some description...</p>
                <div class="product-price">
                    <span class="txt">Price : </span><span class="txt" id="base-price"
                                                           style="font-weight: bold">$999</span>
                </div>
                <div class="product-stock">
                    <span class="txt">In Stock : </span><span class="txt" style="font-weight: bold">20</span>
                </div>
                <button class="addToCart btn btn-warning">
                    <img src="../res/img/cart.ico" alt="">
                </button>
            </div>
        </div>
    </div>
</main>

<!-- ALL POP UPS MODALS -->
<?php include '../client/pop_ups.php' ?>
<?php include 'services.php' ?>
<?php include 'footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/addToCart.js"></script>
</body>
</html>