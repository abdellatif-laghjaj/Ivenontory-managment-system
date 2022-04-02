//Orders box party
const ordersList = document.getElementById('orders-list');
var data = '';
window.addEventListener("DOMContentLoaded", evt => {
    var cartContent = JSON.parse(sessionStorage.getItem('Items'));
    if (cartContent !== null) {
        for (var i = 0; i < cartContent.length; i++) {
            data += '<li>' + '<figure class="prod_img">' + '<img src="' + cartContent[i].image + '" style="height: 60px; width: 60px"/>' + '</figure>' + '<div class="quantity">' + cartContent[i].quantity + '</div>' + '<div class="prod_info">' + '<div class="name">' + cartContent[i].name + '</div>' + '<div class="price">' + Intl.NumberFormat('en-US', {
                style: "currency", currency: "USD"
            }).format(cartContent[i].basePrice) + '</div>' + '</div>' + '</li>';
        }
        ordersList.innerHTML = data;
        TotalPrice();
    }
});

function TotalPrice() {
    var totalPrice = 0;
    var cartContent = JSON.parse(sessionStorage.getItem('Items'));
    for (let k = 0; k < cartContent.length; k++) {
        totalPrice += cartContent[k].price;
    }
    document.getElementById('total_price').querySelector("dd").innerHTML = Intl.NumberFormat('en-US', {
        style: "currency", currency: "USD"
    }).format(totalPrice);
    //document.getElementById('total_price').querySelector("dt").innerHTML = 'Total';
}

/*************************************************************************/

//Payment box party
const cardNumberInput = document.getElementById('card-number-input');
const cardNumberLabel = document.getElementById('card-number-label')
const expirationInput = document.getElementById('expiration-input');
const monthInput = expirationInput.querySelector('#month-input');
const yearInput = expirationInput.querySelector('#year-input');
const expirationLabel = document.getElementById('expiration-label');
const monthLabel = expirationLabel.querySelector('#month-label');
const yearLabel = expirationLabel.querySelector('#year-label');
const cvvInput = document.getElementById('cvv-input');
const cvvLabel = document.getElementById('cvv-label');

//show card number
cardNumberInput.addEventListener("keyup", function (e) {
    var enteredValue = cardNumberInput.value;
    var enteredValueArr = Array.from(enteredValue);
    var enteredValueLength = enteredValueArr.length;
    var quad1 = cardNumberLabel.querySelector('#quad-1');
    var quad2 = cardNumberLabel.querySelector('#quad-2');
    var quad3 = cardNumberLabel.querySelector('#quad-3');
    var quad4 = cardNumberLabel.querySelector('#quad-4');

    //Change operator logo
    if (enteredValueLength > 0) {
        const operatorLogo = document.getElementById('operator_logo');
        const AmericanExpressLogoPath = "../res/img/americexp.png";
        const VisaLogoPath = "../res/img/Visa.png";
        const MasterCardLogoPath = "../res/img/mastercard.png";
        const DiscoverLogoPath = "../res/img/Discover.png";
        const EmptyPngPath = "../res/img/empty.png";
        var firstDigitValue = parseInt(enteredValueArr[0]);
        if (enteredValueLength > 0) {
            switch (firstDigitValue) {
                case 3:
                    operatorLogo.src = AmericanExpressLogoPath;
                    operatorLogo.style.width = '80px';
                    operatorLogo.style.height = '40px';
                    break;

                case 4:
                    operatorLogo.src = VisaLogoPath;
                    operatorLogo.style.width = '100px';
                    operatorLogo.style.height = '30px';
                    break;

                case 5:
                    operatorLogo.src = MasterCardLogoPath;
                    operatorLogo.style.width = '80px';
                    operatorLogo.style.height = '40px';
                    break;

                case 6:
                    operatorLogo.src = DiscoverLogoPath;
                    operatorLogo.style.width = '100px';
                    operatorLogo.style.height = '20px';
                    break;

                default :
                    operatorLogo.src = EmptyPngPath;
                    break;
            }
        } else {
            operatorLogo.src = EmptyPngPath;
        }
    }

    switch (enteredValueLength) {
        case 0:
            quad1.innerHTML = '- - - -';
            quad2.innerHTML = '- - - -';
            quad3.innerHTML = '- - - -';
            quad4.innerHTML = '- - - -';
            break;

        case 4:
            quad2.innerHTML = '- - - -';
            quad3.innerHTML = '- - - -';
            quad4.innerHTML = '- - - -';
            break;

        case 8:
            quad3.innerHTML = '- - - -';
            quad4.innerHTML = '- - - -';
            break;

        case 12:
            quad4.innerHTML = '- - - -';
            break;

    }

    if (enteredValueLength > 0 && enteredValueLength <= 4) {
        //So We will change only quad1 value & the others stay '0000'
        switch (enteredValueLength) {
            case 1 :
                quad1.innerHTML = enteredValueArr[0] + ' - - -';
                break;

            case 2 :
                quad1.innerHTML = enteredValueArr[0] + '' + enteredValueArr[1] + ' - -';
                break;

            case 3 :
                quad1.innerHTML = enteredValueArr[0] + '' + enteredValueArr[1] + '' + enteredValueArr[2] + ' -';
                break;

            case 4 :
                quad1.innerHTML = enteredValueArr[0] + '' + enteredValueArr[1] + '' + enteredValueArr[2] + '' + enteredValueArr[3];
                break;

        }
        quad2.innerHTML = '- - - -';
        quad3.innerHTML = '- - - -';
        quad4.innerHTML = '- - - -';
    } else if (enteredValueLength > 4 && enteredValueLength <= 8) {
        //So We will change only quad1 & quad2, the 2 others stay '0000'
        quad1.innerHTML = enteredValueArr[0] + '' + enteredValueArr[1] + '' + enteredValueArr[2] + '' + enteredValueArr[3];
        switch (enteredValueLength) {
            case 5 :
                quad2.innerHTML = enteredValueArr[4] + ' - - -';
                break;

            case 6 :
                quad2.innerHTML = enteredValueArr[4] + '' + enteredValueArr[5] + ' - -';
                break;

            case 7 :
                quad2.innerHTML = enteredValueArr[4] + '' + enteredValueArr[5] + '' + enteredValueArr[6] + ' -';
                break;

            case 8 :
                quad2.innerHTML = enteredValueArr[4] + '' + enteredValueArr[5] + '' + enteredValueArr[6] + '' + enteredValueArr[7];
                break;

        }
        quad3.innerHTML = '- - - -';
        quad4.innerHTML = '- - - -';
    } else if (enteredValueLength > 8 && enteredValueLength <= 12) {
        //So We will keep only quad4 & the others will be changed
        quad1.innerHTML = enteredValueArr[0] + '' + enteredValueArr[1] + '' + enteredValueArr[2] + '' + enteredValueArr[3];
        quad2.innerHTML = enteredValueArr[4] + '' + enteredValueArr[5] + '' + enteredValueArr[6] + '' + enteredValueArr[7];
        switch (enteredValueLength) {
            case 9 :
                quad3.innerHTML = enteredValueArr[8] + ' - - -';
                break;

            case 10 :
                quad3.innerHTML = enteredValueArr[8] + '' + enteredValueArr[9] + ' - -';
                break;

            case 11 :
                quad3.innerHTML = enteredValueArr[8] + '' + enteredValueArr[9] + '' + enteredValueArr[10] + ' -';
                break;

            case 12 :
                quad3.innerHTML = enteredValueArr[8] + '' + enteredValueArr[9] + '' + enteredValueArr[10] + '' + enteredValueArr[11];
                break;

        }
        quad4.innerHTML = '- - - -';
    } else if (enteredValueLength > 12 && enteredValueLength <= 16) {
        //So We will change all the quads
        quad1.innerHTML = enteredValueArr[0] + '' + enteredValueArr[1] + '' + enteredValueArr[2] + '' + enteredValueArr[3];
        quad2.innerHTML = enteredValueArr[4] + '' + enteredValueArr[5] + '' + enteredValueArr[6] + '' + enteredValueArr[7];
        quad3.innerHTML = enteredValueArr[8] + '' + enteredValueArr[9] + '' + enteredValueArr[10] + '' + enteredValueArr[11];
        switch (enteredValueLength) {
            case 13 :
                quad4.innerHTML = enteredValueArr[12] + ' - - -';
                break;

            case 14 :
                quad4.innerHTML = enteredValueArr[12] + '' + enteredValueArr[13] + ' - -';
                break;

            case 15 :
                quad4.innerHTML = enteredValueArr[12] + '' + enteredValueArr[13] + '' + enteredValueArr[14] + ' -';
                break;

            case 16 :
                quad4.innerHTML = enteredValueArr[12] + '' + enteredValueArr[13] + '' + enteredValueArr[14] + '' + enteredValueArr[15];
                break;

        }
    }
})

