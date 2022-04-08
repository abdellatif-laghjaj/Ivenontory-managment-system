<?php

function loadProducts($con, $query)
{

    echo 'console.log("query is => ' . $query . '");';

    echo '
                products = [];
                product = [];
      ';

    if ($result = mysqli_query($con, $query)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_name = addslashes($row["name"]); // 0
                $product_stock = addslashes($row["stock"]); // 1
                $product_price = addslashes($row["sale_price"]); // 2
                $product_image = addslashes($row["product_image"]); // 3
                $productID = addslashes($row["productID"]); // 4
                $product_category = addslashes($row["category"]); // 5
                $product_description = addslashes($row["description"]); // 6
                echo "            product.push('" . $product_name . "'); product.push('" . $product_stock . "'); product.push('" . $product_price . "'); product.push('" . $product_image . "'); product.push('" . $productID . "'); product.push('" . $product_category . "'); product.push('" . $product_description . "');";
                echo "\n";
                echo "            products.push(product);\n            product = [];\n";
            }
        }
    }

    echo "\n";

}