<?php
include '../db/connection.php';
//update product
if (isset($_POST['submit'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_sale_price = $_POST['product_sale_price'];
    $product_qnt = $_POST['product_qnt'];

//check if the input is empty
    if (empty($product_name) || empty($product_sale_price) || empty($product_qnt) || empty($product_id)) {
        echo "<script>alert('Please fill all the fields')</script>";
    } else {
        $sql = "UPDATE product SET name = '$product_name', sale_price = '$product_sale_price', stock = '$product_qnt' WHERE productID = '$product_id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.location.href = 'admin.php'</script>";
        } else {
            echo "<script>alert('Product not updated')</script>";
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../res/img/logo.svg">
    <title>Update Product</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        color: #1a1f36;
        box-sizing: border-box;
        word-wrap: break-word;
        font-family: Cairo;
    }

    body {
        min-height: 100%;
        background-color: #143562;
    }

    h1 {
        letter-spacing: -1px;
    }

    .login-root {
        background: #ff304f;
        display: flex;
        width: 100%;
        min-height: 100vh;
        overflow: hidden;
    }

    .loginbackground {
        min-height: 692px;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        top: 0;
        z-index: 0;
        overflow: hidden;
    }

    .flex-flex {
        display: flex;
    }

    .align-center {
        align-items: center;
    }

    .center-center {
        align-items: center;
        justify-content: center;
    }

    .box-root {
        box-sizing: border-box;
    }

    .flex-direction--column {
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .loginbackground-gridContainer {
        display: -ms-grid;
        display: grid;
        -ms-grid-columns: [start] 1fr [left-gutter] (86.6px) [ 16 ] [ left-gutter ] 1 fr [ end ];
        grid-template-columns: [start] 1fr [left-gutter] repeat(16, 86.6px) [left-gutter] 1fr [end];
        -ms-grid-rows: [top] 1fr [top-gutter] (64px) [ 8 ] [ bottom-gutter ] 1 fr [ bottom ];
        grid-template-rows: [top] 1fr [top-gutter] repeat(8, 64px) [bottom-gutter] 1fr [bottom];
        justify-content: center;
        margin: 0 -2%;
        transform: rotate(-12deg) skew(-12deg);
    }

    .padding-top--64 {
        padding-top: 64px;
    }

    .padding-top--24 {
        padding-top: 24px;
    }

    .padding-top--48 {
        padding-top: 48px;
    }

    .padding-bottom--24 {
        padding-bottom: 18px;
    }

    .padding-horizontal--48 {
        padding: 48px;
    }

    .padding-bottom--15 {
        padding-bottom: 15px;
    }


    .flex-justifyContent--center {
        -ms-flex-pack: center;
        justify-content: center;
    }

    .formbg {
        margin: 0px auto;
        width: 100%;
        max-width: 448px;
        background: white;
        border-radius: 4px;
        box-shadow: rgba(60, 66, 87, 0.12) 0px 7px 14px 0px, rgba(0, 0, 0, 0.12) 0px 3px 6px 0px;
    }

    span {
        display: block;
        font-size: 20px;
        line-height: 28px;
        color: #1a1f36;
    }

    label {
        margin-bottom: 10px;
    }

    .reset-pass a, label {
        font-size: 14px;
        font-weight: 600;
        display: block;
    }

    .reset-pass > a {
        text-align: right;
        margin-bottom: 10px;
    }

    .grid--50-50 {
        display: grid;
        grid-template-columns: 50% 50%;
        align-items: center;
    }

    .field input {
        font-size: 16px;
        line-height: 28px;
        padding: 8px 16px;
        width: 100%;
        min-height: 44px;
        border: none;
        border-radius: 4px;
        background-color: rgb(255, 255, 255);
        box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px,
        rgba(0, 0, 0, 0) 0px 0px 0px 0px,
        rgba(0, 0, 0, 0) 0px 0px 0px 0px,
        rgba(60, 66, 87, 0.16) 0px 0px 0px 1px,
        rgba(0, 0, 0, 0) 0px 0px 0px 0px,
        rgba(0, 0, 0, 0) 0px 0px 0px 0px,
        rgba(0, 0, 0, 0) 0px 0px 0px 0px;
        transition: all 60ms ease 0s;
    }

    input[type="submit"] {
        background-color: #ff304f;
        box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px,
        rgba(0, 0, 0, 0) 0px 0px 0px 0px,
        rgba(0, 0, 0, 0.12) 0px 1px 1px 0px,
        #ff304f 0px 0px 0px 1px,
        rgba(0, 0, 0, 0) 0px 0px 0px 0px,
        rgba(0, 0, 0, 0) 0px 0px 0px 0px,
        rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;
        color: #fff;
        font-weight: 600;
        cursor: pointer;
        margin-bottom: 0;
    }

    input[type="button"] {
        background-color: transparent;
        border: 1px solid #ff304f;
        cursor: pointer;
    }

    .animationRightLeft {
        animation: animationRightLeft 2s ease-in-out infinite;
    }

    .animationLeftRight {
        animation: animationLeftRight 2s ease-in-out infinite;
    }

    .tans3s {
        animation: animationLeftRight 3s ease-in-out infinite;
    }

    .tans4s {
        animation: animationLeftRight 4s ease-in-out infinite;
    }

    @keyframes animationLeftRight {
        0% {
            transform: translateX(0px);
        }
        50% {
            transform: translateX(1000px);
        }
        100% {
            transform: translateX(0px);
        }
    }

    @keyframes animationRightLeft {
        0% {
            transform: translateX(0px);
        }
        50% {
            transform: translateX(-1000px);
        }
        100% {
            transform: translateX(0px);
        }
    }
</style>
<body>
<div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
        <div class="loginbackground box-background--white padding-top--64">
            <div class="loginbackground-gridContainer">
                <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                    <div class="box-root"
                         style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
                    </div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
                    <div class="box-root box-divider--light-all-2 animationLeftRight tans3s"
                         style="flex-grow: 1;"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                    <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                    <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                    <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                    <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                    <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                    <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
                    <div class="box-root box-divider--light-all-2 animationRightLeft tans3s"
                         style="flex-grow: 1;"></div>
                </div>
            </div>
        </div>
        <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
            <div class="formbg-outer">
                <div class="formbg">
                    <div class="formbg-inner" style="padding: 18px 28px;">
                        <span class="padding-bottom--15 title"
                              style="font-weight: bold; font-size: 24px; color: #ff304f;">Update product of ID</span>
                        <form action="update_product.php" method="post" id="stripe-login">
                            <div class="field padding-bottom--24">
                                <label for="product_id">Product ID (not editable)</label>
                                <input type="number" class="pid" name="product_id">
                            </div>
                            <div class="field padding-bottom--24">
                                <label for="product_name">Product name</label>
                                <input required type="text" class="pname" name="product_name"
                                       placeholder="Enter product name">
                            </div>
                            <div class="field padding-bottom--24">
                                <label for="product_price">Product sale price</label>
                                <input required type="number" class="pprice" name="product_sale_price" min="1"
                                       placeholder="Enter product price">
                            </div>
                            <div class="field padding-bottom--24">
                                <label for="product_qnt">Product quantity</label>
                                <input required type="number" class="pqnt" name="product_qnt" min="0"
                                       placeholder="Enter product quantity">
                            </div>
                            <div class="field padding-bottom--24">
                                <input type="submit" name="submit" value="Update">
                            </div>
                            <div class="field padding-bottom--16">
                                <input type="button" value="Back" onclick="window.location.href='admin.php'">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    loadData();

    //get data of the clicked product
    function loadData() {
        const url = window.location.href;
        const urlParams = new URLSearchParams(url);
        // const id = urlParams.get('id');
        const id = url.split('=')[1].replace('&name', '');
        const name = urlParams.get('name');
        const price = urlParams.get('price');
        const qnt = urlParams.get('qnt');

        const title = document.querySelector('.title');
        const pname = document.querySelector('.pname');
        const pprice = document.querySelector('.pprice');
        const pqnt = document.querySelector('.pqnt');
        const pid = document.querySelector('.pid');

        title.innerHTML = `Update product of ID ${id}`;
        pname.value = name;
        pprice.value = price.replace('$', '');
        pqnt.value = qnt;
        pid.value = parseInt(id);
    }
</script>
</body>
</html>