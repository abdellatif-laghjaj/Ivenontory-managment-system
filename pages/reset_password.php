<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <title>Login</title>
</head>
<body>
    <header>
        <a href="login.php" class="logo"><span>Tex</span>GEAR<span></span></a>
    </header>

    <div class="container">
        <h1>RESET PASSWORD</h1>
        <hr color="#FF304F" width="250" size="4">

        <form action="login.php">
            <div class="input-container">
                <i class="icon"><img src="../res/img/password.png" alt=""></i>
                <input class="input-field" type="text" placeholder="New password" name="usrnm">
            </div>

            <div class="input-container">
                <i class="icon"><img src="../res/img/password.png" alt=""></i>
                <input class="input-field" type="password" placeholder="Confirm password" name="psw">
            </div>

            <button type="submit" class="btn">RESET PASSWORD</button>

            <a href="reset_password.php">Forgot password ?</a>
        </form> 
    </div>

    <footer>
        <center>
            <p>Tex-GEAR, All rights reserved @2022</p>
        </center>
    </footer>
</body>
</html>