//show CVV
cvvInput.addEventListener("keyup", function (e) {
    var enteredValue = cvvInput.value;
    var enteredValueArr = Array.from(enteredValue);
    var enteredValueLength = enteredValueArr.length;

    switch (enteredValueLength) {
        case 0 :
            cvvLabel.innerHTML = '- - -';
            break;

        case 1 :
            cvvLabel.innerHTML = enteredValueArr[0] + ' - -';
            break;

        case 2 :
            cvvLabel.innerHTML = enteredValueArr[0] + enteredValueArr[1] + ' -';
            break;

        case 3 :
            cvvLabel.innerHTML = enteredValueArr[0] + enteredValueArr[1] + enteredValueArr[2];
            break;
    }
})

//Show expiration date
//Show month
monthInput.addEventListener("keyup", function (e) {

    var enteredValue = monthInput.value;
    var enteredValueArr = Array.from(enteredValue);
    var enteredValueLength = enteredValueArr.length;

    switch (enteredValueLength) {
        case 0 :
            monthLabel.innerHTML = '- -';
            break;

        case 1 :
            monthLabel.innerHTML = '0' + enteredValueArr[0];
            break;

        case 2 :
            monthLabel.innerHTML = enteredValueArr[0] + enteredValueArr[1];
            break;
    }
})

//Show year
yearInput.addEventListener("keyup", function (e) {
    var enteredValue = yearInput.value;
    var enteredValueArr = Array.from(enteredValue);
    var enteredValueLength = enteredValueArr.length;

    switch (enteredValueLength) {
        case 0 :
            yearLabel.innerHTML = '- - - -';
            break;

        case 1 :
            yearLabel.innerHTML = '- - -' + enteredValueArr[0];
            break;

        case 2 :
            yearLabel.innerHTML = enteredValueArr[0] + enteredValueArr[1];
            break;

        case 3 :
            yearLabel.innerHTML = '-' + enteredValueArr[0] + enteredValueArr[1] + enteredValueArr[2];
            break;

        case 4 :
            yearLabel.innerHTML = enteredValueArr[0] + enteredValueArr[1] + enteredValueArr[2] + enteredValueArr[3];
            break;
    }
})

//force inputs to accept integer values only
function onlyNumberKey(event) {
    var ASCIIcode = (event.wich) ? event.wich : event.keyCode;
    if (ASCIIcode > 31 && (ASCIIcode < 48 || ASCIIcode > 57)) return false;
    return true;
}