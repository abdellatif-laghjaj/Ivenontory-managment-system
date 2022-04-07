let cartItems = [];
let data = '';
var NbOrders = 0;
var totalPrice = 0;
const errorSound = new Audio('../res/sounds/errorSound.wav');

const addToCartButton = document.getElementsByClassName('addToCart');
const badge = document.getElementById('Badge');
const cartBody = document.getElementById('cart-pop').querySelector('table');

window.addEventListener("DOMContentLoaded", (evt) => {
    //add to cart
    for (let i = 0; i < addToCartButton.length; i++) {
        var clickedButton = addToCartButton[i];
        clickedButton.setAttribute('rank', i);
        clickedButton.addEventListener("click", function (e) {
            var currentButton;

            if (e.target.tagName.toUpperCase() == 'BUTTON')
                currentButton = e.target;
            else
                currentButton = e.target.parentElement;

            var currentIndex = currentButton.getAttribute('rank');
            var currentProduct = products[currentIndex];
            let product = {
                id: currentProduct[4],
                name: currentProduct[0],
                image: currentProduct[3],
                stock: parseInt(currentProduct[1]),
                quantity: parseInt(1),
                basePrice: parseFloat(currentProduct[2]),
                price: parseFloat(currentProduct[2])
            };
            //if the cart is empty
            if (cartItems.length == 0) {
                cartItems.push(product);
                sessionStorage.setItem("Items", JSON.stringify(cartItems));
                updateTotalPrice();
                updateBadge();
                loadCartElements();
            } else {
                //check if the product exist already in the cart or not
                if (exist(product) === null) {
                    cartItems.push(product);
                    sessionStorage.setItem("Items", JSON.stringify(cartItems));
                    updateTotalPrice();
                    updateBadge();
                    loadCartElements();
                } else {
                    //check if the product is not out of stock
                    if (exist(product).quantity >= exist(product).stock) {
                        errorSound.play();
                        swal({
                            title: "Error",
                            text: "This product is out of stock",
                            icon: "error",
                            button: "Ok",
                        });
                    } else {
                        exist(product).quantity += 1;
                        exist(product).price = exist(product).basePrice * exist(product).quantity;
                        sessionStorage.setItem("Items", JSON.stringify(cartItems));
                        updateTotalPrice();
                        updateBadge();
                        loadCartElements();
                    }
                }
            }
        })
    }
})

function exist(item) {
    for (let i = 0; i < cartItems.length; i++) {
        if ((item.name.localeCompare(cartItems[i].name) === 0) || (item.id === cartItems[i].id)) {
            return cartItems[i];
        }
    }
    return null;
}

function showLogin() {
    document.getElementById("log-in-pop").classList.toggle("hidden");
}

function showRegistration() {
    document.getElementById("register-pop").classList.toggle("hidden");
}

function showCart() {
    document.getElementById("cart-pop").classList.toggle("hidden");
}

