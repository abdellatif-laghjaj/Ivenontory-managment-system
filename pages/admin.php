<?php
$productsTotal = 19;
$salesTotal = 121;
$earningsTotal = 139;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/dashboard.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <link rel="stylesheet" href="../style/forms.css">
    <link rel="stylesheet" href="../style/product.css">
    <link rel="stylesheet" href="../style/report.css">
    <link rel="stylesheet" href="../style/product_details_modal.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <style>
        .nav-link {
            height: 4rem;
        }

        .nav-link img {
            width: 2rem;
        }

        .wrap {
            width: 400px;
        }

        .modal {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transform: scale(1.1);
            transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 1rem 1.5rem;
            width: 24rem;
            border-radius: 0.5rem;
        }

        .product-modal-btn {
            float: right;
            line-height: 1.5rem;
            text-align: center;
            cursor: pointer;
            border-radius: 0.25rem;
            background-color: lightgray;
            width: 32%;
            height: 30px;
            border: none;
            margin-bottom: 12px;
            margin-top: 12px;
            margin-right: 4px;
        }

        .products-container .form .field .label {
            font-size: 14px;
            height: 44px;
        }

        .products-container .form .field input {
            font-size: 20px;
            height: 44px;
        }

        .products-container .form .field #category {
            font-size: 16px;
        }

        .update-product-btn {
            background: #006bff;
            color: white;
            transition: all 0.5s ease;
        }

        .delete-product-btn {
            background: #ff1616;
            color: white;
            transition: all 0.5s ease;
        }

        .product-modal-btn:hover {
            background-color: darkgray;
        }

        .show-modal {
            opacity: 1;
            visibility: visible;
            transform: scale(1.0);
            transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
        }

        .card {
            width: 100%;
            height: 100%;
            border-radius: 0;
            box-shadow: 0 0 0 0;
            border: 0;
        }

        @media only screen and (max-width: 600px) {
            .navbar {
                bottom: 0;
                width: 100vw;
                height: 4rem;
            }

            .nav-link img {
                width: 1.5rem;
            }

        }
    </style>

    <title>Admin Page</title>
</head>

<body>

<!-- include the change content functionality -->

<?php include('../js/content.php'); ?>

<nav class="navbar" onmouseover="mouseEnter()" onmouseout="mouseOut()">
    <ul class="navbar-nav">
        <li class="logo">
            <a href="#" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()">
                <span class="link-text logo-text">Tex<font color="#fff">GEAR</font></span>
                <img src="../res/img/logo.svg" alt="">
            </a>
        </li>

        <li class="nav-item">
            <a href="#dashboard" class="nav-link active-link" onmouseover="mouseEnter()" onmouseout="mouseOut()"
               onclick="changeToDashboard()">
                <img class="nav-icon" src="../res/img/chart.png" alt="">
                <span class="link-text">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#profile" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()"
               onclick="changeToProfile()">
                <img class="nav-icon" src="../res/img/profile1.png" alt="">
                <span class="link-text">Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#users" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()"
               onclick="changeToUsers()">
                <img class="nav-icon" src="../res/img/users.png" alt="">
                <span class="link-text">Users</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#category" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()"
               onclick="changeToCategory()">
                <img class="nav-icon" src="../res/img/categories.png" alt="">
                <span class="link-text">Category</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#products" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()"
               onclick="changeToProducts()">
                <img class="nav-icon" src="../res/img/product.png" alt="">
                <span class="link-text">Products</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#sales" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()"
               onclick="changeToSales()">
                <img class="nav-icon" src="../res/img/sales_sidebar.png" alt="">
                <span class="link-text">Sales</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#reports" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()"
               onclick="changeToReports()">
                <img class="nav-icon" src="../res/img/reports.png" alt="">
                <span class="link-text">Reports</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="login.php" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()">
                <img class="nav-icon" src="../res/img/logout.png" alt="">
                <span class="link-text">Logout</span>
            </a>
        </li>
    </ul>
</nav>

