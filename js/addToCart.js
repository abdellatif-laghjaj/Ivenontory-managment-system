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
    function incrementValue (item) {
        if (item.quantity < item.stock) {
            item.quantity += 1;
        } else {
            item.quantity = item.stock;
        }
        updateQuantity();
        updateTotalPrice();
        updateBadge();
    }

    function decrementValue (item) {
        if (item.quantity > 0) {
            item.quantity -= 1;
        } else {
            item.quantity = 1;
        }
        updateQuantity();
        updateTotalPrice();
        updateBadge();
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
        data += '<tr class="cart-element"><th><img src="' + cartItems[i].image + '"></th><th>' + cartItems[i].name + '</th><th><button onclick=decrementValue(cartItems[i]); class="minusBtn">-</button><input class="product-qnt" type="text" value="' + cartItems[i].quantity + '"><button onclick=incrementValue(cartItems[i]); class="plusBtn">+</button></th><th>' + cartItems[i].price + '</th><th><a href="#" onclick=Delete(cartItems[i]);>Remove</a></th></tr>'
    }
    cartBody.innerHTML = data;
}

function Delete(element) {
    cartItems.pop(element);
    updateTotalPrice();
    updateBadge();
    loadCartElements();
}