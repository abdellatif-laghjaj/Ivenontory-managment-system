<?php
    include '../db/connection.php';
    include '../client/functions.php';

    $query = "SELECT * FROM `category` ORDER BY `category`.`category_name` ASC";
    $result = mysqli_query($con, $query);

    echo '<script language="JavaScript">var categories = [];</script>';

    if (mysqli_num_rows($result) > 0) {
        while ($categories = mysqli_fetch_assoc($result)) {
            $category_name = $categories["category_name"];
            echo '<script language="JavaScript">categories.push("'.$category_name.'");</script>';
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mt-5 shadow p-2 mb-5 bg-body rounded" id="products-all">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold">Products</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        categories
                    </a>
                    <ul class="dropdown-menu" id="dropdown-menu" aria-labelledby="navbarDropdown">
                    </ul>
                    <script language="JavaScript">
                        const dropdown_menu = document.getElementById('dropdown-menu');
                        var dropdown_menu_html = '<li><a class="dropdown-item">All</a></li>';
                        if (categories.length == 0) {
                            dropdown_menu.innerHTML = "";
                        } else if(categories.length == 1) {
                            dropdown_menu.innerHTML = '<li><a class="dropdown-item">'+categories[0]+'</a></li>';
                        } else {
                            for (var i = 0; i < categories.length; i++) {
                                dropdown_menu_html += '<li><a class="dropdown-item">'+categories[i]+'</a></li>';
                            }
                            dropdown_menu.innerHTML = dropdown_menu_html;
                        }
                    </script>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Sort by
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item">Price ⬇</a></li>
                        <li><a class="dropdown-item">Price ⬆</a></li>
                        <li><a class="dropdown-item">Newest</a></li>
                        <li><a class="dropdown-item">Oldest</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-1" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
    </div>
</nav>
</body>
</html>