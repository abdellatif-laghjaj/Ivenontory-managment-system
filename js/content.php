<?php
//code
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
`;

    let profile = `
    <h1>Profile</h1>
    <hr color="#FF304F" width="90%" size="4">
    <div class="profile-container">
        <form action="">
            <legend>Update Profile</legend>
            <div class="field">
                <span class="label">Full name</span>
                <input type="text" name="Full-name" placeholder="e.g: abdellatif laghjaj">
            </div>
            <div class="field">
                <span class="label">Username</span>
                <input type="text" name="username" placeholder="e.g: abdelatiflaghjaj">
            </div>
            <div class="field">
                <span class="label">Email</span>
                <input type="email" name="email" placeholder="e.g: abdelatiflagjaj@gmail.com">
            </div>
            <div class="field">
                <span class="label">Phone</span>
                <input type="phone" name="phone" placeholder="e.g: 0657735082">
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
`;

    let category = `
    <h1>Category</h1>
    <hr color="#FF304F" width="90%" size="4">
    <div class="products-container">
        <div class="legend" id="legend">
            Add a new category
            <button class="arrow" id="arrow" onclick="dropDown()"></button>
        </div>
        <div class="form categories" id="form">
            <div class="field">
                <span class="label">Category ID</span>
                <input type="text" name="product-id" value="123" disabled>
            </div>
            <div class="field">
                <span class="label">Category Name</span>
                <input type="text" name="product-name" placeholder="e.g: Laptops">
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
`;

    let products = `
    <h1>Products</h1>
    <hr color="#FF304F" width="90%" size="4">
    <div class="products-container">
        <div class="legend" id="legend">
            Add a product
            <button class="arrow" id="arrow" onclick="dropDown()"></button>
        </div>
        <div class="form" id="form">
            <div class="field">
                <span class="label">Product ID</span>
                <input type="text" name="product-id" value="123" disabled>
            </div>
            <div class="field">
                <span class="label">Name</span>
                <input type="text" name="product-name" placeholder="e.g: HP EliteBook">
            </div>
            <div class="field">
                <span class="label">Category</span>
                <select name="category" id="category">
                    <option value="1">Laptops</option>
                </select>
            </div>
            <div class="field">
                <span class="label">Quantity</span>
                <input type="number" name="Quantity" placeholder="e.g: 10">
            </div>
            <div class="field">
                <span class="label">Sale price</span>
                <input type="number" name="Sale-price" placeholder="e.g: 59">
            </div>
            <div class="field">
                <span class="label">Buy price</span>
                <input type="number" name="Buy-price" placeholder="e.g: 42">
            </div>
            <div class="field">
                <span class="label">Image</span>
                <input type="file" name="image" value="" accept="image/*">
            </div>
            <div class="ActionButtons">
                <input type="reset" value="RESET" class="reset">
                <input type="submit" value="ADD" class="submit">
            </div>
        </div>
        <!------------------------------------>
        <div class="legend" id="legend1">
            List of products
            <button class="arrow" id="arrow1" onclick="dropDown2()"></button>
        </div>

        <div class="list" id="form1">

            <div class="wrap">
                <div class="search">
                    <input type="text" name="search_bar" class="searchTerm" placeholder="Search. . .">
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
                <th style="text-align: center;">Actions</th>
            </tr>
            <tr>
                <td>4</td>
                <td>IPhone 12</td>
                <td>Mobile</td>
                <td>1</td>
                <td>1499</td>
                <td style="text-align: right;">
                    <button style="background: green; margin-right: 6px; padding: 6px; color: #fff; border: none; outline: none; border-radius: 4px;"><i class="fa fa-edit"></i></button>
                    <button style="background: red; padding: 6px; color: #fff; border: none; outline: none; border-radius: 4px;"><i class="fa fa-trash"></i></button>
                </td>
                
            </tr>
            <tr>
                <td>5</td>
                <td>Lenovo</td>
                <td>Laptops</td>
                <td>1</td>
                <td>3488</td>
                <td style="text-align: right;">
                    <button style="background: green; margin-right: 6px; padding: 6px; color: #fff; border: none; outline: none; border-radius: 4px;"><i class="fa fa-edit"></i></button>
                    <button style="background: red; padding: 6px; color: #fff; border: none; outline: none; border-radius: 4px;"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            </table>
        </div>
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
            <button class="btn"><i class="fa fa-download"></i>DOWNLOAD</button>
        </div>
        <div class="block">
            <div class="card" id="csv">
                <img src="../res/img/csv.png" alt="">
                <label for="">CSV Format</label>
            </div>
            <button class="btn"><i class="fa fa-download"></i>DOWNLOAD</button>
        </div>
        <div class="block">
            <div class="card" id="json">
                <img src="../res/img/Json icon.png" alt="">
                <label for="">JSON Format</label>
            </div>
            <button class="btn"><i class="fa fa-download"></i>DOWNLOAD</button>
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
</script>
</body>

</html>