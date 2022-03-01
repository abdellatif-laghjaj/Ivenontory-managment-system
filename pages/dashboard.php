<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/dashboard.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <title>Admin Page</title>
</head>
<body>
    <nav class="navbar" onresize="addClass()" onmouseover="mouseEnter()" onmouseout="mouseOut()">
        <ul class="navbar-nav">
            <li class="logo">
                <a href="#" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()">
                    <span class="link-text logo-text">Tex<font color="#fff">GEAR</font></span>
                    <img src="../res/img/logo.svg" alt="">
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link"  onmouseover="mouseEnter()" onmouseout="mouseOut()">
                    <img class="nav-icon" src="../res/img/chart.png" alt="">
                    <span class="link-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()" >
                    <img class="nav-icon" src="../res/img/profile1.png" alt="">
                    <span class="link-text">Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link"  onmouseover="mouseEnter()" onmouseout="mouseOut()">
                    <img class="nav-icon" src="../res/img/categories.png" alt="">
                    <span class="link-text">Category</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link"  onmouseover="mouseEnter()" onmouseout="mouseOut()">
                    <img class="nav-icon" src="../res/img/product.png" alt="">
                    <span class="link-text">Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link"  onmouseover="mouseEnter()" onmouseout="mouseOut()">
                    <img class="nav-icon" src="../res/img/reports.png" alt="">
                    <span class="link-text">Reports</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link"  onmouseover="mouseEnter()" onmouseout="mouseOut()">
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
                    <h3>199</h3>
                    <p>Products</p>
                </div>
            </div>

            <div class="card sales">
                <img src="../res/img/sales.png" alt="box icon">
                <div class="info">
                    <h3>12</h3>
                    <p>Sales</p>
                </div>
            </div>

            <div class="card earnings">
                <img src="../res/img/dollar.png" alt="box icon">
                <div class="info">
                    <h3>1087</h3>
                    <p>Earnings</p>
                </div>
            </div>
        </div>

        <!-- CARDS CONTAINER -->

        <div class="charts-container">
            <div class="chart circle-chart">
                <canvas id="myChart-circle"></canvas>
            </div>
            
            <div class="chart">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </main>

    <script src="../js/app.js">
    </script>
</body>
</html>