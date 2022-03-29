<?php

include '../db/connection.php';
//################################################################
//FOR CATEGORIES CHART
//################################################################
// get all categories
$sql = "SELECT * FROM category";
$result = mysqli_query($con, $sql);
// convert to javascript array
$categories = array();
while ($row = mysqli_fetch_array($result)) {
    $categories[] = $row['category_name'];
}

// get total number of products in each category
$sql = "SELECT products_total FROM category";
$result = mysqli_query($con, $sql);
$total_products = array();
while ($row = mysqli_fetch_array($result)) {
    $total_products[] = $row['products_total'];
}

//################################################################
//FOR SALES CHART
//################################################################

//get number of sales of each month
$january = "SELECT COUNT(*) FROM sale WHERE MONTH(sale_date) = 1";
$february = "SELECT COUNT(*) FROM sale WHERE MONTH(sale_date) = 2";
$march = "SELECT COUNT(*) FROM sale WHERE MONTH(sale_date) = 3";
$april = "SELECT COUNT(*) FROM sale WHERE MONTH(sale_date) = 4";
$may = "SELECT COUNT(*) FROM sale WHERE MONTH(sale_date) = 5";
$june = "SELECT COUNT(*) FROM sale WHERE MONTH(sale_date) = 6";
$july = "SELECT COUNT(*) FROM sale WHERE MONTH(sale_date) = 7";
$august = "SELECT COUNT(*) FROM sale WHERE MONTH(sale_date) = 8";
$september = "SELECT COUNT(*) FROM sale WHERE MONTH(sale_date) = 9";
$october = "SELECT COUNT(*) FROM sale WHERE MONTH(sale_date) = 10";
$november = "SELECT COUNT(*) FROM sale WHERE MONTH(sale_date) = 11";
$december = "SELECT COUNT(*) FROM sale WHERE MONTH(sale_date) = 12";

$run_january = mysqli_query($con, $january);
$run_february = mysqli_query($con, $february);
$run_march = mysqli_query($con, $march);
$run_april = mysqli_query($con, $april);
$run_may = mysqli_query($con, $may);
$run_june = mysqli_query($con, $june);
$run_july = mysqli_query($con, $july);
$run_august = mysqli_query($con, $august);
$run_september = mysqli_query($con, $september);
$run_october = mysqli_query($con, $october);
$run_november = mysqli_query($con, $november);
$run_december = mysqli_query($con, $december);

// convert to javascript array
$sales = array();
while ($row = mysqli_fetch_array($run_january)) {
    $sales[] = $row['COUNT(*)'];
}
while ($row = mysqli_fetch_array($run_february)) {
    $sales[] = $row['COUNT(*)'];
}
while ($row = mysqli_fetch_array($run_march)) {
    $sales[] = $row['COUNT(*)'];
}
while ($row = mysqli_fetch_array($run_april)) {
    $sales[] = $row['COUNT(*)'];
}
while ($row = mysqli_fetch_array($run_may)) {
    $sales[] = $row['COUNT(*)'];
}
while ($row = mysqli_fetch_array($run_june)) {
    $sales[] = $row['COUNT(*)'];
}
while ($row = mysqli_fetch_array($run_july)) {
    $sales[] = $row['COUNT(*)'];
}
while ($row = mysqli_fetch_array($run_august)) {
    $sales[] = $row['COUNT(*)'];
}
while ($row = mysqli_fetch_array($run_september)) {
    $sales[] = $row['COUNT(*)'];
}
while ($row = mysqli_fetch_array($run_october)) {
    $sales[] = $row['COUNT(*)'];
}
while ($row = mysqli_fetch_array($run_november)) {
    $sales[] = $row['COUNT(*)'];
}
while ($row = mysqli_fetch_array($run_december)) {
    $sales[] = $row['COUNT(*)'];
}

//################################################################
//FOR EARNINGS CHART
//################################################################

