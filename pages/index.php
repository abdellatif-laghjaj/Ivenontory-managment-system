<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index.css">
    <title>TexGear</title>
</head>
<body>
<header>
    <div class="logo">
        <a href="#" class=""><span style="color: #28C7FA">Tex</span><span>GEAR</span></a>
    </div>
    <div class="nav-elements">
        <ul>
            <li>
                <a href="login.php">Admin</a>
            </li>
            <li>
                <a href="contact.php">Contact Us</a>
            </li>
        </ul>
        <form>
            <input type="text" id="search-area" placeholder="search...">
            <button type="submit" id="search-button" value="">
                <img src="../res/img/search.png">
            </button>
        </form>
    </div>
    <div class="basket">
        <button class="closebtn" onclick="showCart()">
            <img src="../res/img/shoppingcart.ico">
            <div class="NbOrders hidden" id="Badge">0</div>
        </button>
    </div>
    <div class="toggle"></div>
</header>
<main>
    <div class="banner">
        <h1 class="">Inventory managment system</h1>
        <p class="">Enjoy a safe, convenient shopping experience</p>
        <button id="log-in" class="" style="width: 100px;" onclick="showLogin()">Login</button>
        <button id="register" class="" style="width: 100px;" onclick="showRegistration()">Register</button>
    </div>
    <div class="categories">
        <h1 class="category-title">Mobiles</h1>
        <div class="products">
            <div class="card">
                <div class="product-image">
                    <img id="product-image" src="../res/img/cellPhone.png">
                </div>
                <h1 class="product-name">
                    Galaxy S20+
                </h1>
                <p>Here's some description...</p>
                <hr>
                <div class="product-price">
                    <span>Price : </span><span id="base-price" style="font-weight: bold">$1299</span>
                </div>
                <hr>
                <div>
                    <span>In Stock : </span><span class="product-stock" style="font-weight: bold">20</span>
                </div>
                <button class="addToCart">
                    <img src="../res/img/cart.ico">
                </button>
            </div>
        </div>
        <div class="products">
            <div class="card">
                <div class="product-image">
                    <img id="product-image" src="../res/img/box.png">
                </div>
                <h1 class="product-name">
                    Iphone 12
                </h1>
                <p>Here's some description...</p>
                <hr>
                <div class="product-price">
                    <span>Price : </span><span id="base-price" style="font-weight: bold">$2000</span>
                </div>
                <hr>
                <div>
                    <span>In Stock : </span><span class="product-stock" style="font-weight: bold">20</span>
                </div>
                <button class="addToCart">
                    <img src="../res/img/cart.ico">
                </button>
            </div>
        </div>
        <div class="products">
            <div class="card">
                <div class="product-image">
                    <img id="product-image" src="../res/img/avatar.png">
                </div>
                <h1 class="product-name">
                    Redmi Note 7
                </h1>
                <p>Here's some description...</p>
                <hr>
                <div class="product-price">
                    <span>Price : </span><span id="base-price" style="font-weight: bold">$1099</span>
                </div>
                <hr>
                <div class="product-stock">
                    <span>In Stock : </span><span class="product-stock" style="font-weight: bold">20</span>
                </div>
                <button class="addToCart">
                    <img src="../res/img/cart.ico">
                </button>
            </div>
        </div>
    </div>
