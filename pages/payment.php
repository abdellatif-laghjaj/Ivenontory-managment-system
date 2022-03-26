<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TexGear - Payment Checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../style/PaymentCard.css">
</head>
<style>
    #toast {
        font-family: Cairo;
        visibility: hidden;
        max-width: 50px;
        height: 50px;
        /*margin-left: -125px;*/
        margin: auto;
        background-color: #ff1616;
        color: #fff;
        text-align: center;
        border-radius: 2px;

        position: fixed;
        z-index: 1;
        left: 0;
        right: 0;
        bottom: 30px;
        font-size: 17px;
        white-space: nowrap;
    }

    #toast #img {
        width: 50px;
        height: 50px;

        float: left;

        padding-top: 16px;
        padding-bottom: 16px;

        box-sizing: border-box;


        background-color: #ff6d6d;
        color: #fff;
    }

    #toast #desc {


        color: #fff;

        padding: 16px;

        overflow: hidden;
        white-space: nowrap;
    }

    #toast.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, expand 0.5s 0.5s, stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, expand 0.5s 0.5s, stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
    }

    @-webkit-keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }
        to {
            bottom: 30px;
            opacity: 1;
        }
    }

    @keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }
        to {
            bottom: 30px;
            opacity: 1;
        }
    }

    @-webkit-keyframes expand {
        from {
            min-width: 50px
        }
        to {
            min-width: 350px
        }
    }

    @keyframes expand {
        from {
            min-width: 50px
        }
        to {
            min-width: 350px
        }
    }

    @-webkit-keyframes stay {
        from {
            min-width: 350px
        }
        to {
            min-width: 350px
        }
    }

    @keyframes stay {
        from {
            min-width: 350px
        }
        to {
            min-width: 350px
        }
    }

    @-webkit-keyframes shrink {
        from {
            min-width: 350px;
        }
        to {
            min-width: 50px;
        }
    }

    @keyframes shrink {
        from {
            min-width: 350px;
        }
        to {
            min-width: 50px;
        }
    }

    @-webkit-keyframes fadeout {
        from {
            bottom: 30px;
            opacity: 1;
        }
        to {
            bottom: 60px;
            opacity: 0;
        }
    }

    @keyframes fadeout {
        from {
            bottom: 30px;
            opacity: 1;
        }
        to {
            bottom: 60px;
            opacity: 0;
        }
    }
</style>
<body>

<?php include 'loading.php' ?>
<div id="toast">
    <div id="img"><i class="fa fa-warning"></i></div>
    <div id="desc">Please fill the fields first !</div>
</div>

<div class="container">
    <div class="box order_box">
        <div class="head" style="color: #252525">Order Details</div>
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
        <div class="head" style="color: #252525">Payment Information</div>
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
<script src="../js/PaymentCard.js"></script>
<script>

    const check_out_btn = document.querySelector('.ui_btn');

    check_out_btn.addEventListener('click', function () {

        const errorSound = new Audio('../res/sounds/errorSound.wav');

        const card_number_input = document.querySelector('#card-number-input').value;
        const month_input = document.querySelector('#month-input').value;
        const year_input = document.querySelector('#year-input').value;
        const cvv_input = document.querySelector('#cvv-input').value;

        if (card_number_input === '' || month_input === '' || year_input === '' || cvv_input === '') {
            launch_toast();
            errorSound.play();
        } else {
            window.location.href = 'payment_success.php';
        }
    })

    function launch_toast() {
        const x = document.getElementById("toast");
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 3000);
    }
</script>
</body>

</html>