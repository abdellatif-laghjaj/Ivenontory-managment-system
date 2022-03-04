<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/dashboard.css">
    <link rel="stylesheet" href="../style/forms.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <title>Profile</title>
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
                <a href="#" class="nav-link active-link" onmouseover="mouseEnter()" onmouseout="mouseOut()" >
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
        <h1>Profile</h1>
        <hr color="#FF304F" width="90%" size="4">

        <!-- CONTAINER -->

        <div class="container">
            <form action="">
                <legend>Update Profile</legend>
                <div class="field">
                    <span class="label">Full name</span>
                    <input type="text" name="Full-name" value="omar lamine">
                </div>
                <div class="field">
                    <span class="label">Username</span>
                    <input type="text" name="username" value="omarlamin01">
                </div>
                <div class="field">
                    <span class="label">Email</span>
                    <input type="email" name="email" value="omarlamin272@gmail.com">
                </div>
                <div class="field">
                    <span class="label">Phone</span>
                    <input type="phone" name="phone" value="06 16-944 666">
                </div>
                <div class="field">
                    <span class="label">Reg-date</span>
                    <input type="date" name="reg-date">
                </div>
            </form>
            <div class="ActionButtons">
                <input type="reset" value="RESET" class="reset">
                <input type="submit" value="UPDATE" class="submit">
            </div>
        </div>

    </main>
    <script src="../js/app.js">
    </script>
</body>
</html>