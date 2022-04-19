<?php
include '../db/connection.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
//get the total number of products
$sql = "SELECT * FROM product";
$result = mysqli_query($con, $sql);
$total_products = mysqli_num_rows($result);

//get the total number of sales
$sql = "SELECT * FROM sale";
$result = mysqli_query($con, $sql);
$total_sales = mysqli_num_rows($result);

//get the total of earnings

//$sql = "SELECT product.buy_price, product.sale_price, sale.quantity FROM product, sale WHERE product.productID = sale.productID";
//$result = mysqli_query($con, $sql);
//$total_earnings = 0;
//while ($row = mysqli_fetch_array($result)) {
//    $total_earnings += ($row['sale_price'] - $row['buy_price']) * $row['quantity'];
//}

$sql = "SELECT * FROM sale";
$result = mysqli_query($con, $sql);
$total_earnings = 0;
while ($row = mysqli_fetch_array($result)) {
    $total_earnings += $row['earning'];
}

//get the total number of users
$sql = "SELECT * FROM customer";
$result = mysqli_query($con, $sql);
$total_customers = mysqli_num_rows($result);

//remove product on click
echo '<script>
function removeProduct(id){
//    if(confirm("Are you sure you want to remove this product?")){
//        //remove product from database
//        
//    }
swal({
            title: "Remove Product",
            text: "You will not be able to recover this product!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "remove_product.php?id=" + id;
                } else {
                    swal("Your product is safe!");
                }
            });
}
</script>';

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
    <link rel="icon" href="../res/img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/dashboard.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <link rel="stylesheet" href="../style/forms.css">
    <link rel="stylesheet" href="../style/product.css">
    <link rel="stylesheet" href="../style/report.css">
    <link rel="stylesheet" href="../style/product_details_modal.css">
    <link rel="stylesheet" href="../style/select_text.css">
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

        .products-container {
            display: inline;
        }

        .profile-container form .field {
            height: 44px;
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

        .users {
            background-color: var(--light-red);
        }

        .card {
            width: 100%;
            height: 100%;
            border-radius: 0;
            box-shadow: 0 0 0 0;
            border: 0;
            isolation: isolate;
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

        .profile-container .ActionButtons .submit {
            grid-area: auto;
        }

        /
        /
        style pagination buttons
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 1rem;
        }

        .pagination button {
            background-color: #2e75e0;
            color: white;
            border: none;
            border-radius: 0.25rem;
            padding: 0.5rem 0.8rem;
            font-size: 1rem;
            margin: 0 0.2rem;
            cursor: pointer;
            transition: all 0.5s ease;
        }

        <!--
        keep some styles in dark mode

        -->

        main hr, .p-table th, .profile-container legend, .field .label {
            isolation: isolate;
        }

        .products-container .legend, .field .label {
            isolation: isolate;
        }

        .profile-container legend {
            isolation: isolate;
        }

        #customers th {
            isolation: isolate;
        }

        .reports-container .btn {
            isolation: isolate;
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
                <span class="link-text">Categories</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#products" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()"
               onclick="changeToProducts()">
                <img class="nav-icon" src="../res/img/product.png" alt="">
                <span class="link-text">Add Product</span>
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
            <a class="nav-link" onclick="logout()" onmouseover="mouseEnter()" onmouseout="mouseOut()">
                <img class="nav-icon" src="../res/img/logout.png">
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
            <img src="../res/img/product.png" alt="box icon" style="width: 90px;">
            <div class="info">
                <h3><?php echo $total_products ?></h3>
                <p>Products</p>
            </div>
        </div>

        <div class="card users">
            <img src="../res/img/users.png" alt="box icon" style="width: 90px;">
            <div class="info">
                <h3><?php echo $total_customers ?></h3>
                <p>Customers</p>
            </div>
        </div>

        <div class="card sales">
            <img src="../res/img/sales.png" alt="box icon">
            <div class="info">
                <h3><?php echo $total_sales ?></h3>
                <p>Orders</p>
            </div>
        </div>

        <div class="card earnings">
            <img src="../res/img/dollar.png" alt="box icon">
            <div class="info">
                <h3>$ <?php echo number_format($total_earnings) ?></h3>
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
        <form method="post">
            <div class="search">
                <input type="text" name="search_bar" class="searchTerm" placeholder="Search. . ."
                       style="font-family: Cairo;">
                <button type="submit" class="searchButton" name="submit-search">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>
    <table id="customers" class="p-table">
        <tr>
            <th style='text-align: center;'>Product Image</th>
            <th>Product ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Buy Price</th>
            <th>Sale Price</th>
        </tr>

        <?php
        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($con, $_POST['search_bar']);
            $sql = "SELECT * FROM product WHERE name LIKE '%$search%' ORDER BY productID DESC";
        } else {
            $sql = "SELECT * FROM product ORDER BY productID DESC";
        }
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr class='product-row'>";
            echo "<td align='center'><img src='../uploads/" . $row['product_image'] . "' style='width: 60px;' alt='product image'></td>";
            echo "<td>" . $row['productID'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            echo "<td>" . $row['stock'] . "</td>";
            echo "<td>" . $row['buy_price'] . "</td>";
            echo "<td>" . $row['sale_price'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</main>

<?php include '../js/charts.php' ?>
<!-- PRODUCT MODAL -->
<div class="modal" id="details-modal">

</div>
<script src="../js/change_content.js"></script>
<script src="../js/app.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                            <h2>Product ID: ${this.children[1].textContent}</h2>
                        </div>
                        <div class="modal-body">
                            <table>
                                <tr class="product-row">
                                    <td style="color: #292929; font-weight: bold">Product Name : &#160;</td>
                                    <td class="namep">${this.children[2].textContent}</td>
                                </tr>
                                <tr class="product-row">
                                    <td style="color: #292929; font-weight: bold">Category : </td>
                                    <td class="categp">${this.children[3].textContent}</td>
                                </tr>
                                <tr class="product-row">
                                    <td style="color: #292929; font-weight: bold">Quantity : </td>
                                    <td class="qntp">${this.children[4].textContent}</td>
                                </tr>
                                <tr class="product-row">
                                    <td style="color: #292929; font-weight: bold">Buy Price : </td>
                                    <td>$${this.children[5].textContent}</td>
                                </tr>
                                <tr class="product-row">
                                    <td style="color: #292929; font-weight: bold">Sale Price : </td>
                                    <td class="pricep">$${this.children[6].textContent}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="product-modal-btn" onclick="toggleModal()">Close</button>
                            <button class="product-modal-btn update-product-btn" onclick="updateProduct()">Update</button>
                            <button class="product-modal-btn delete-product-btn" onclick="removeProduct(${this.children[1].textContent})">Delete</button>
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

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.classList.remove("show-modal");
        }
    }

    //logout
    function logout() {
        swal({
            title: "Are you sure?",
            text: "You will be logged out!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "logout.php";
                } else {
                    swal("Keep on working Admin!");
                }
            });
    }
</script>

<!--<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>-->
<!--<script>-->
<!--    const options = {-->
<!--        bottom: '32px', // default: '32px'-->
<!--        right: '32px', // default: '32px'-->
<!--        left: 'unset', // default: 'unset'-->
<!--        time: '0.5s', // default: '0.3s'-->
<!--        mixColor: '#fff', // default: '#fff'-->
<!--        backgroundColor: '#fff',  // default: '#fff'-->
<!--        buttonColorDark: '#29292f',  // default: '#100f2c'-->
<!--        buttonColorLight: '#fff', // default: '#fff'-->
<!--        saveInCookies: true, // default: true,-->
<!--        label: '🌓', // default: ''-->
<!--        autoMatchOsTheme: true // default: true-->
<!--    }-->
<!---->
<!--    const darkmode = new Darkmode(options);-->
<!---->
<!--    function addDarkmodeWidget() {-->
<!--        darkmode.showWidget();-->
<!--    }-->
<!---->
<!--    window.addEventListener('load', addDarkmodeWidget);-->
<!--</script>-->
</body>

</html>