<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/sidebar.css">
    <link rel="stylesheet" href="../style/product.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <title>Categories</title>
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
                <a href="#" class="nav-link active-link"  onmouseover="mouseEnter()" onmouseout="mouseOut()">
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
        <h1>Products</h1>
        <hr color="#FF304F" width="90%" size="4">

        <!-- CARDS CONTAINER -->

        <div class="container">
            <div class="legend" id="legend">
                Add a new category
                <button class="arrow" id="arrow" onclick="dropDown()"></button>
            </div>
            <div class="form" id="form">
                <div class="field">
                    <span class="label">Category ID</span>
                    <input type="text" name="product-id" value="123">
                </div>
                <div class="field">
                    <span class="label">Name</span>
                    <input type="text" name="product-name" value="HP EliteBook">
                </div>
                <div class="ActionButtons">
                    <input type="reset" value="RESET" class="reset">
                    <input type="submit" value="ADD" class="submit">
                </div>
            </div>

            <!------------------------------------>

            <div class="legend" id="legend1">
                List of categories
                <button class="arrow" id="arrow1" onclick="dropDown2()"></button>
            </div>
            <div class="list" id="form1">
                <table id="customers">
                <tr>
                    <th>Category ID</th>
                    <th>Name</th>
                    <th>N° products</th>
                    <th>Quantity</th>
                </tr>

                <tr>
                    <td>4</td>
                    <td>Mobiles</td>
                    <td>7</td>
                    <td>81</td>
                </tr>

                <tr>
                    <td>5</td>
                    <td>Laptops</td>
                    <td>3</td>
                    <td>25</td>
                </tr>
                </table>
            </div>
            
        </div>
        
    </main>

    <script src="../js/app.js"></script>
    <script language="javascript">
        //Drop down script
        function dropDown() {

        document.getElementById("legend").classList.toggle("show");
        document.getElementById("arrow").classList.toggle("show");
        document.getElementById("form").classList.toggle("show");

        }

        function dropDown2() {

            document.getElementById("legend1").classList.toggle("show");
            document.getElementById("arrow1").classList.toggle("show");
            document.getElementById("form1").classList.toggle("show");
        
        }

    </script>
</body>
</html>