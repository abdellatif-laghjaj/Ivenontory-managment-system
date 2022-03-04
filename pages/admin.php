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
    <link rel="stylesheet" href="../style/dashboard.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <link rel="stylesheet" href="../style/product.css">
    <link rel="stylesheet" href="../style/report.css">
    <link rel="stylesheet" href="../style/forms.css">

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
                <a href="#dashboard" class="nav-link active-link" onmouseover="mouseEnter()" onmouseout="mouseOut()" onclick="changeToDashboard()">
                    <img class="nav-icon" src="../res/img/chart.png" alt="">
                    <span class="link-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#profile" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()" onclick="changeToProfile()" >
                    <img class="nav-icon" src="../res/img/profile1.png" alt="">
                    <span class="link-text">Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#category" class="nav-link"  onmouseover="mouseEnter()" onmouseout="mouseOut()" onclick="changeToCategory()">
                    <img class="nav-icon" src="../res/img/categories.png" alt="">
                    <span class="link-text">Category</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#products" class="nav-link"  onmouseover="mouseEnter()" onmouseout="mouseOut()" onclick="changeToProducts()">
                    <img class="nav-icon" src="../res/img/product.png" alt="">
                    <span class="link-text">Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#reports" class="nav-link"  onmouseover="mouseEnter()" onmouseout="mouseOut()" onclick="changeToReports()">
                    <img class="nav-icon" src="../res/img/reports.png" alt="">
                    <span class="link-text">Reports</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="login.php" class="nav-link"  onmouseover="mouseEnter()" onmouseout="mouseOut()">
                    <img class="nav-icon" src="../res/img/logout.png" alt="">
                    <span class="link-text">Logout</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="content">
        <?php include('./dashboard.php') ?>
    </main>

    <script src="../js/app.js"></script>
    <script src="../js/charts.js"></script>
    <script src="../js/change_content.js"></script>
</body>
</html>