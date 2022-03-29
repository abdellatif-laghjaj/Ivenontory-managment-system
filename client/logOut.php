<?php
    session_start();

    if (isset($_SESSION['customerID'])) {
        unset($_SESSION['customerID']);
    }

    header("location: ../pages/index.php");