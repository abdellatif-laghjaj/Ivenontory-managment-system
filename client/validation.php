<?php
include '../db/connection.php';
include '../client/functions.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {

        $checkUsernameQuery = "SELECT * FROM `customer` WHERE userName = '$username'";
        $checkUsernameResult = mysqli_query($con, $checkUsernameQuery);

        if ($checkUsernameResult) {

            $rows = mysqli_num_rows($checkUsernameResult);

            if ($rows >= 1) {

                $checkPasswordQuery = "SELECT * FROM `customer` WHERE userName = '" . $username . "'";
                $checkPasswordResult = mysqli_query($con, $checkPasswordQuery);
                $user_data = mysqli_fetch_assoc($checkPasswordResult);

                $decodedPassword = base64_decode($user_data['password']);

                if ($password == $decodedPassword) {
                    $_SESSION = $user_data;
                    header("location: ../pages/index.php");
                    die();
                } else {
                    header("location: ../pages/index.php");
                }
            } else {
                header("location: ../pages/index.php");
            }
        }
    }
}
die();