//change badge content
function updateBadge() {
    NbOrders = 0;
    var cartContent = JSON.parse(sessionStorage.getItem('Items'));
    for (let k = 0; k < cartContent.length; k++) {
        NbOrders += cartContent[k].quantity;
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
    var cartContent = JSON.parse(sessionStorage.getItem('Items'));
    for (let k = 0; k < cartContent.length; k++) {
        totalPrice += cartContent[k].price;
    }
    document.getElementById('total-price').querySelector("input").value = Intl.NumberFormat('en-US').format(totalPrice);
}

function loadCartElements() {
    data = '';
    var cartContent = JSON.parse(sessionStorage.getItem('Items'));
    if (cartContent.length === 0) {
        updateTotalPrice();
        updateBadge();
        cartBody.innerHTML = '<div style="width: 100%; height: 320px; display: flex; justify-content: center; align-items: center;"><img  style="width: 495px; height: 315px;" src="../res/img/ufo_empty_cart.gif" ></div>';
    } else {
        for (let i = 0; i < cartContent.length; i++) {
            data += '<tr>' +
                '<th>' +
                '<img class="shopping-cart-img" src="' + cartContent[i].image + '">' +
                '</th>' +
                '<th>' + cartContent[i].name + '</th>' +
                '<th class="full-input-qnt">' +
                '<div class="dec" style="font-weight: bold; font-size: 20px;">-</div>' +
                '<input class="product-qnt" type="text" value="' + cartContent[i].quantity + '" onkeypress="return onlyNumberKey(event)">' +
                '<div class="inc" style="font-weight: bold; font-size: 20px;">+</div>' +
                '</th>' +
                '<th>' + Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'USD'
                }).format(cartContent[i].basePrice) + '</th>' +
                '<th>' +
                '<a href="#" class="removeBtn" onclick=Delete(this);><i class="fa fa-trash"></i></a>' +
                '</th>' +
                '</tr>'
        }
        cartBody.innerHTML = data;

        //change quantity input
        var cartContent = JSON.parse(sessionStorage.getItem("Items"));
        var quantityInput = cartBody.getElementsByClassName('product-qnt');
        for (var i = 0; i < quantityInput.length; i++) {
            quantityInput[i].setAttribute('index', i);
            quantityInput[i].addEventListener("keyup", (evt) => {
                var currentInput = evt.target;
                var currentInputIndex = currentInput.getAttribute('index');
                var currentInputValue = parseInt(currentInput.value);
                var currentProduct = cartContent[currentInputIndex];
                var productsInStock = currentProduct.stock;
                if (currentInputValue >= 1 && currentInputValue <= productsInStock) {
                    currentProduct.quantity = currentInputValue;
                    currentProduct.price = currentProduct.quantity * currentProduct.basePrice;
                    cartItems = cartContent;
                    sessionStorage.setItem('Items', JSON.stringify(cartContent));
                    updateTotalPrice();
                    updateBadge();
                } else if (currentInputValue < 1 || isNaN(currentInputValue)) {
                    currentProduct.quantity = 1;
                    currentProduct.price = currentProduct.basePrice;
                    currentInput.value = 1;
                    cartItems = cartContent;
                    sessionStorage.setItem('Items', JSON.stringify(cartContent));
                    updateTotalPrice();
                    updateBadge();
                } else if (currentInputValue > productsInStock) {
                    currentProduct.quantity = productsInStock;
                    currentProduct.price = currentProduct.quantity * currentProduct.basePrice;
                    currentInput.value = productsInStock;
                    cartItems = cartContent;
                    sessionStorage.setItem('Items', JSON.stringify(cartContent));
                    updateTotalPrice();
                    updateBadge();
                    errorSound.play();
                    swal({
                        title: "Error!",
                        text: "You can't buy more than " + productsInStock + " items!",
                        icon: "error",
                        button: "OK",
                    });
                }
            })
        }

        //increase quantity
        var cartContent = JSON.parse(sessionStorage.getItem("Items"));
        var increaseButton = cartBody.getElementsByClassName('inc');
        for (var i = 0; i < increaseButton.length; i++) {
            increaseButton[i].setAttribute('index', i);
            increaseButton[i].addEventListener("click", evt => {
                var currentInput = evt.target.parentElement.children[1];
                var currentInputIndex = currentInput.getAttribute('index');
                var currentInputValue = parseInt(currentInput.value);
                var currentInputNewValue = currentInputValue + 1;
                var currentProduct = cartContent[currentInputIndex];
                var productsInStock = currentProduct.stock;
                if (currentInputNewValue >= 1 && currentInputNewValue <= productsInStock) {
                    currentProduct.quantity = currentInputNewValue;
                    currentProduct.price = currentProduct.quantity * currentProduct.basePrice;
                    currentInput.value = currentInputNewValue;
                    cartItems = cartContent;
                    sessionStorage.setItem('Items', JSON.stringify(cartContent));
                    updateTotalPrice();
                    updateBadge();
                } else if (currentInputNewValue > productsInStock) {
                    currentProduct.quantity = productsInStock;
                    currentProduct.price = currentProduct.quantity * currentProduct.basePrice;
                    currentInput.value = productsInStock;
                    cartItems = cartContent;
                    sessionStorage.setItem('Items', JSON.stringify(cartContent));
                    updateTotalPrice();
                    updateBadge();
                    errorSound.play();
                    swal({
                        title: "Error!",
                        text: "You can't buy more than " + productsInStock + " items!",
                        icon: "error",
                        button: "OK",
                    });
                }
            })
        }

        //decrease quantity
        var cartContent = JSON.parse(sessionStorage.getItem("Items"));
        var decreaseButton = cartBody.getElementsByClassName('dec');
        for (var i = 0; i < decreaseButton.length; i++) {
            decreaseButton[i].setAttribute('index', i);
            decreaseButton[i].addEventListener("click", evt => {
                var currentInput = evt.target.parentElement.children[1];
                var currentInputIndex = currentInput.getAttribute('index');
                var currentInputValue = parseInt(currentInput.value);
                var currentInputNewValue = currentInputValue - 1;
                var currentProduct = cartContent[currentInputIndex];
                var productsInStock = currentProduct.stock;
                if (currentInputNewValue >= 1 && currentInputNewValue <= productsInStock) {
                    currentProduct.quantity = currentInputNewValue;
                    currentProduct.price = currentProduct.quantity * currentProduct.basePrice;
                    currentInput.value = currentInputNewValue;
                    cartItems = cartContent;
                    sessionStorage.setItem('Items', JSON.stringify(cartContent));
                    updateTotalPrice();
                    updateBadge();
                } else if (currentInputNewValue < 1 || isNaN(currentInputNewValue)) {
                    currentProduct.quantity = 1;
                    currentProduct.price = currentProduct.basePrice;
                    currentInput.value = 1;
                    cartItems = cartContent;
                    sessionStorage.setItem('Items', JSON.stringify(cartContent));
                    updateTotalPrice();
                    updateBadge();
                }
            })
        }
    }
}

window.onload = function () {
    if (JSON.parse(sessionStorage.getItem("Items")) !== null) {
        cartItems = JSON.parse(sessionStorage.getItem("Items"));
        updateTotalPrice();
        updateBadge();
    }
    loadCartElements();
}

function Delete(element) {
    var cartContent = JSON.parse(sessionStorage.getItem('Items'));
    var targetName = element.parentElement.parentElement.children[1].textContent.trim();
    var cartAfterDelete = [];
    cartAfterDelete = cartContent.filter(item => (targetName.localeCompare(item.name) !== 0));
    sessionStorage.setItem("Items", JSON.stringify(cartAfterDelete));
    cartItems = JSON.parse(sessionStorage.getItem("Items"));
    updateTotalPrice();
    updateBadge();
    loadCartElements();
}

function onlyNumberKey(event) {
    var ASCIIcode = (event.wich) ? event.wich : event.keyCode;
    if (ASCIIcode > 31 && (ASCIIcode < 48 || ASCIIcode > 57)) return false;
    return true;
}

//hide pop-up when click outside
const overlays = document.getElementsByClassName('overlay');
const PopupsContent = document.getElementsByClassName('pop-content');

for (var i = 0; i < PopupsContent.length; i++) {
    PopupsContent[i].addEventListener("click", e => {
        e.stopPropagation();
    })
}

for (var i = 0; i < overlays.length; i++) {
    overlays[i].addEventListener("click", e => {
        var currentPopUp = e.target.parentElement;
        currentPopUp.classList.add("hidden");
    })
}