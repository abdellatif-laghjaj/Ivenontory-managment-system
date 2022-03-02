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
`;

let category = `
    <h1>Category</h1>
    <hr color="#FF304F" width="90%" size="4">
`;

let products = `
    <h1>Products</h1>
    <hr color="#FF304F" width="90%" size="4">
`;

let reports = `
    <h1>Reports</h1>
    <hr color="#FF304F" width="90%" size="4">
`;
function changeToDashboard() {
    let content = document.querySelector(".content");
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