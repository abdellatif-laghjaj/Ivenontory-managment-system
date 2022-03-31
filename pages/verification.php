<?php
include '../db/connection.php';
if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    //check if inputs are empty
    if (empty($full_name) || empty($username) || empty($email) || empty($phone)) {
        echo "<script>alert('Please fill all the fields')</script>";
    } else {
        //get data from database
        $query = "SELECT * FROM admin WHERE username = '$username'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);

        $db_full_name = $row['full_name'];
        $db_username = $row['username'];
        $db_email = $row['email'];
        $db_phone = $row['phone'];

        //check if the data is correct
        if ($full_name == $db_full_name && $username == $db_username && $email == $db_email && $phone == $db_phone) {
            echo "<script>
                    alert('Verification Successful');
                    window.location.href = 'reset_password.php';
                </script>";
        } else {
            echo "<script>alert('Verification Failed')</script>";
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

    <form action="verification.php" method="post">
        <div class="input-container">
            <i class="icon"><img src="../res/img/profile.png" alt=""></i>
            <input class="input-field" type="text" placeholder="Full name" name="full_name">
        </div>

        <div class="input-container">
            <i class="icon"><img src="../res/img/user.png" alt=""></i>
            <input class="input-field" type="text" placeholder="Username" name="username">
        </div>

        <div class="input-container">
            <i class="icon"><img src="../res/img/email.png" alt=""></i>
            <input class="input-field" type="email" placeholder="E-mail" name="email">
        </div>

        <div class="input-container">
            <i class="icon"><img src="../res/img/phone.png" alt=""></i>
            <input class="input-field" type="tel" placeholder="Phone number" name="phone">
        </div>

        <button type="submit" name="submit" class="btn">VERIFY</button>
    </form>
</div>

<footer>
    <center>
        <p>Tex-GEAR, All rights reserved @2022</p>
    </center>
</footer>
</body>
</html>