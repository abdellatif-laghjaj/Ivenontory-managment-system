<?php
//include connection file
include '../db/connection.php';
$period = $_GET['periode'];
$format = $_GET['format'];
if ($period == '1') {
    // select data of last day
    $sql = "SELECT s.saleID, c.username, p.name, s.quantity, s.earning, s.sale_date FROM sale s, customer c, product p 
    WHERE s.customerID = c.customerID AND s.productID = p.productID AND s.sale_date = (SELECT MAX(sale_date) FROM sale)";
} else if ($period == '2') {
    // select data of last week
    $sql = "SELECT s.saleID, c.username, p.name, s.quantity, s.earning, s.sale_date FROM sale s, customer c, product p 
    WHERE s.customerID = c.customerID AND s.productID = p.productID AND s.sale_date BETWEEN (SELECT DATE_SUB(NOW(), INTERVAL 7 DAY)) AND NOW()";
} else if ($period == '3') {
    // select data of last month
    $sql = "SELECT s.saleID, c.username, p.name, s.quantity, s.earning, s.sale_date FROM sale s, customer c, product p 
    WHERE s.customerID = c.customerID AND s.productID = p.productID AND s.sale_date BETWEEN (SELECT DATE_SUB(NOW(), INTERVAL 1 MONTH)) AND NOW()";
} else {
    // select data of last year
    $sql = "SELECT s.saleID, c.username, p.name, s.quantity, s.earning, s.sale_date FROM sale s, customer c, product p 
    WHERE s.customerID = c.customerID AND s.productID = p.productID AND s.sale_date BETWEEN (SELECT DATE_SUB(NOW(), INTERVAL 1 YEAR)) AND NOW()";
}
$result = mysqli_query($con, $sql);
//sales table
echo '<table class="table" id="sales" style="display: none">';
echo '<thead>';
echo '<tr>';
echo '<th>No</th>';
echo '<th>Customer Name</th>';
echo '<th>Product Name</th>';
echo '<th>Quantity</th>';
echo '<th>Earning</th>';
echo '<th>Date</th>';
echo '</tr>';
echo '</thead>';

while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>' . $row['saleID'] . '</td>';
    echo '<td>' . $row['username'] . '</td>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['quantity'] . '</td>';
    echo '<td>' . $row['earning'] . '</td>';
    echo '<td>' . $row['sale_date'] . '</td>';
    echo '</tr>';
}
echo '</table>';

//products sql
if ($period == '1') {
    $p_sql = "SELECT * FROM product WHERE add_date = (SELECT MAX(add_date) FROM product)";
} else if ($period == '2') {
    $p_sql = "SELECT * FROM product WHERE add_date BETWEEN (SELECT DATE_SUB(NOW(), INTERVAL 7 DAY)) AND NOW()";
} else if ($period == '3') {
    $p_sql = "SELECT * FROM product WHERE add_date BETWEEN (SELECT DATE_SUB(NOW(), INTERVAL 1 MONTH)) AND NOW()";
} else {
    $p_sql = "SELECT * FROM product WHERE add_date BETWEEN (SELECT DATE_SUB(NOW(), INTERVAL 1 YEAR)) AND NOW()";
}
$result_products = mysqli_query($con, $p_sql);

//products table
echo '<table class="table" id="products" style="display: none">';
echo '<thead>';
echo '<tr>';
echo '<th>No</th>';
echo '<th>Product Name</th>';
echo '<th>Description</th>';
echo '<th>Category</th>';
echo '<th>Stock</th>';
echo '<th>Sale Price</th>';
echo '<th>Buy Price</th>';
echo '<th>Date</th>';
echo '</tr>';
echo '</thead>';
while ($row = mysqli_fetch_array($result_products)) {
    echo '<tr>';
    echo '<td>' . $row['productID'] . '</td>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['description'] . '</td>';
    echo '<td>' . $row['category'] . '</td>';
    echo '<td>' . $row['stock'] . '</td>';
    echo '<td>' . $row['sale_price'] . '</td>';
    echo '<td>' . $row['buy_price'] . '</td>';
    echo '<td>' . $row['add_date'] . '</td>';
    echo '</tr>';
}
echo '</table>';

