<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>TexGear</title>
</head>
<body>
<header class="shadow p-2 mb-5">
    <div class="logo">
        <a href="#" class=""><span style="color: #28C7FA">Tex</span><span>GEAR</span></a>
    </div>
    <div class="nav-elements">
        <ul>
            <li>
                <a href="login.php" target="_blank">Admin</a>
            </li>
            <li>
                <a href="contact.php" target="_blank">Contact Us</a>
            </li>
        </ul>
    </div>
    <div class="basket">
        <button class="closebtn btn btn-warning py-2 text-white " onclick="showCart()">
            <i class="fa fa-shopping-basket"></i>
            <div class="NbOrders hidden" id="Badge">0</div>
        </button>
    </div>
    <div class="toggle"></div>
</header>
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
                    <img id="product-image" src="../res/img/cellPhone.png" alt="product image">
                </div>
                <h1 class="product-name">
                    Galaxy S20+
                </h1>
                <p>Here's some description...</p>
                <div class="product-price">
                    <span>Price : </span><span id="base-price" style="font-weight: bold">$1299</span>
                </div>
                <div class="product-stock">
                    <span>In Stock : </span><span style="font-weight: bold">20</span>
                </div>
                <button class="addToCart">
                    <img src="../res/img/cart.ico" alt="">
                </button>
            </div>
        </div>

        <!-- PRODUCT CARD -->
        <div class="products shadow-lg mb-5 bg-body rounded">
            <div class="card">
                <div class="product-image">
                    <img id="product-image" src="../res/img/cellPhone.png" alt="product image">
                </div>
                <h1 class="product-name">
                    Galaxy S20+
                </h1>
                <p>Here's some description...</p>
                <div class="product-price">
                    <span>Price : </span><span id="base-price" style="font-weight: bold">$1299</span>
                </div>
                <div class="product-stock">
                    <span>In Stock : </span><span style="font-weight: bold">20</span>
                </div>
                <button class="addToCart">
                    <img src="../res/img/cart.ico" alt="">
                </button>
            </div>
        </div>

        <!-- PRODUCT CARD -->
        <div class="products shadow-lg mb-5 bg-body rounded">
            <div class="card">
                <div class="product-image">
                    <img id="product-image" src="../res/img/cellPhone.png" alt="product image">
                </div>
                <h1 class="product-name">
                    Galaxy S20+
                </h1>
                <p>Here's some description...</p>
                <div class="product-price">
                    <span>Price : </span><span id="base-price" style="font-weight: bold">$1299</span>
                </div>
                <div class="product-stock">
                    <span>In Stock : </span><span style="font-weight: bold">20</span>
                </div>
                <button class="addToCart">
                    <img src="../res/img/cart.ico" alt="">
                </button>
            </div>
        </div>

        <!-- PRODUCT CARD -->
        <div class="products shadow-lg mb-5 bg-body rounded">
            <div class="card">
                <div class="product-image">
                    <img id="product-image" src="../res/img/cellPhone.png" alt="product image">
                </div>
                <h1 class="product-name">
                    Galaxy S20+
                </h1>
                <p>Here's some description...</p>
                <div class="product-price">
                    <span>Price : </span><span id="base-price" style="font-weight: bold">$1299</span>
                </div>
                <div class="product-stock">
                    <span>In Stock : </span><span style="font-weight: bold">20</span>
                </div>
                <button class="addToCart">
                    <img src="../res/img/cart.ico" alt="">
                </button>
            </div>
        </div>
    </div>
</main>

<!-- ALL POP UPS MODALS -->
<?php include '../client/pop_ups.php' ?>

