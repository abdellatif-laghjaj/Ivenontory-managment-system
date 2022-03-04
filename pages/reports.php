<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/sidebar.css">
    <link rel="stylesheet" href="../style/report.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <title>Reports</title>
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
                <a href="#" class="nav-link" onmouseover="mouseEnter()" onmouseout="mouseOut()">
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
                <a href="#" class="nav-link active-link"  onmouseover="mouseEnter()" onmouseout="mouseOut()">
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
        <h1>Reports</h1>
        <hr color="#FF304F" width="90%" size="4">
        <span class="close">Download your reports and data as PDF, CSV or JSON format:</span>

        <!-- CARDS CONTAINER -->

        <div class="container">
            <div class="SelectBox">
                <label for="Term">Select term: </label>
                <select name="report" id="report">
                    <option value="1">Last day</option>
                    <option value="2">Last week</option>
                    <option value="3">Last month</option>
                    <option value="4">Last year</option>
                </select>
            </div>
            
            <div class="block">
                <div class="card" id="pdf">
                    <img src="..\res\img\pdf.png" alt="">
                    <label for="">PDF Format</label>
                </div>
                <button class="btn">DOWNLOAD</button>
            </div>
            <div class="block">
                <div class="card" id="csv">
                    <img src="..\res\img\csv.png" alt="">
                    <label for="">CSV Format</label>
                </div>
                <button class="btn">DOWNLOAD</button>
            </div>
            <div class="block">
                <div class="card" id="json">
                    <img src="..\res\img\Json icon.png" alt="">
                    <label for="">JSON Format</label>
                </div>
                <button class="btn">DOWNLOAD</button>
            </div>
        </div>        
    </main>

    <script src="../js/app.js">
    </script>
</body>
</html>