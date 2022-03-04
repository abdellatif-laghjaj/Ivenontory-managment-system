<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/alert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <title>Login</title>
</head>
<body>
    <header>
        <a href="login.php" class="logo"><span>Tex</span>GEAR<span></span></a>
    </header>

    <div class="container">

        <?php include('error_message.php')?>
        
        <img src="../res/img/avatar.png" alt="" width="5%">
        <h1>Identification</h1>
        <hr color="#FF304F" width="250" size="4">

        <form action="login.php">
            <div class="input-container">
                <i class="icon"><img src="../res/img/user.png" alt=""></i>
                <input class="input-field" type="text" placeholder="Username" name="usrnm">
            </div>

            <div class="input-container">
                <i class="icon"><img src="../res/img/password.png" alt=""></i>
                <input class="input-field" type="password" placeholder="Password" name="psw">
            </div>

            <button type="submit" class="btn">LOGIN</button>

            <a href="verification.php">Forgot password ?</a>
        </form> 
    </div>

    <footer>
        <center>
            <p>Tex-GEAR, All rights reserved @2022</p>
        </center>
    </footer>

    <script>
        var closeBtn = document.querySelector(".closebtn");
        closeBtn.onclick = function(){
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function(){ div.style.display = "none"; }, 600);
        }
    </script>
</body>
</html>