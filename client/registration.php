<?php
    include '../db/connection.php';
    include '../client/functions.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $searchQuery = "SELECT * FROM `customer` WHERE userName = '$username'";
        $searchResult = mysqli_query($con, $searchQuery);

        if ($searchResult) {
            $rows = mysqli_num_rows($searchResult);
            if ($rows >= 1) {
                header("location: ../pages/");
            } else {
                $hash = base64_encode($password);
                $insertQuery = "INSERT INTO `customer` (`customerID`, `full_name`, `userName`, `password`, `addresse`, `email`, `phone`) VALUES (NULL, '$full_name', '$username', '$hash', '$adresse', '$email', '$phone')";
                mysqli_query($con, $insertQuery);
                $_SESSION = mysqli_fetch_assoc($searchResult);
                header("location: ../pages/index.php");
            }
        }
    }

    die();
