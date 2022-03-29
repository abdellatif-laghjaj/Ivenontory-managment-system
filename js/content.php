<?php
include '../db/connection.php';
echo '
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
';
//###############################################################################
//for updating admin profile
//###############################################################################
if (isset($_POST['update_profile'])) {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    //check if the inputs are empty
    if (empty($full_name) || empty($username) || empty($email) || empty($phone)) {
        echo "<script>alert('Please fill all the fields')</script>";
    } else {
        $update_profile = "UPDATE admin SET full_name = '$full_name', username = '$username', email = '$email', phone = '$phone' WHERE adminID = 1";
        $run_profile_update = mysqli_query($con, $update_profile);
        if ($run_profile_update) {
            echo "<script>alert('Profile updated successfully')</script>";
        } else {
            echo "<script>alert('Profile update failed')</script>";
        }
    }
}

//###############################################################################
//for adding new category
//###############################################################################
if (isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];

    //check if the inputs are empty
    if (empty($category_name)) {
        echo "<script>alert('Please fill all the fields')</script>";
    } else {
        $add_category = "INSERT INTO category (category_name) VALUES ('$category_name')";
        $run_add_category = mysqli_query($con, $add_category);
        if ($run_add_category) {
            echo "<script>alert('Category added successfully')</script>";
        } else {
            echo "<script>alert('Category add failed')</script>";
        }
    }
}

//###############################################################################
//for adding new product
//###############################################################################
$upload_dir = '../uploads/'; //upload directory

if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $product_quantity = $_POST['product_quantity'];
    $product_sale_price = $_POST['sale_price'];
    $product_buy_price = $_POST['buy_price'];
    $product_image = $upload_dir . basename($_FILES['product_image']['name']);
    //check if the inputs are empty
    if (empty($product_name)
        || empty($product_category)
        || empty($product_quantity)
        || empty($product_sale_price)
        || empty($product_buy_price)
        || empty($product_image)) {
        echo "<script>alert('Please fill all the fields')</script>";
    } else {
        //check if the image is bigger than 1MB
        if ($_FILES['product_image']['size'] > 1000000) {
            echo "<script>alert('Image is bigger then 1M')</script>";
        } else {
            //upload the image
            if (move_uploaded_file($_FILES['product_image']['tmp_name'], $product_image)) {
                $add_product = "INSERT INTO product (name, category, stock, sale_price, buy_price, product_image) VALUES ('$product_name', '$product_category', '$product_quantity', '$product_sale_price', '$product_buy_price', '$product_image')";
                $run_add_product = mysqli_query($con, $add_product);

                //increase number of products in the category
                $sql = "UPDATE category SET products_total = products_total + 1 WHERE category_name = '$product_category'";
                $run_sql = mysqli_query($con, $sql);
                if ($run_add_product) {
                    echo "<script>alert('Product added successfully')</script>";
                } else {
                    echo "<script>alert('Product add failed')</script>";
                }
            }
        }
    }
}

//###############################################################################
//for customers
//###############################################################################

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TexGEAR: Admin</title>
</head>

