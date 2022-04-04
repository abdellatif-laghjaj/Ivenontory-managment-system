<?php
include '../db/connection.php';
session_start();
$username = "";
$password = "";

if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $_SESSION['admin'] = false;

    if (empty($username) || empty($password)) {
        echo "<script>alert('Please fill in all the fields')</script>";
    } else {
        $admin = "SELECT username, password FROM admin WHERE adminID = 1";
        $result = mysqli_query($con, $admin);
        $row = mysqli_fetch_assoc($result);

        //check if username and password match
        if ($username == $row['username'] && $password == $row['password']) {
            $_SESSION['admin'] = true;
            $_SESSION['username'] = $username;
            header("Location: admin.php");
        } else {
            echo "<script>alert('Username or password is incorrect')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../res/img/logo.svg">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/loading.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <title>Login</title>
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
<header>
    <a href="login.php" class="logo"><span>Tex</span>GEAR<span></span></a>
</header>

<?php include('loading.php'); ?>

<div class="container">
    <img src="../res/img/avatar.png" alt="" class="login-img">
    <h1>Identification</h1>
    <hr color="#FF304F" width="250" size="4">

    <form action="login.php" method="POST">
        <div class="input-container">
            <i class="icon"><img src="../res/img/user.png" alt=""></i>
            <input class="input-field" type="text" placeholder="Username" name="username">
        </div>

        <div class="input-container">
            <i class="icon"><img src="../res/img/password.png" alt=""></i>
            <input class="input-field" type="password" placeholder="Password" name="password">
        </div>

        <button type="submit" name="login" class="btn">LOGIN</button>

        <a href="verification.php">Forgot password ?</a>
    </form>
</div>

<footer>
    <center>
        <p>TexGEAR, All rights reserved @2022</p>
    </center>
</footer>

<script>
    var closeBtn = document.querySelector(".closebtn");
    closeBtn.onclick = function () {
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function () {
            div.style.display = "none";
        }, 600);
    }
</script>

<script>
    // for loading page
    const header = document.querySelector("header");
    const container = document.querySelector(".container");
    const loading = document.querySelector(".loading");

    header.style.display = 'none';
    container.style.display = 'none';

    setTimeout(function () {
        loading.style.display = 'none';
        header.style.display = 'block';
        container.style.display = 'flex';
    }, 2000);

</script>
</body>
</html>