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
`;

let category = `
    <h1>Category</h1>
    <hr color="#FF304F" width="90%" size="4">
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
`;

let products = `
    <h1>Products</h1>
    <hr color="#FF304F" width="90%" size="4">
    <div class="container">
        <div class="legend" id="legend">
            Add a product
            <button class="arrow" id="arrow" onclick="dropDown()"></button>
        </div>
        <div class="form" id="form">
            <div class="field">
                <span class="label">Product ID</span>
                <input type="text" name="product-id" value="123">
            </div>
            <div class="field">
                <span class="label">Name</span>
                <input type="text" name="product-name" value="HP EliteBook">
            </div>
            <div class="field">
                <span class="label">Category</span>
                <select name="category" id="category">
                    <option value="1">Laptops</option>
                </select>
            </div>
            <div class="field">
                <span class="label">Quantity</span>
                <input type="number" name="Quantity" value="10">
            </div>
            <div class="field">
                <span class="label">Sale price</span>
                <input type="number" name="Sale-price" value="7000">
            </div>
            <div class="field">
                <span class="label">Buy price</span>
                <input type="number" name="Buy-price" value="5000">
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
        </div>
    </div>
`;

let reports = `
    <h1>Reports</h1>
    <hr color="#FF304F" width="90%" size="4">
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
                <img src="../res/img/pdf.png" alt="">
                <label for="">PDF Format</label>
            </div>
            <button class="btn">DOWNLOAD</button>
        </div>
        <div class="block">
            <div class="card" id="csv">
                <img src="../res/img/csv.png" alt="">
                <label for="">CSV Format</label>
            </div>
            <button class="btn">DOWNLOAD</button>
        </div>
        <div class="block">
            <div class="card" id="json">
                <img src="../res/img/Json icon.png" alt="">
                <label for="">JSON Format</label>
            </div>
            <button class="btn">DOWNLOAD</button>
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