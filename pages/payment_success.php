<?php

include("../db/connection.php");

session_start();

$ordersJSON = "NULL";

if (isset($_POST['orders'])) {
    $ordersJSON = $_POST['orders'];
    $ordersArr = json_decode($_POST['orders'], true);
    $payment_success = true;
    foreach ($ordersArr as $key => $value) {
        //UPDATE SALES & STOCK OF EACH  PRODUCT
        $sql = "UPDATE `product` SET `sales` = (SELECT `sales` FROM `product` WHERE `product`.`productID` = " . $value['id'] . ") + " . $value['quantity'] . ", `stock` = (SELECT `stock` FROM `product` WHERE `product`.`productID` = " . $value['id'] . ") - " . $value['quantity'] . " WHERE `product`.`productID` =  " . $value['id'];
        if(mysqli_query($con, $sql))
            $payment_success = true;
        else
            $payment_success = false;

        //ADD SALES
        $sale_price = (float) mysqli_fetch_assoc(mysqli_query($con, "SELECT sale_price FROM product WHERE productID = " . $value['id']))['sale_price'];
        $buy_price = (float) mysqli_fetch_assoc(mysqli_query($con, "SELECT buy_price FROM product WHERE productID = " . $value['id']))['buy_price'];
        $earning = ($sale_price - $buy_price) * ((int) $value['quantity']);
        if (isset($_SESSION['customerID'])) {
            $insertQuery = "INSERT INTO `sale` (`customerID`, `productID`, `quantity`, `earning`, `sale_date`) VALUES ('" . $_SESSION['customerID'] . "', '" . $value['id'] . "', '" . $value['quantity'] . "', '" . $earning . "', CURRENT_DATE())";
            if(mysqli_query($con, $insertQuery))
                $payment_success = true;
            else
                $payment_success = false;
        } else {
            $payment_success = false;
        }

        if($payment_success) {
            echo "<script>sessionStorage.clear();</script>";
            echo '
                    <!doctype html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport"
                              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
                                integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
                        <title>Document</title>
                    </head>
                    
                    <style>
                        :root {
                            --success-color: #45d261;
                        }
                    
                        * {
                            margin: 0;
                            padding: 0;
                            box-sizing: border-box;
                        }
                    
                        body {
                            background-color: #191919;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 100vh;
                            font-family: Cairo;
                        }
                    
                        .container {
                            margin: 100px auto;
                            height: 500px;
                            padding: 100px 0;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            flex-direction: column;
                            width: 100%;
                            background-color: #FCFCFC;
                            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                        }
                    
                        .checkmark_ok {
                            position: absolute;
                            animation: grow 1.4s cubic-bezier(0.42, 0, 0.275, 1.155) both;
                        }
                    
                        .checkmark_ok:nth-child(1) {
                            width: 12px;
                            height: 12px;
                            left: 12px;
                            top: 16px;
                        }
                    
                        .checkmark_ok:nth-child(2) {
                            width: 18px;
                            height: 18px;
                            left: 168px;
                            top: 84px;
                        }
                    
                        .checkmark_ok:nth-child(3) {
                            width: 10px;
                            height: 10px;
                            left: 32px;
                            top: 162px;
                        }
                    
                        .checkmark_ok:nth-child(4) {
                            width: 20px;
                            height: 20px;
                            left: 82px;
                            top: -12px;
                        }
                    
                        .checkmark_ok:nth-child(5) {
                            width: 14px;
                            height: 14px;
                            left: 125px;
                            top: 162px;
                        }
                    
                        .checkmark_ok:nth-child(6) {
                            width: 10px;
                            height: 10px;
                            left: 16px;
                            top: 16px;
                        }
                    
                        .checkmark_ok:nth-child(1) {
                            animation-delay: 1.7s;
                        }
                    
                        .checkmark_ok:nth-child(2) {
                            animation-delay: 1.4s;
                        }
                    
                        .checkmark_ok:nth-child(3) {
                            animation-delay: 2.1s;
                        }
                    
                        .checkmark_ok:nth-child(4) {
                            animation-delay: 2.8s;
                        }
                    
                        .checkmark_ok:nth-child(5) {
                            animation-delay: 3.5s;
                        }
                    
                        .checkmark_ok:nth-child(6) {
                            animation-delay: 4.2s;
                        }
                    
                        .checkmark {
                            position: relative;
                            padding: 30px;
                            /*   animation: checkmark 5.6s cubic-bezier(0.42, 0, 0.275, 1.155) both; */
                            animation: checkmark 5.6s cubic-bezier(0.42, 0, 0.275, 1.155) both;
                        }
                    
                        .checkmark__check {
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            z-index: 10;
                            transform: translate3d(-50%, -50%, 0);
                            fill: #fff;
                        }
                    
                        .checkmark__back {
                            animation: rotate 35s linear both infinite;
                        }
                    
                        @keyframes rotate {
                            0% {
                                transform: rotate(0deg);
                            }
                            100% {
                                transform: rotate(360deg);
                            }
                        }
                    
                        @keyframes grow {
                            0%, 100% {
                                transform: scale(0);
                            }
                            50% {
                                transform: scale(1);
                            }
                        }
                    
                        @keyframes checkmark {
                            0%, 100% {
                                opacity: 0;
                                transform: scale(0);
                            }
                            10%, 50%, 90% {
                                opacity: 1;
                                transform: scale(1);
                            }
                        }
                    
                    </style>
                    
                    <body>
                    <div class="container"><h3 style="color: #e65c4d">Thank You Dear, <span style="color: #1f1f1f">' . $_SESSION['full_name'] . '</span> </h3>                 
                        <div class="row mx-auto">
                            <div class="col-12">
                                <div class="checkmark">
                                    <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z"
                                              fill="var(--success-color)">
                                    </svg>
                                    <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z"
                                              fill="var(--success-color)">
                                    </svg>
                                    <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z"
                                              fill="var(--success-color)">
                                    </svg>
                                    <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z"
                                              fill="var(--success-color)">
                                    </svg>
                                    <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z"
                                              fill="var(--success-color)">
                                    </svg>
                                    <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z"
                                              fill="var(--success-color)">
                                    </svg>
                                    <svg class="checkmark__check" height="36" viewBox="0 0 48 36" width="48"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M47.248 3.9L43.906.667a2.428 2.428 0 0 0-3.344 0l-23.63 23.09-9.554-9.338a2.432 2.432 0 0 0-3.345 0L.692 17.654a2.236 2.236 0 0 0 .002 3.233l14.567 14.175c.926.894 2.42.894 3.342.01L47.248 7.128c.922-.89.922-2.34 0-3.23">
                                    </svg>
                                    <svg class="checkmark__back" height="115" viewBox="0 0 120 115" width="120"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M107.332 72.938c-1.798 5.557 4.564 15.334 1.21 19.96-3.387 4.674-14.646 1.605-19.298 5.003-4.61 3.368-5.163 15.074-10.695 16.878-5.344 1.743-12.628-7.35-18.545-7.35-5.922 0-13.206 9.088-18.543 7.345-5.538-1.804-6.09-13.515-10.696-16.877-4.657-3.398-15.91-.334-19.297-5.002-3.356-4.627 3.006-14.404 1.208-19.962C10.93 67.576 0 63.442 0 57.5c0-5.943 10.93-10.076 12.668-15.438 1.798-5.557-4.564-15.334-1.21-19.96 3.387-4.674 14.646-1.605 19.298-5.003C35.366 13.73 35.92 2.025 41.45.22c5.344-1.743 12.628 7.35 18.545 7.35 5.922 0 13.206-9.088 18.543-7.345 5.538 1.804 6.09 13.515 10.696 16.877 4.657 3.398 15.91.334 19.297 5.002 3.356 4.627-3.006 14.404-1.208 19.962C109.07 47.424 120 51.562 120 57.5c0 5.943-10.93 10.076-12.668 15.438z"
                                              fill="var(--success-color)">
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        setTimeout(function () {
                            window.location.href = "index.php";
                        }, 6000)
                    </script>
                    </body>
                    </html>
            ';
        } else {
            echo "<script>if(confirm('Payement failed! Please retry.')){window.location.href = 'index.php';}</script>";
        }
    }
}
?>