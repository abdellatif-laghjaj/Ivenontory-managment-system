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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <title>Admin Page</title>
</head>

<body>

    <!-- include the change content fontionality -->

    <?php include('../js/content.php');?>
    
    <nav class="navbar" onmouseover="mouseEnter()" onmouseout="mouseOut()">
        <ul class="navbar-nav">
            <li class="logo">
                <a href="#" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()">
                    <span class="link-text logo-text">Tex<font color="#fff">GEAR</font></span>
                    <img src="../res/img/logo.svg" alt="">
                </a>
            </li>

            <li class="nav-item">
                <a href="#dashboard" class="nav-link active-link" onmouseover="mouseEnter()" onmouseout="mouseOut()" onclick="changeToDashboard()">
                    <img class="nav-icon" src="../res/img/chart.png" alt="">
                    <span class="link-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#profile" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()" onclick="changeToProfile()">
                    <img class="nav-icon" src="../res/img/profile1.png" alt="">
                    <span class="link-text">Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#category" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()" onclick="changeToCategory()">
                    <img class="nav-icon" src="../res/img/categories.png" alt="">
                    <span class="link-text">Category</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#products" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()" onclick="changeToProducts()">
                    <img class="nav-icon" src="../res/img/product.png" alt="">
                    <span class="link-text">Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#reports" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()" onclick="changeToReports()">
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

        <h1>Latest products</h1>
        <hr color="#FF304F" width="90%" size="4">

        <table id="customers">
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>

            <tr>
                <td>4</td>
                <td>IPhone 12</td>
                <td>Mobile</td>
                <td>1</td>
                <td>1499</td>
            </tr>

            <tr>
                <td>5</td>
                <td>Lenovo</td>
                <td>Laptops</td>
                <td>1</td>
                <td>3488</td>
            </tr>
        </table>
    </main>

    <script src="../js/app.js"></script>
    <script src="../js/charts.js"></script>
</body>

</html>