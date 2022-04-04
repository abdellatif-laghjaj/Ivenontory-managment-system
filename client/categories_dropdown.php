<?php

$query = "SELECT * FROM `category` WHERE `products_total` > 0 ORDER BY `category`.`category_name` ASC";
$result = mysqli_query($con, $query);

echo '<script language="JavaScript">var categories = [];</script>';

if (mysqli_num_rows($result) > 0) {
    while ($categories = mysqli_fetch_assoc($result)) {
        $category_name = $categories["category_name"];
        echo '<script language="JavaScript">categories.push("' . $category_name . '");</script>';
    }
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light mt-5 shadow p-2 mb-5 bg-body rounded" id="products-all">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold">Products</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li>
                    <form style="margin-right: 12px;">
                        <select id="categories_list" name="filter_by" class="form-select form-select-sm"
                                aria-label=".form-select-sm example">
                        </select>
                    </form>

                </li>

                <li>
                    <form style="margin-right: 12px;">
                        <select id="sort_selector" name="sort_by" class="form-select form-select-sm" aria-label=".form-select-sm example">

                        </select>
                    </form>
                </li>

                <li>
                    <form style="margin-right: 12px;">
                        <select id="per_page_selector" name="per_page" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected value="0">Per page</option>
                            <option class="per_page_option" value="8">8</option>
                            <option class="per_page_option" value="16">16</option>
                            <option class="per_page_option" value="24">24</option>
                            <option class="per_page_option" value="32">32</option>
                        </select>
                    </form>
                </li>
                <script language="JavaScript">
                    const dropdown_menu = document.getElementById('categories_list');
                    var dropdown_menu_html = "";
                    var currCategory = <?php echo $filterDefaultValue; ?>;
                    if (categories.length >= 2) {
                        if (currCategory == 0) {
                            dropdown_menu_html += "<option class='category_option' selected value='0'>All</option>";
                        } else {
                            dropdown_menu_html += "<option class='category_option' value='0'>All</option>";
                        }
                        for (var i = 0; i < categories.length; i++) {
                            if (currCategory != 0) {
                                if (categories[i] == currCategory) {
                                    dropdown_menu_html += "<option class='category_option' selected value='" + categories[i] + "'>" + categories[i] + "</option>";
                                } else {
                                    dropdown_menu_html += "<option class='category_option' value='" + categories[i] + "'>" + categories[i] + "</option>";
                                }
                            } else {
                                dropdown_menu_html += "<option class='category_option' value='" + categories[i] + "'>" + categories[i] + "</option>";
                            }
                        }
                    } else {
                        dropdown_menu_html = "<option selected>Filter by</option>";
                    }
                    dropdown_menu.innerHTML = dropdown_menu_html;

                    var sort_menu = document.getElementById("sort_selector");
                    var sort_menu_Html = "";
                    var currSort = <?php echo $sortDefaultValue; ?>;
                    switch (currSort) {
                        case 1 :
                            sort_menu_Html = "<option>Sort by</option>" +
                                "<option class='sort_option' selected value='1'>Most expensive</option>" +
                                "<option class='sort_option' value='2'>Most cheapest</option>" +
                                "<option class='sort_option' value='3'>Most recent</option>" +
                                "<option class='sort_option' value='4'>The oldest</option>" +
                                "<option class='sort_option' value='5'>Most selling</option>"
                            break;

                        case 2 :
                            sort_menu_Html = "<option>Sort by</option>" +
                                "<option class='sort_option' value='1'>Most expensive</option>" +
                                "<option class='sort_option' selected value='2'>Most cheapest</option>" +
                                "<option class='sort_option' value='3'>Most recent</option>" +
                                "<option class='sort_option' value='4'>The oldest</option>" +
                                "<option class='sort_option' value='5'>Most selling</option>"
                            break;

                        case 3 :
                            sort_menu_Html = "<option>Sort by</option>" +
                                "<option class='sort_option' value='1'>Most expensive</option>" +
                                "<option class='sort_option' value='2'>Most cheapest</option>" +
                                "<option class='sort_option' selected value='3'>Most recent</option>" +
                                "<option class='sort_option' value='4'>The oldest</option>" +
                                "<option class='sort_option' value='5'>Most selling</option>"
                            break;

                        case 4 :
                            sort_menu_Html = "<option>Sort by</option>" +
                                "<option class='sort_option' value='1'>Most expensive</option>" +
                                "<option class='sort_option' value='2'>Most cheapest</option>" +
                                "<option class='sort_option' value='3'>Most recent</option>" +
                                "<option class='sort_option' selected value='4'>The oldest</option>" +
                                "<option class='sort_option' value='5'>Most selling</option>"
                            break;

                        case 5 :
                            sort_menu_Html = "<option>Sort by</option>" +
                                "<option class='sort_option' value='1'>Most expensive</option>" +
                                "<option class='sort_option' value='2'>Most cheapest</option>" +
                                "<option class='sort_option' value='3'>Most recent</option>" +
                                "<option class='sort_option' value='4'>The oldest</option>" +
                                "<option class='sort_option' selected value='5'>Most selling</option>"
                            break;
                    }
                    sort_menu.innerHTML = sort_menu_Html;
                </script>
            </ul>
            <form class="d-flex" id="search-form">
                <input class="form-control me-1" autocomplete="off" list="search-results" type="search" id="search-input"
                       name="search"
                       placeholder="Search..." aria-label="Search">
                <button type="submit" class="btn btn-primary" style="height: 100%;" id="search-button" value="1">
                    <i class="fa fa-search"></i>
                </button>
                <datalist id="search-results"></datalist>
            </form>
        </div>
    </div>
</nav>
<script language="JavaScript">

    //live search
    $("#search").keyup(function () {
        $.ajax({
            type: "GET",
            url: '../client/search.php',
            data: {
                search: $("#search").val(),
            },
            success: function (data) {
                $("#search-results").html(data);
            },
            error: function () {
                $("#search-results").html("<option value='No suggestions'>");
            }
        })
    })
</script>