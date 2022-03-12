let productsInCart = [];
const parentElement = querySelector(".table");
const cartSumPrice = document.querySelector(".totale-price");
const products = document.querySelector("#product");
const ordersInCart = document.querySelector("#NbOrders");

const countSumPrice = function() {
    let sumPrice = 0;
    productsInCart.forEach(product => {
        sumPrice += product.price;
    })
    return sumPrice;
}

const updateShoppingCartHTML = function() {
    if(productsInCart.length > 0) {
        let result = productsInCart.map(product => {
            return ' <table class="table table-image"> <thead> </thead> <tbody> <tr class="cartProduct"> <td class="w-25"> <img src="${product.image}" class="img-fluid img-thumbnail" alt="Sheep"> </td> <td>${product.name}</td> <td class="Element-Price">${product.price}$</td> <td class="Element-Quantity"><input type="text" class="form-control" id="input1" value="1"></td> <td> <a href="#" class="btn btn-danger btn-sm"> <i class="fa fa-times"></i> </a> </td> </tr> </tbody> </table> '
        });
        parentElement.innerHTML = result.join('');
        ordersInCart.innerHTML = productsInCart.length;
    } else {
        ordersInCart.innerHTML = "";
    }
}

function updateProductInCart(product) {
    for (let i = 0; i < productsInCart.length; i++) {
        if(productsInCart[i].name == product.name) {
            productsInCart[i].count += 1;
            productsInCart[i].price = productsInCart[i].basePrice * productsInCart[i].count;
            return;
        }
    }
    productsInCart.push(product);
}

products.forEach(product => {
    product.addEventListener('click', (e) => {
        if(e.target.classList.contains('addToCart')) {
            const productName = product.querySelector('.product-title').innerText;
            const productPrice = product.querySelector('.product-price').innerText;    
            const productImage = product.querySelector('.product-img').src;
            let productToCart = {
                name : productName,
                image : productImage,
                count : 1,
                price : +productPrice,
                basePrice : +productPrice
            }
            updateProductInCart(productToCart);
            updateShoppingCartHTML();
        }
    })
});