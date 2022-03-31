<?php
include '../db/connection.php';
// get id from url
$id = $_GET['id'];

//remove product from database
$sql = "DELETE FROM product WHERE productID = '$id'";
//set null to productID in sales table
$sale = "UPDATE sale SET productID = NULL WHERE productID = '$id'";
$run_sale = mysqli_query($con, $sale);
$result = mysqli_query($con, $sql);
if (!$result) {
    echo "Error deleting record: " . mysqli_error($con);
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
    <title>Remove Product</title>
</head>
<style>

    * {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Cairo, sans-serif;
    }


    .context {
        width: 100vw;
        position: absolute;
        top: 40vh;
        display: flex;
        justify-content: center;
    }

    .context h1 {
        text-align: center;
        color: #fff;
        font-size: 50px;
    }

    .area {
        background: #4e54c8;
        background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);
        width: 100vw;
        height: 100vh;
    }

    .circles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        overflow: hidden;
    }

    .circles li {
        position: absolute;
        display: block;
        list-style: none;
        width: 20px;
        height: 20px;
        background: rgba(255, 255, 255, 0.2);
        animation: animate 25s linear infinite;
        bottom: -150px;

    }

    .circles li:nth-child(1) {
        left: 25%;
        width: 80px;
        height: 80px;
        animation-delay: 0s;
    }


    .circles li:nth-child(2) {
        left: 10%;
        width: 20px;
        height: 20px;
        animation-delay: 2s;
        animation-duration: 12s;
    }

    .circles li:nth-child(3) {
        left: 70%;
        width: 20px;
        height: 20px;
        animation-delay: 4s;
    }

    .circles li:nth-child(4) {
        left: 40%;
        width: 60px;
        height: 60px;
        animation-delay: 0s;
        animation-duration: 18s;
    }

    .circles li:nth-child(5) {
        left: 65%;
        width: 20px;
        height: 20px;
        animation-delay: 0s;
    }

    .circles li:nth-child(6) {
        left: 75%;
        width: 110px;
        height: 110px;
        animation-delay: 3s;
    }

    .circles li:nth-child(7) {
        left: 35%;
        width: 150px;
        height: 150px;
        animation-delay: 7s;
    }

    .circles li:nth-child(8) {
        left: 50%;
        width: 25px;
        height: 25px;
        animation-delay: 15s;
        animation-duration: 45s;
    }

    .circles li:nth-child(9) {
        left: 20%;
        width: 15px;
        height: 15px;
        animation-delay: 2s;
        animation-duration: 35s;
    }

    .circles li:nth-child(10) {
        left: 85%;
        width: 150px;
        height: 150px;
        animation-delay: 0s;
        animation-duration: 11s;
    }


    @keyframes animate {

        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
            border-radius: 0;
        }

        100% {
            transform: translateY(-1000px) rotate(720deg);
            opacity: 0;
            border-radius: 50%;
        }

    }

    .progress-container {
        height: 0.8rem;
        width: 32rem;
        border-radius: 0.4rem;

        background: #000;
    }

    .progress-container .progress {
        height: 100%;
        width: 0;
        border-radius: 0.4rem;

        background: #82bb5c;

        transition: width 0.4s ease;
    }

    .done-text {
        font-size: 1.2rem;
        color: #82bb5c;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 0.1rem;
        animation: done-animation 0.4s ease;
    }

    @media only screen and (max-width: 600px) {
        .progress-container {
            width: 20rem;
        }
    }

    @keyframes done-animation {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
</style>
<body>

<div class="context">
    <div class="success-container">
        <h1 class="done-text">0%</h1>
        <div class="progress-container">
            <div class="progress"></div>
        </div>
    </div>
</div>


<div class="area">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>

<script>
    const progressbar = document.querySelector(".progress");
    const doneText = document.querySelector(".done-text");

    const changeProgress = (progress) => {
        progressbar.style.width = `${progress}%`;
        doneText.innerText = `${progress}%`;
        if (progress >= 100) {
            doneText.innerHTML = "Done";
            window.location.href = "admin.php";
        }
    };

    /* change progress after 1 second (only for showcase) */
    setTimeout(() => changeProgress(22), 500);
    setTimeout(() => changeProgress(45), 1000);
    setTimeout(() => changeProgress(85), 1300);
    setTimeout(() => changeProgress(98), 1500);
    setTimeout(() => changeProgress(100), 2000);
</script>
</body>
</html>