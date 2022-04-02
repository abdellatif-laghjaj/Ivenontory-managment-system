<?php
    session_start();

    if (isset($_SESSION['customerID'])) {
        unset($_SESSION['customerID']);
        unset($_SESSION);
    }

    header("location: ../pages/index.php");