//get total earnings of each month
$january = "SELECT earning FROM sale WHERE MONTH(sale_date) = 1";
$february = "SELECT earning FROM sale WHERE MONTH(sale_date) = 2";
$march = "SELECT earning FROM sale WHERE MONTH(sale_date) = 3";
$april = "SELECT earning FROM sale WHERE MONTH(sale_date) = 4";
$may = "SELECT earning FROM sale WHERE MONTH(sale_date) = 5";
$june = "SELECT earning FROM sale WHERE MONTH(sale_date) = 6";
$july = "SELECT earning FROM sale WHERE MONTH(sale_date) = 7";
$august = "SELECT earning FROM sale WHERE MONTH(sale_date) = 8";
$september = "SELECT earning FROM sale WHERE MONTH(sale_date) = 9";
$october = "SELECT earning FROM sale WHERE MONTH(sale_date) = 10";
$november = "SELECT earning FROM sale WHERE MONTH(sale_date) = 11";
$december = "SELECT earning FROM sale WHERE MONTH(sale_date) = 12";

$run_january = mysqli_query($con, $january);
$run_february = mysqli_query($con, $february);
$run_march = mysqli_query($con, $march);
$run_april = mysqli_query($con, $april);
$run_may = mysqli_query($con, $may);
$run_june = mysqli_query($con, $june);
$run_july = mysqli_query($con, $july);
$run_august = mysqli_query($con, $august);
$run_september = mysqli_query($con, $september);
$run_october = mysqli_query($con, $october);
$run_november = mysqli_query($con, $november);
$run_december = mysqli_query($con, $december);

$earnings = array();

while ($row = mysqli_fetch_array($run_january)) {
    $earnings[] = $row['earning'];
}
while ($row = mysqli_fetch_array($run_february)) {
    $earnings[] = $row['earning'];
}
while ($row = mysqli_fetch_array($run_march)) {
    $earnings[] = $row['earning'];
}
while ($row = mysqli_fetch_array($run_april)) {
    $earnings[] = $row['earning'];
}
while ($row = mysqli_fetch_array($run_may)) {
    $earnings[] = $row['earning'];
}
while ($row = mysqli_fetch_array($run_june)) {
    $earnings[] = $row['earning'];
}
while ($row = mysqli_fetch_array($run_july)) {
    $earnings[] = $row['earning'];
}
while ($row = mysqli_fetch_array($run_august)) {
    $earnings[] = $row['earning'];
}
while ($row = mysqli_fetch_array($run_september)) {
    $earnings[] = $row['earning'];
}
while ($row = mysqli_fetch_array($run_october)) {
    $earnings[] = $row['earning'];
}
while ($row = mysqli_fetch_array($run_november)) {
    $earnings[] = $row['earning'];
}
while ($row = mysqli_fetch_array($run_december)) {
    $earnings[] = $row['earning'];
}

echo '
    <script>
        
let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
let sales_data = ' . json_encode($sales) . '; // the data of each month

//data for categories chart
let categories = ' . json_encode($categories) . ';
let categories_data = ' . json_encode($total_products) . ';

//data for earnings chart
let earnings_data = ' . json_encode($earnings) . ';

const chart = document.getElementById("myChart").getContext("2d");
const circleChart = document.getElementById("myChart-circle").getContext("2d");
const lineChart = document.getElementById("myChart-line").getContext("2d");

//For products categories chart

const myCircleChart = new Chart(circleChart, {
    type: "polarArea",
    data: {
        labels: categories,
        datasets: [{
            label: "Products",
            data: categories_data,
            backgroundColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)"
            ]
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: "Product"
            }
        }
    }
});

//For sales chart

const myChart = new Chart(chart, {
    type: "bar",
    data: {
        labels: months,
        datasets: [{
            label: "Sales",
            data: sales_data,
            backgroundColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)"
            ]
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: "Number of sales"
            }
        }
    }
});

// For earnings chart

const myLineChart = new Chart(lineChart, {
    type: "line",
    data: {
        labels: months,
        datasets: [{
            label: "Earnings",
            data: earnings_data,
            backgroundColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)"
            ]
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: "Number of sales"
            }
        }
    }
});


</script>
    ';
?>