<script>

    //pop-up show

    function showLogin() {
        document.getElementById("log-in-pop").classList.toggle("hidden");
    }

    function showRegistration() {
        document.getElementById("register-pop").classList.toggle("hidden");
    }

    function showCart() {
        document.getElementById("cart-pop").classList.toggle("hidden");
    }

    //add to cart
    let cartItems = [];
    let data = '';
    var NbOrders = 0;
    var totalPrice = 0;

    const addToCartButton = document.getElementsByClassName('addToCart');
    const badge = document.getElementById('Badge');
    const cartBody = document.getElementById('cart-pop').querySelector('table');


    for (let i = 0; i < addToCartButton.length; i++) {
        addToCartButton[i].addEventListener("click", function (e) {
            let item = {
                name: e.target.parentElement.querySelector('.product-name').textContent.trim(),
                basePrice: parseFloat(e.target.parentElement.querySelector('#base-price').textContent.replace("$", "").trim()),
                price: parseFloat(e.target.parentElement.querySelector('#base-price').textContent.replace("$", "").trim()),
                quantity: parseInt("1"),
                image: e.target.parentElement.querySelector('#product-image').src.replace("http://localhost/IMS", "..")
            };
            if (cartItems.length > 0) {
                //check if the cart contains the new element
                for (let j = 0; j < cartItems.length; j++) {
                    if (cartItems[j].name.localeCompare(item.name) === 0) {
                        cartItems[j].quantity += 1;
                        cartItems[j].price = cartItems[j].basePrice * cartItems[j].quantity;
                        break;
                    } else {
                        cartItems.push(item);
                    }
                }
            } else {
                cartItems.push(item);
            }
            updateTotalPrice()
            updateBadge();
            loadCartElements();
        })
    }

    //change badge content
    function updateBadge() {
        NbOrders = 0;
        for (let k = 0; k < cartItems.length; k++) {
            NbOrders += cartItems[k].quantity;
        }
        if (NbOrders === 0) {
            badge.classList.add('hidden');
            badge.classList.remove('NbOrders');
        } else if (NbOrders < 100) {
            badge.classList.remove('hidden');
            badge.classList.add('NbOrders');
            badge.innerText = NbOrders;
        } else {
            badge.classList.remove('hidden');
            badge.classList.add('NbOrders');
            badge.innerText = "+99"
        }
    }

    //update totale price
    function updateTotalPrice() {
        totalPrice = 0;
        for (let k = 0; k < cartItems.length; k++) {
            totalPrice += cartItems[k].price;
        }
        document.getElementById('total-price').innerText = "Total: " + totalPrice + "$";
    }

    //change quantity input

    //minus function
    const MinusButtons = cartBody.getElementsByClassName('minusBtn')
    for (let i = 0; i < MinusButtons.length; i++) {
        MinusButtons[i].addEventListener("click", function (e) {
            e.parentElement.getElementsByClassName('product-qnt').value -= parseInt(1);
            updateQuantity();
            console.log(e.parentElement.getElementsByClassName('product-qnt').value);
            console.log(-1);
        })
    }

    //Plus function
    const PlusButtons = cartBody.getElementsByClassName('plusBtn');
    for (let i = 0; i < MinusButtons.length; i++) {
        MinusButtons[i].addEventListener("click", function (e) {
            console.log(+1);
            e.parentElement.getElementsByClassName('product-qnt').value += parseInt(1);
            updateQuantity();
            console.log(e.parentElement.getElementsByClassName('product-qnt').value);
            console.log(+1);
        })
    }

    function updateQuantity() {
        const quantityInput = cartBody.getElementsByClassName('product-qnt');
        for (let i = 0; i < quantityInput.length; i++) {
            cartItems[i].quantity = parseFloat(quantityInput[i].value);
            cartItems[i].price = cartItems[i].basePrice * cartItems[i].quantity;
        }
        updateTotalPrice();
    }

    function loadCartElements() {
        data = '';
        for (let i = 0; i < cartItems.length; i++) {
            data += '<tr><th><img class="shopping-cart-img" src="' + cartItems[i].image + '"></th><th>' + cartItems[i].name + '</th><th><input class="product-qnt" type="number" value="' + cartItems[i].quantity + '"></th><th>' + cartItems[i].price + '</th><th><a href="#" class="removeBtn" onclick=Delete(cartItems[i]);><i class="fa fa-trash"></i></a></th></tr>'
        }
        cartBody.innerHTML = data;
    }

    function Delete(element) {
        cartItems.pop(element);
        updateTotalPrice();
        updateBadge();
        loadCartElements();
    }

</script>
</body>
</html>