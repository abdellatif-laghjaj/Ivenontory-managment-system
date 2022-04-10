// add items to the cart

const cartBtn = document.querySelectorAll("#addToCart");

cartBtn.forEach(function (btn) {
  btn.addEventListener("click", function (event) {

    const item = {
        
    };

    let name = 
        event.target.previousElementSibling.previousElementSibling.previousElementSibling.textContent;

    let price =
      event.target.previousElementSibling.children[0]
        .children[1].children[1].textContent;

    let finalPrice = price.slice(1).trim();

    //add properties

    if(!containsObject(name, item)){
        item.name = name;
        item.quantity = 1;
        item.price = finalPrice;
    }

    const cartItem = document.createElement("div");

    let totalProductPrice = parseFloat(item.price) * item.quantity;

    console.log(totalProductPrice);

    cartItem.innerHTML = `
    <table class="table table-image">
    <thead>
    
    </thead>
    <tbody>
        <tr class="cartProduct">
            <td class="w-25">
                <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" class="img-fluid img-thumbnail" alt="Sheep">
            </td>
            <td>${item.name}</td>
            <td class="Element-Price">${item.price}$</td>
            <td class="Element-Quantity"><input type="text" class="form-control" id="input1" value="1"></td>
            <td>${totalProductPrice}$</td>
            <td>
                <a href="#" class="btn btn-danger btn-sm">
                    <i class="fa fa-times"></i>
                </a>
            </td>
        </tr>
    </tbody>
</table>
    `;

    console.log(item);

    //select cart

    const cart = document.querySelector(".cartProducts");
    const total = document.querySelector(".cart-total-container");

    cart.appendChild(cartItem);
    alert("item added to the cart");

    showTotals();
  });
});

// show totals
function showTotals() {}


function containsObject(name, list) {
    var i;
    for (i = 0; i < list.length; i++) {
        if (list[i].name === name) {
            return true;
        }
    }

    return false;
}