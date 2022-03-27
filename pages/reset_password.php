<?php
include '../db/connection.php';

$username = "admin";

if (isset($_POST['submit'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    //check if inputs are empty
    if (empty($new_password) || empty($confirm_password)) {
        echo "<script>alert('Please fill all the fields')</script>";
    } else {
        //check if new password and confirm password are same
        if ($new_password != $confirm_password) {
            echo "<script>alert('New password and confirm password are not same')</script>";
        } else {
            $update_password = "UPDATE admin SET password = '$new_password' WHERE username = '$username'";
            $run_update = mysqli_query($con, $update_password);

            if ($run_update) {
                echo "<script>
                        alert('Password updated successfully');
                        window.location.href = 'login.php';
                    </script>";
            } else {
                echo "<script>alert('Password not updated')</script>";
            }
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
    <link rel="stylesheet" href="../style/login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <title>Reset Password</title>
</head>
<body>
<header>
    <a href="login.php" class="logo"><span>Tex</span>GEAR<span></span></a>
</header>

<div class="container">
    <img src="../res/img/reset_password.png" alt="" class="login-img">
    <h1>Reset password</h1>
    <hr color="#FF304F" width="250" size="4">

    <form action="reset_password.php" method="post">
        <div class="input-container">
            <i class="icon"><img src="../res/img/password.png" alt=""></i>
            <input class="input-field" type="password" placeholder="New password" name="new_password">
        </div>

        <div class="input-container">
            <i class="icon"><img src="../res/img/password.png" alt=""></i>
            <input class="input-field" type="password" placeholder="Confirm password" name="confirm_password">
        </div>

        <button type="submit" name="submit" class="btn">RESET PASSWORD</button>

        <a href="login.php">Back to login !</a>
    </form>
</div>

<footer>
    <center>
        <p>Tex-GEAR, All rights reserved @2022</p>
    </center>
</footer>
</body>
</html>