<!-- MAIN CONTENT -->
<main class="content">
    <h1>Dashboard</h1>
    <hr color="#FF304F" width="90%" size="4">

    <!-- CARDS CONTAINER -->

    <div class="cards-container">
        <div class="card">
            <img src="../res/img/box.png" alt="box icon">
            <div class="info">
                <h3><?php echo $productsTotal ?></h3>
                <p>Products</p>
            </div>
        </div>

        <div class="card sales">
            <img src="../res/img/sales.png" alt="box icon">
            <div class="info">
                <h3><?php echo $salesTotal ?></h3>
                <p>Sales</p>
            </div>
        </div>

        <div class="card earnings">
            <img src="../res/img/dollar.png" alt="box icon">
            <div class="info">
                <h3><?php echo $earningsTotal ?></h3>
                <p>Earnings</p>
            </div>
        </div>
    </div>

    <!-- CARDS CONTAINER -->

    <div class="charts-container">
        <div class="chart circle-chart">
            <canvas id="myChart-circle" class="chart-design circle"></canvas>
        </div>

        <div class="chart">
            <canvas id="myChart" class="chart-design"></canvas>
        </div>
    </div>

    <div class="line-chart-container">
        <div class="chart">
            <canvas id="myChart-line" class="chart-design line"></canvas>
        </div>
    </div>

    <!-- LATEST PRODUCTS -->

    <h1>All Products</h1>
    <hr color="#FF304F" width="90%" size="4">
    <div class="wrap" style="margin: 20px 0;">
        <div class="search">
            <input type="text" name="search_bar" class="searchTerm" placeholder="Search. . .">
            <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
    <table id="customers" class="p-table">
        <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>

        <tr class="product-row">
            <td>4</td>
            <td>IPhone 12</td>
            <td>Mobile</td>
            <td>1</td>
            <td>1499</td>
        </tr>

        <tr class="product-row">
            <td>5</td>
            <td>Lenovo</td>
            <td>Laptops</td>
            <td>1</td>
            <td>3488</td>
        </tr>
    </table>
</main>

<!-- PRODUCT MODAL -->
<div class="modal" id="details-modal">

</div>
<script src="../js/change_content.js"></script>
<script src="../js/app.js"></script>
<script src="../js/charts.js"></script>

<script>
    const modal = document.querySelector(".modal");
    const closeButton = document.querySelector(".close-button");

    const trs = document.querySelectorAll(".product-row");

    for (let i = 0; i < trs.length; i++)
        (function (e) {
            trs[e].addEventListener("click", function () {
                toggleModal(e)
                modal.innerHTML = `
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Product ID: ${this.children[0].textContent}</h2>
                        </div>
                        <div class="modal-body">
                            <table>
                                <tr class="product-row">
                                    <td style="color: #292929; font-weight: bold">Product Name : &#160;</td>
                                    <td class="namep">${this.children[1].textContent}</td>
                                </tr>

                                <tr class="product-row">
                                    <td style="color: #292929; font-weight: bold">Category : </td>
                                    <td class="categp">${this.children[2].textContent}</td>
                                </tr>

                                <tr class="product-row">
                                    <td style="color: #292929; font-weight: bold">Quantity : </td>
                                    <td class="qntp">${this.children[3].textContent}</td>
                                </tr>

                                <tr class="product-row">
                                    <td style="color: #292929; font-weight: bold">Price : </td>
                                    <td class="pricep">${this.children[4].textContent}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="product-modal-btn" onclick="toggleModal()">Close</button>
                            <button class="product-modal-btn update-product-btn" onclick="updateProduct()">Update</button>
                            <button class="product-modal-btn delete-product-btn" onclick="removeProduct(${i})">Delete</button>
                        </div>
                    </div>`;
            }, false);
        })(i);

    function toggleModal() {
        modal.classList.toggle("show-modal");
    }

    function updateProduct() {
        const id = document.querySelector("h2").textContent.replace("Product ID: ", "");
        const name = document.querySelector(".namep").textContent;
        const qnt = document.querySelector(".qntp").textContent;
        const price = document.querySelector(".pricep").textContent;
        window.location.href = "update_product.php?id=" + id + "&name=" + name + "&qnt=" + qnt + "&price=" + price;
    }

    function removeProduct(i) {
        alert("Product removed");
        document.querySelector(".p-table").deleteRow(i + 1);
    }

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.classList.remove("show-modal");
        }
    }
</script>
</body>

</html>