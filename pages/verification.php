<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <title>Verification</title>
</head>
<body>
    <header>
        <a href="login.php" class="logo"><span>Tex</span>GEAR<span></span></a>
    </header>

    <div class="container">
        <img src="../res/img/verify_identity.png" alt="" class="login-img">
        <h1>Verify your identity</h1>
        <hr color="#FF304F" width="250" size="4">

        <form action="verification.php">
            <div class="input-container">
                <i class="icon"><img src="../res/img/profile.png" alt=""></i>
                <input class="input-field" type="text" placeholder="Full name" name="full_name">
            </div>

            <div class="input-container">
                <i class="icon"><img src="../res/img/user.png" alt=""></i>
                <input class="input-field" type="text" placeholder="Username" name="ver_username">
            </div>

            <div class="input-container">
                <i class="icon"><img src="../res/img/email.png" alt=""></i>
                <input class="input-field" type="email" placeholder="E-mail" name="email">
            </div>

            <div class="input-container">
                <i class="icon"><img src="../res/img/phone.png" alt=""></i>
                <input class="input-field" type="tel" placeholder="Phone number" name="phone">
            </div>

            <button type="submit" class="btn">VERIFY</button>
        </form> 
    </div>

    <footer>
        <center>
            <p>Tex-GEAR, All rights reserved @2022</p>
        </center>
    </footer>
</body>
</html>