</main>
<div class="pop-up">
    <div id="log-in-pop" class="log-in-pop hidden">
        <div class="overlay">
            <div class="pop-content">
                <form>
                    <legend>
                        <span>Login</span>
                        <button onclick="showLogin()">
                            <img src="../res/img/close.png">
                        </button>
                    </legend>
                    <div class="field">
                        <label>Username</label>
                        <input type="text" placeholder="username">
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <input type="password" placeholder="Password">
                    </div>
                    <div class="field">
                        <input type="submit" value="LOGIN" class="button">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="register-pop" class="register-pop hidden">
        <div class="overlay">
            <div class="pop-content">
                <form>
                    <legend>
                        <span>Register</span>
                        <button onclick="showRegistration()">
                            <img src="../res/img/close.png">
                        </button>
                    </legend>
                    <div class="field">
                        <label>Username</label>
                        <input type="text" placeholder="username">
                    </div>
                    <div class="field">
                        <label>Phone</label>
                        <input type="tel" placeholder="Phone">
                    </div>
                    <div class="field">
                        <label>Adresse</label>
                        <input type="text" placeholder="Adresse">
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <input type="password" placeholder="Password">
                    </div>
                    <div class="field">
                        <label>Confirm password</label>
                        <input type="password" placeholder="Confirm password">
                    </div>
                    <div class="field">
                        <input type="submit" value="LOGIN" class="button">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="cart-pop" class="cart-pop hidden">
        <div class="overlay">
            <div class="pop-content">
                <legend>
                    <h5 class="" id="">
                        Your Shopping Cart
                    </h5>
                    <button class="closebtn" onclick="showCart()">
                        <img src="../res/img/close.png">
                    </button>
                </legend>
                <div id="total-price">

                </div>
                <table>

                </table>
                <div class="actionbtn">
                    <button type="button" id="close" onclick="showCart()">Close</button>
                    <button type="button" id="buy-now">Buy now</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script language="JavaScript">

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

    const cartElements = document.getElementsByClassName('cart-element');
    const addToCartButton = document.getElementsByClassName('addToCart');
    const badge = document.getElementById('Badge');
    const cartBody = document.getElementById('cart-pop').querySelector('table');


    for (var i = 0; i < addToCartButton.length; i++) {
        addToCartButton[i].addEventListener("click", function (e) {
            let item = {
                name: e.target.parentElement.querySelector('.product-name').textContent.trim(),
                basePrice: parseFloat(e.target.parentElement.querySelector('#base-price').textContent.replace("$", "").trim()),
                price: parseFloat(e.target.parentElement.querySelector('#base-price').textContent.replace("$", "").trim()),
                quantity: parseInt("1"),
                image: e.target.parentElement.querySelector('#product-image').src.replace("http://localhost/IMS", ".."),
                stock: parseInt(e.target.parentElement.querySelector('.product-stock').textContent.trim())
            };
            if (cartItems.length > 0) {
                //check if the cart contains the new element
                for (var j = 0; j < cartItems.length; j++) {
                    if (cartItems[j].name.localeCompare(item.name) == 0) {
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
        if (NbOrders == 0) {
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
        document.getElementById('total-price').innerText = totalPrice + "$";
    }

    //change quantity input
    for (let i = 0; i < cartElements.length; i++) {
        var inputValue = cartElements[i].querySelector('.product-qnt').value;
        var incrementBtn = cartElements[i].querySelector('.plusBtn');
        var decrementBtn = cartElements[i].querySelector('.minusBtn');

        incrementBtn.addEventListener('click', function (e) {
            if (inputValue < cartItems[i].stock) {
                e.target.parentElement.querySelector('.product-qnt').value = inputValue + 1;
            } else {
                e.target.parentElement.querySelector('.product-qnt').value = cartItems[i].stock;
            }
            updateQuantity();
            updateTotalPrice();
            updateBadge();
        })

        decrementBtn.addEventListener('click', function (e) {
            if (inputValue > 0) {
                e.target.parentElement.querySelector('.product-qnt').value = inputValue - 1;
            } else {
                e.target.parentElement.querySelector('.product-qnt').value = 1;
            }
            updateQuantity();
            updateTotalPrice();
            updateBadge();
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
            data += '<tr class="cart-element"><th><img src="' + cartItems[i].image + '"></th><th>' + cartItems[i].name + '</th><th><button class="minusBtn">-</button><input class="product-qnt" type="number" value="' + cartItems[i].quantity + '"><button class="plusBtn">+</button></th><th>' + cartItems[i].price + '</th><th><a href="#" onclick=Delete(cartItems[i]);>Remove</a></th></tr>'
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