<?php

$serverName = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBname = "ecommerce";

$con = new mysqli($serverName, $DBusername, $DBpassword, $DBname);
if ($con->connect_error) {
    echo "Failed to connect: " . $con->connect_error();
}