<body>
<script>
    let dashboard = `
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
            <canvas id="myChart-circle" class="chart-design circle"></canvas>
        </div>

        <div class="chart">
            <canvas id="myChart" class="chart-design"></canvas>
        </div>
    </div>

    <!-- LATEST PRODUCTS -->

    <h1>All Products</h1>
    <hr color="#FF304F" width="90%" size="4">
    <div class="wrap" style="margin: 20px 0;">
            <div class="search">
                <input type="text" name="search_bar" class="searchTerm" placeholder="Search. . ."
                style="font-family: Cairo;">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
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
`;

    let profile = `
    <h1>Profile</h1>
    <hr color="#FF304F" width="90%" size="4">
    <div class="profile-container">
        <form action="" method="post">
            <legend>Update Profile</legend>
            <div class="field">
                <span class="label">Full name</span>
                <input type="text" name="full_name" placeholder="e.g: abdellatif laghjaj" required>
            </div>
            <div class="field">
                <span class="label">Username</span>
                <input type="text" name="username" placeholder="e.g: abdelatiflaghjaj" required>
            </div>
            <div class="field">
                <span class="label">Email</span>
                <input type="email" name="email" placeholder="e.g: abdelatiflagjaj@gmail.com" required>
            </div>
            <div class="field">
                <span class="label">Phone</span>
                <input type="phone" name="phone" placeholder="e.g: 0657735082" required>
            </div>
            <div class="ActionButtons" style="margin-right: 16px;">
                <input type="reset" value="RESET" class="reset">
                <input type="submit" value="UPDATE" name="update_profile" class="submit">
            </div>
        </form>
    </div>
`;

    let customers = `
        <h1>Customers</h1>
        <hr color="#FF304F" width="90%" size="4">
        <img src="../res/img/undraw_users.svg" style="width: 300px; margin: 12px 36%; ">
        <div class="wrap" style="margin: 20px 0;">
             <form action="" method="post">
                <div class="search">
                    <input type="text" name="search_bar_customers" class="searchTerm" placeholder="Search. . ."
                    style="font-family: Cairo;">
                    <button type="submit" class="searchButton" name="submit-search-customers">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <table id="customers">
            <tr>
                <th style="text-align: center;">Customer</th>
                <th>Customer ID</th>
                <th>Full name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>

            <?php
    if (isset($_POST['submit-search-customers'])) {
        $search = mysqli_real_escape_string($con, $_POST['search_bar_customers']);
        $sql = "SELECT * FROM customer WHERE CONCAT(customerID, full_name, username, email, phone, addresse) LIKE '%$search%'";
    } else {
        $sql = "SELECT * FROM customer";
    }
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='text-align: center;'><img src='../res/img/customer.png' style='width: 54px;'></td>";
        echo "<td>" . $row['customerID'] . "</td>";
        echo "<td>" . $row['full_name'] . "</td>";
        echo "<td>" . $row['userName'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['addresse'] . "</td>";
        echo "</tr>";
    }
    ?>
        </table>
    `;

    let sales = `
        <h1>Sales</h1>
        <hr color="#FF304F" width="90%" size="4">
        <p>Check all verified sales:</p>
        <img src="../res/img/undraw_data_reports.svg" style="width: 300px; margin: 12px 36%; ">
        <table id="customers">
            <tr>
                <th>Sale ID</th>
                <th>Customer ID</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Earnings</th>
                <th>Date</th>
            </tr>
            <?php
    $sql = "SELECT * FROM sale";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['saleID'] . "</td>";
        echo "<td>" . $row['customerID'] . "</td>";
        echo "<td>" . $row['productID'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>" . $row['earning'] . "</td>";
        echo "<td>" . $row['sale_date'] . "</td>";
        echo "</tr>";
    }
    ?>
        </table>
    `;

    let category = `
    <h1>Category</h1>
    <hr color="#FF304F" width="90%" size="4">
    <div class="products-container">
        <div class="legend" id="legend">
            Add a new category
            <button class="arrow" id="arrow" onclick="dropDown()"></button>
        </div>
        <form action="" method="post">
            <div class="form categories" id="form">
                <div class="field">
                    <span class="label">Category ID</span>
                    <?php
    $sql = "SELECT MAX(categoryID) AS max FROM category";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $max = $row['max'];
    echo "<input type='text' name='category_id' value='" . ($max + 1) . "' disabled>";
    ?>
                </div>
                <div class="field">
                    <span class="label">Category Name</span>
                    <input type="text" name="category_name" placeholder="e.g: Laptops" required>
                </div>
                <div class="ActionButtons">
                    <input type="reset" value="RESET" class="reset">
                    <input type="submit" name="add_category" value="ADD" class="submit">
                </div>
            </div>
        </form>
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
            </tr>
            <?php
    $sql = "SELECT * FROM category";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['categoryID'] . "</td>";
        echo "<td>" . $row['category_name'] . "</td>";
        echo "<td>" . $row['products_total'] . "</td>";
        echo "</tr>";
    }
    ?>
            </table>
        </div>
    </div>
`;

    let products = `
    <h1>Add Product</h1>
    <hr color="#FF304F" width="90%" size="4">
    <div class="products-container">
        <div class="legend show" id="legend">
            Add a product
            <button class="arrow" id="arrow" onclick="dropDown()"></button>
        </div>
        <form action="../pages/admin.php" enctype="multipart/form-data" method="post">
            <div class="form show" id="form">
                <div class="field">
                    <span class="label">Product ID</span>
                    <?php
    $sql = "SELECT MAX(productID) AS max FROM product";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $max = $row['max'];
    echo "<input type='text' name='product_id' value='" . ($max + 1) . "' disabled>";
    ?>
                </div>
                <div class="field">
                    <span class="label">Name</span>
                    <input type="text" name="product_name" placeholder="e.g: HP EliteBook" required>
                </div>
                <div class="field">
                    <span class="label">Category</span>
                    <select name="product_category" id="category" required>;
                        <option value="">-- select a category --</option>
                        <?php
    $sql = "SELECT category_name FROM category";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['category_name'] . "'>" . $row['category_name'] . "</option>";
    }
    ?>
                    </select>
                </div>
                <div class="field">
                    <span class="label">Quantity</span>
                    <input type="number" name="product_quantity" placeholder="e.g: 10" required>
                </div>
                <div class="field">
                    <span class="label">Sale price</span>
                    <input type="number" name="sale_price" placeholder="e.g: 59" required>
                </div>
                <div class="field">
                    <span class="label">Buy price</span>
                    <input type="number" name="buy_price" placeholder="e.g: 42" required>
                </div>
                <div class="field">
                    <span class="label">Image</span>
                    <input type="file" name="product_image" accept="image/*" required>
                </div>
                <div class="ActionButtons">
                    <input type="reset" value="RESET" class="reset">
                    <input type="submit" value="ADD" name="add_product" class="submit">
                </div>
            </div>
        </form>
    </div>
`;

    let reports = `
    <h1>Reports</h1>
    <hr color="#FF304F" width="90%" size="4">
    <p>Download your reports and data as PDF, CSV or JSON format:</p>
    <div class="reports-container">
        <div class="SelectBox">
            <label for="Term">Select periode: </label>
            <select name="report" class="reports-periode">
                <option value="1">Last day</option>
                <option value="2">Last week</option>
                <option value="3">Last month</option>
                <option value="4">Last year</option>
            </select>
        </div>
            <div class="block">
                <div class="card" id="pdf">
                    <img src="../res/img/pdf.png" alt="">
                    <label for="">PDF Format</label>
                </div>
                <button onclick="sendData('pdf')" class="btn"><i class="fa fa-download"></i>DOWNLOAD</button>
            </div>
        <div class="block">
            <div class="card" id="csv">
                <img src="../res/img/csv.png" alt="">
                <label for="">CSV Format</label>
            </div>
            <button class="btn" onclick="sendData('csv')"><i class="fa fa-download"></i>DOWNLOAD</button>
        </div>
        <div class="block">
            <div class="card" id="json">
                <img src="../res/img/Json icon.png" alt="">
                <label for="">JSON Format</label>
            </div>
            <button class="btn" onclick="sendData('json')"><i class="fa fa-download"></i>DOWNLOAD</button>
        </div>
    </div>
`;

    function changeToDashboard() {
        let content = document.querySelector(".content");
        window.location.reload();
        content.innerHTML = dashboard;
    }

    function changeToProfile() {
        let content = document.querySelector(".content");
        content.innerHTML = profile;
    }

    function changeToUsers() {
        let content = document.querySelector(".content");
        content.innerHTML = customers;
    }

    function changeToSales() {
        let content = document.querySelector(".content");
        content.innerHTML = sales;
    }

    function changeToCategory() {
        let content = document.querySelector(".content");
        content.innerHTML = category;
    }

    function changeToProducts() {
        let content = document.querySelector(".content");
        content.innerHTML = products;
    }

    function changeToReports() {
        let content = document.querySelector(".content");
        content.innerHTML = reports;
    }

    //send periode to generate_pdf.php on click
    function sendData(format) {
        let periode = document.querySelector(".reports-periode").value;
        let url = "../pages/generate_pdf.php?periode=" + periode + "&format=" + format;
        window.open(url, "_blank");
    }

</script>
</body>

</html>