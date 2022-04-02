<?php
function loadProducts($con, $query) {

    $result = mysqli_query($con, $query);

    echo '
            products = []; 
            product = [];
          ';

    echo "\n";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $product_name = $row["name"]; // 0
            $product_stock = $row["stock"]; // 1
            $product_price = $row["sale_price"]; // 2
            $product_image = $row["product_image"]; // 3
            $productID = $row["productID"]; // 4
            $product_category = $row["category"]; // 5
            echo "            product.push('" . $product_name . "'); product.push('" . $product_stock . "'); product.push('" . $product_price . "'); product.push('" . $product_image . "'); product.push('" . $productID . "'); product.push('" . $product_category . "');";
            echo "\n";
            echo "            products.push(product);\n            product = [];\n";
        }
    }

    echo "\n";

}