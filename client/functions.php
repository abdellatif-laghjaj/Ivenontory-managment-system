<?php

function loadProducts($con, $nbProductsInPage, $totalProducts, $currentPage, $isSearching, $isFiltering, $isSorting, $filter_by, $sort_by)
{
    $query = "SELECT * FROM product WHERE stock > 0";

//content parameters
    $nbPages = ceil($totalProducts / $nbProductsInPage);
    $bound = ($currentPage - 1) * $nbProductsInPage;

    if ($isSearching) {
        $search = $_GET['search'];
        if ($isFiltering) {
            $filter = $filter_by;
            if ($isSorting) {
                switch ($sort_by) {
                    case 1:
                        $query = "SELECT * FROM product WHERE (category = " . $filter . ") AND ((name LIKE = '%" . $search . "%') OR (description LIKE = '%" . $search . "%')) ORDER BY sale_price DESC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;

                    case 2:
                        $query = "SELECT * FROM product WHERE (category = " . $filter . ") AND ((name LIKE = '%" . $search . "%') OR (description LIKE = '%" . $search . "%')) ORDER BY sale_price ASC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;

                    case 3:
                        $query = "SELECT * FROM product WHERE (category = " . $filter . ") AND ((name LIKE = '%" . $search . "%') OR (description LIKE = '%" . $search . "%')) ORDER BY add_date DESC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;

                    case 4:
                        $query = "SELECT * FROM product WHERE (category = " . $filter . ") AND ((name LIKE = '%" . $search . "%') OR (description LIKE = '%" . $search . "%')) ORDER BY add_date ASC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;

                    case 5:
                        $query = "SELECT * FROM product WHERE (category = " . $filter . ") AND ((name LIKE = '%" . $search . "%') OR (description LIKE = '%" . $search . "%')) ORDER BY sales DESC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;
                }
            } else {
                $query = "SELECT * FROM product WHERE (category = " . $filter . ") AND ((name LIKE = '%" . $search . "%') OR (description LIKE = '%" . $search . "%')) LIMIT " . $bound . ", " . $nbProductsInPage;
            }
        } else {
            if ($isSorting) {
                switch ($sort_by) {
                    case 1:
                        $query = "SELECT * FROM product WHERE ((name LIKE = '%" . $search . "%') OR (description LIKE = '%" . $search . "%')) ORDER BY sale_price DESC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;

                    case 2:
                        $query = "SELECT * FROM product WHERE ((name LIKE = '%" . $search . "%') OR (description LIKE = '%" . $search . "%')) ORDER BY sale_price ASC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;

                    case 3:
                        $query = "SELECT * FROM product WHERE ((name LIKE = '%" . $search . "%') OR (description LIKE = '%" . $search . "%')) ORDER BY add_date DESC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;

                    case 4:
                        $query = "SELECT * FROM product WHERE ((name LIKE = '%" . $search . "%') OR (description LIKE = '%" . $search . "%')) ORDER BY add_date ASC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;

                    case 5:
                        $query = "SELECT * FROM product WHERE ((name LIKE = '%" . $search . "%') OR (description LIKE = '%" . $search . "%')) ORDER BY sales DESC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;
                }
            } else {
                $query = "SELECT * FROM product WHERE ((name LIKE = '%" . $search . "%') OR (description LIKE = '%" . $search . "%')) LIMIT " . $bound . ", " . $nbProductsInPage;
            }
        }
    } else {
        if ($isFiltering) {
            $filter = $filter_by;
            if ($isSorting) {
                switch ($sort_by) {
                    case 1:
                        $query = "SELECT * FROM product WHERE (category = " . $filter . ") ORDER BY sale_price DESC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;

                    case 2:
                        $query = "SELECT * FROM product WHERE (category = " . $filter . ") ORDER BY sale_price ASC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;

                    case 3:
                        $query = "SELECT * FROM product WHERE (category = " . $filter . ") ORDER BY add_date DESC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;

                    case 4:
                        $query = "SELECT * FROM product WHERE (category = " . $filter . ") ORDER BY add_date ASC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;

                    case 5:
                        $query = "SELECT * FROM product WHERE (category = " . $filter . ") ORDER BY sales DESC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;
                }
            } else {
                $query = "SELECT * FROM product WHERE (category = " . $filter . ") LIMIT " . $bound . ", " . $nbProductsInPage;
            }

        } else {
            if ($isSorting) {
                switch ($sort_by) {
                    case 1:
                        $query = "SELECT * FROM product ORDER BY sale_price DESC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;

                    case 2:
                        $query = "SELECT * FROM product ORDER BY sale_price ASC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;

                    case 3:
                        $query = "SELECT * FROM product ORDER BY add_date DESC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;

                    case 4:
                        $query = "SELECT * FROM product ORDER BY add_date ASC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;

                    case 5:
                        $query = "SELECT * FROM product ORDER BY sales DESC LIMIT " . $bound . ", " . $nbProductsInPage;
                        break;
                }
            } else {
                $query = "SELECT * FROM product LIMIT " . $bound . ", " . $nbProductsInPage;
            }
        }
    }

    $result = mysqli_query($con, $query);

    echo '
                products = [];
                product = [];
      ';

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