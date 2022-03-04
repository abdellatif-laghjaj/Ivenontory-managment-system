<h1>Dashboard</h1>
<hr color="#FF304F" width="90%" size="4">

<!-- CARDS CONTAINER -->

<div class="cards-container">
    <div class="card">
        <img src="../res/img/box.png" alt="box icon">
        <div class="info">
            <h3><?php echo $productsTotal?></h3>  
            <p>Products</p>
        </div>
    </div>

    <div class="card sales">
        <img src="../res/img/sales.png" alt="box icon">
        <div class="info">
            <h3><?php echo $salesTotal?></h3>
            <p>Sales</p>
        </div>
    </div>

    <div class="card earnings">
        <img src="../res/img/dollar.png" alt="box icon">
        <div class="info">
            <h3><?php echo $earningsTotal?></h3>
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