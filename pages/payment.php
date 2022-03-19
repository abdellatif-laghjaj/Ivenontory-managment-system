<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TexGear - Payment Checkout</title>
    <link rel="stylesheet" href="../style/PaymentCard.css">
</head>

<body>
<div class="container">
    <div class="box order_box"">
        <div class="head">Order Details</div>
        <div class="body">
            <ul class="order_list" id="orders-list">
                <li>
                    <div style="
                                display: flex;
                                align-items: center;
                                justify-items: center;
                                height: 280px;
                                text-align: center;
                            ">
                        <h2>No product is added to cart yet!</h2>
                    </div>
                </li>
            </ul>
        </div>
        <div class="foot">
            <dl class="total_price" id="total_price">
                <dt></dt>
                <dd></dd>
            </dl>
        </div>
    </div>
    <div class="box payment_box">
        <div class="head">Payment Information</div>
        <div class="body">
            <div class="card">
                <div class="card_img">
                    <i class="operator_logo">
                        <img src="../res/img/empty.png" id="operator_logo" style="width: 70px; height: 40px;">
                    </i>
                    <div class="card_info">
                        <dl class="number">
                            <dt>card number</dt>
                            <dd>
                                <ul id="card-number-label">
                                    <li id="quad-1">- - - -</li>
                                    <li id="quad-2">- - - -</li>
                                    <li id="quad-3">- - - -</li>
                                    <li id="quad-4">- - - -</li>
                                </ul>
                            </dd>
                        </dl>
                        <dl class="expiration">
                            <dt>expiration</dt>
                            <dd id="expiration-label"><span id="month-label">- -</span> / <span
                                        id="year-label">- - - -</span></dd>
                        </dl>
                        <dl class="cvc">
                            <dt>cvc</dt>
                            <dd id="cvv-label">- - -</dd>
                        </dl>
                    </div>
                </div>
                <div class="card_form">
                    <div class="content">
                        <ul class="card_box">
                            <li class="number"><input type="text" placeholder="1234 5678 1234 5678" maxlength="16"
                                                      onkeypress="return onlyNumberKey(event)" id="card-number-input"/>
                            </li>
                            <li class="expiration" id="expiration-input">
                                <ul>
                                    <li id="month"><input type="text" placeholder="MM" maxlength="2"
                                                          onkeypress="return onlyNumberKey(event)" id="month-input"/>
                                    </li>
                                    <li id="separator">/</li>
                                    <li id="year"><input type="text" placeholder="YYYY" maxlength="4"
                                                         onkeypress="return onlyNumberKey(event)" id="year-input"/></li>
                                </ul>
                            </li>
                            <li class="cvc"><input type="text" placeholder="123" maxlength="3"
                                                   onkeypress="return onlyNumberKey(event)" id="cvv-input"/></li>
                        </ul>
                    </div>
                    <div class="footer">
                        <ul class="bar_tool">
                            <li class="cancel"><a href="index.php">Cancel</a></li>
                            <li><span class="ui_btn b_lg b_primary">Checkout</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="foot">

        </div>
    </div>
</div>
<script src="../js/PaymentCard.js" ></script>
</body>

</html>