//customers sql
$c_sql = "SELECT * FROM customer";
$result_customers = mysqli_query($con, $c_sql);

//customers table
echo '<table class="table" id="customers" style="display: none">';
echo '<thead>';
echo '<tr>';
echo '<th>No</th>';
echo '<th>Customer Name</th>';
echo '<th>Username</th>';
echo '<th>Email</th>';
echo '<th>Address</th>';
echo '<th>Phone</th>';
echo '<tr>';
echo '</thead>';
while ($row = mysqli_fetch_array($result_customers)) {
    echo '<tr>';
    echo '<td>' . $row['customerID'] . '</td>';
    echo '<td>' . $row['full_name'] . '</td>';
    echo '<td>' . $row['userName'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['addresse'] . '</td>';
    echo '<td>' . $row['phone'] . '</td>';
    echo '</tr>';
}
echo '</table>';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../res/img/logo.svg">
    <title>Download Reports</title>
</head>
<style>

    @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700");

    :root {
        --container-font-size: 28px;
        --container-background-color: #143982;
        --btn-upload-background-color: #0d5eff;
        --btn-upload-color: #ffffff;
        --btn-upload-width: 225px;
        --btn-upload-height: 80px;
        --btn-upload-border-radius: 0.30em;
        --btn-upload-transition-time: 50ms;
        --progress-width: 50px;
        --progress-height: 30px;
        --progress-top: -40px;
        --progress-arrow-color: #ffffff;
        --progress-arrow-background-color: #f53060;
        --progress-arrow-width: 8px;
        --progress-arrow-height: 8px;
        --check-width: 80px;
        --check-height: 45px;
        --check-stroke: 15px;
    }

    * {
        margin: 0;
        padding: 0;
        font-family: "Arial", sans-serif;
    }

    html,
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        text-align: center;
        place-items: center;
        background: #dde6f0;
    }

    #container {
        font-family: "Open Sans", sans-serif;
        font-size: var(--container-font-size);
        background-color: var(--container-background-color);
        width: 100vw;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .btn-upload {
        color: var(--btn-upload-color);
        fill: var(--btn-upload-color);
        font-family: inherit;
        font-size: inherit;
        font-weight: bold;
        background-color: var(--btn-upload-background-color);
        width: var(--btn-upload-width);
        height: var(--btn-upload-height);
        padding: 0;
        border: 0;
        margin: 0;
        outline: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        position: relative;
        border-radius: var(--btn-upload-border-radius);
        box-shadow: 0 0.7em 1.2em rgba(25, 25, 25, 0.5);
    }

    .btn-upload:hover {
        cursor: pointer;
    }

    .btn-upload:not(.btn-upload-uploading) {
        transition: box-shadow var(--btn-upload-transition-time) ease-out,
        transform var(--btn-upload-transition-time) ease-out;
    }

    .btn-upload:not(.btn-upload-uploading):hover {
        box-shadow: 0 0.7em 1.2em rgba(25, 25, 25, 0.8);
    }

    .btn-upload:not(.btn-upload-uploading):active {
        box-shadow: 0 0 0 rgba(25, 25, 25, 0.8);
        transform: translateY(0.2em);
    }

    .btn-upload > span {
        color: inherit;
        margin-left: 0.3em;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

</style>
<body>


<div id="container">
    <button class="btn-upload" id="btn_upload">
        <img src="../res/img/download.png" style="width: 32px;" alt="">
        <span style="font-size: 20px;">DOWNLOAD</span>
        <div class="progress"></div>
        <div class="check">
            <span></span>
            <span></span>
        </div>
    </button>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        2
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        3
        crossorigin="anonymous"></script>
<script src="../js/tableHTMLExport.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
<script>
    const url = new URLSearchParams(window.location.search);
    const format = url.get('format');
    const reportType = url.get('report');
    let download_btn = document.getElementById('btn_upload');

    download_btn.addEventListener('click', function () {
        if (format === 'pdf') {
            if (reportType === 'sales') {
                generateSalesPDF();
            } else if (reportType === 'products') {
                generateProductsPDF();
            } else {
                generateCustomersPDF();
            }
        } else if (format === 'csv') {
            if (reportType === 'sales') {
                generateCsvOrJson("#sales", "sales_reports.csv", "csv");
            } else if (reportType === 'products') {
                generateCsvOrJson("#products", "products_reports.csv", "csv");
            } else {
                generateCsvOrJson("#customers", "customers_reports.csv", "csv");
            }
        } else {
            if (reportType === 'sales') {
                generateCsvOrJson("#sales", "sales_reports.json", "json");
            } else if (reportType === 'products') {
                generateCsvOrJson("#products", "products_reports.json", "json");
            } else {
                generateCsvOrJson("#customers", "customers_reports.json", "json");
            }
        }
    });

    function generateSalesPDF() {
        const doc = new jsPDF('p', 'pt', 'letter');
        const htmlstring = '';
        const tempVarToCheckPageHeight = 0;
        let pageHeight = 0;
        pageHeight = doc.internal.pageSize.height;
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function (element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 150,
            bottom: 60,
            left: 40,
            right: 40,
            width: 600
        };
        let y = 20;
        doc.setLineWidth(2);
        doc.text(300, y = y + 25, "SALES REPORT", {
            align: "center",
            fontSize: 20
        });

        doc.autoTable({
            html: '#sales',
            startY: 70,
            theme: 'grid',
            columnStyles: {
                0: {
                    cellWidth: 80
                },
                1: {
                    cellWidth: 80
                },
                2: {
                    cellWidth: 80
                },
                3: {
                    cellWidth: 80
                },
                4: {
                    cellWidth: 80
                },
                5: {
                    cellWidth: 150
                },

            },
            styles: {
                minCellHeight: 40
            }
        })
        doc.save('sales_reports.pdf');
    }

    function generateProductsPDF() {
        const doc = new jsPDF('p', 'pt', 'letter');
        const htmlstring = '';
        const tempVarToCheckPageHeight = 0;
        let pageHeight = 0;
        pageHeight = doc.internal.pageSize.height;
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function (element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 150,
            bottom: 60,
            left: 40,
            right: 40,
            width: 600
        };
        let y = 20;
        doc.setLineWidth(2);
        doc.text(300, y = y + 25, "PRODUCTS REPORT", {
            align: "center",
            fontSize: 20
        });

        doc.autoTable({
            html: '#products',
            startY: 70,
            theme: 'grid',
            columnStyles: {
                0: {
                    cellWidth: 64
                },
                1: {
                    cellWidth: 64
                },
                2: {
                    cellWidth: 64
                },
                3: {
                    cellWidth: 64
                },
                4: {
                    cellWidth: 64
                },
                5: {
                    cellWidth: 64
                },
                6: {
                    cellWidth: 64
                },
                7: {
                    cellWidth: 64
                },
                8: {
                    cellWidth: 64
                },
            },
            styles: {
                minCellHeight: 40
            }
        })
        doc.save('products_reports.pdf');
    }

    function generateCustomersPDF() {
        const doc = new jsPDF('p', 'pt', 'letter');
        const htmlstring = '';
        const tempVarToCheckPageHeight = 0;
        let pageHeight = 0;
        pageHeight = doc.internal.pageSize.height;
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function (element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 150,
            bottom: 60,
            left: 40,
            right: 40,
            width: 600
        };
        let y = 20;
        doc.setLineWidth(2);
        doc.text(300, y = y + 25, "CUSTOMERS REPORT", {
            align: "center",
            fontSize: 20
        });

        doc.autoTable({
            html: '#customers',
            startY: 70,
            theme: 'grid',
            columnStyles: {
                0: {
                    cellWidth: 80
                },
                1: {
                    cellWidth: 80
                },
                2: {
                    cellWidth: 80
                },
                3: {
                    cellWidth: 80
                },
                4: {
                    cellWidth: 80
                },
                5: {
                    cellWidth: 80
                },
            },
            styles: {
                minCellHeight: 40
            }
        })
        doc.save('customers_reports.pdf');
    }

    function generateCsvOrJson(table, filename, type) {
        $(table).tableHTMLExport({
            // csv, txt, json, pdf
            type: type,
            // file name
            filename: filename
        });
    }
</script>
</body>
</html>