<!DOCTYPE html>
<html>
<head>
    <title>TexGear - Payment Gateway</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/PaymentCard.css">
</head>
<body>
    <form method="post">
        <div class="card">
            <div class="logo">
                <span style="color: #28C7FA">Tex</span>
                <span>Gear</span>
            </div>
            <div class="empty"></div>
            <div class="total">
                <label>
                    <span>$ </span>
                    <span>1299</span>
                </label>
            </div>
            <div class="ship">
                <img src="../res/img/chip.png">
            </div>
            <div class="empty2"></div>
            <div class="cvv">
                <input id="CVV" type="text" name="CVV" placeholder="CVV" maxlength="3" onkeypress="return onlyNumberKey(event)">
            </div>
            <div class="card-number">
                <input id="card-number" type="text" name="card-number" placeholder="Card number">
            </div>
            <div class="holder-name">
                <input id="holder-name" type="text" name="holder-name" placeholder="Holder name">
            </div>
            <div class="valid-thru">
                <label>
                    <span>VALID</span>
                    <span>THRU</span>
                </label>
                <input id="valid-thru" type="text" name="valid-thru" placeholder="MM/YY">
            </div>
            <div class="operator-logo">
                <img id="operator-logo" src="">
            </div>
        </div>
        <input type="submit" value="PAY" class="submit">
    </form>

    <script language="JavaScript">
        const cvvInput = document.getElementById('CVV');
        const cardNumberInput = document.getElementById('card-number');
        const holderNameInput = document.getElementById('holder-name');
        const expiryDateInput = document.getElementById('valid-thru');
        const operatorLogo = document.getElementById('operator-logo');

        //format CVV input
        function onlyNumberKey(event) {
            var ASCIIcode = (event.wich) ? event.wich : event.keyCode;
            if (ASCIIcode > 31 && (ASCIIcode < 48 || ASCIIcode > 57))
                return false;
            return true;
        }
    </script>
    
</body>
</html>