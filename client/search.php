<?php
include '../db/connection.php';
if ($_GET["search"] != "" || $_GET["search"] != " ") {
    $sql = "SELECT * FROM `product` WHERE (`name` LIKE '%" . $_GET["search"] . "%') OR (`category` LIKE '%" . $_GET["search"] . "%')";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
                    <option value="' . $row["name"] . '">
                ';
        }
    }
} else {
    echo "<option value='No suggestions'>";
}
