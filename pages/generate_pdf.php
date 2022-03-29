<?php
//include connection file
include '../db/connection.php';
$period = $_GET['periode'];
$format = $_GET['format'];
if ($period == '1') {
    // select data of last day
    $sql = "SELECT * FROM sale WHERE sale_date = (SELECT MAX(sale_date) FROM sale)";
} else if ($period == '2') {
    // select data of last week
    $sql = "SELECT * FROM sale WHERE sale_date BETWEEN (SELECT DATE_SUB(NOW(), INTERVAL 7 DAY)) AND NOW()";
} else if ($period == '3') {
    // select data of last month
    $sql = "SELECT * FROM sale WHERE sale_date BETWEEN (SELECT DATE_SUB(NOW(), INTERVAL 1 MONTH)) AND NOW()";
} else {
    // select data of last year
    $sql = "SELECT * FROM sale WHERE sale_date BETWEEN (SELECT DATE_SUB(NOW(), INTERVAL 1 YEAR)) AND NOW()";
}
$result = mysqli_query($con, $sql);
echo '<table class="table" id="sales" style="display: none">';
echo '<thead>';
echo '<tr>';
echo '<th>No</th>';
echo '<th>Customer ID</th>';
echo '<th>Product ID</th>';
echo '<th>Quantity</th>';
echo '<th>Earning</th>';
echo '<th>Date</th>';
echo '</tr>';
echo '</thead>';

while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>' . $row['saleID'] . '</td>';
    echo '<td>' . $row['customerID'] . '</td>';
    echo '<td>' . $row['productID'] . '</td>';
    echo '<td>' . $row['quantity'] . '</td>';
    echo '<td>' . $row['earning'] . '</td>';
    echo '<td>' . $row['sale_date'] . '</td>';
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
    <title>Document</title>
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
        --btn-upload-border-radius: 0.75em;
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

    .btn-upload > svg {
        fill: inherit;
    }

    .btn-upload > span {
        color: inherit;
        margin-left: 0.3em;
    }

    .progress {
        color: var(--progress-arrow-color);
        font-family: inherit;
        font-size: 50%;
        background-color: var(--progress-arrow-background-color);
        width: var(--progress-width);
        height: var(--progress-height);
        display: flex;
        align-items: center;
        justify-content: center;
        display: none;
        position: absolute;
        left: 0;
        top: var(--progress-top);
        border-radius: 0.5em;
        opacity: 0;
        transform-origin: center bottom;
        transform: translateX(-50%);
        filter: drop-shadow(0 0.7em 1.2em rgba(25, 25, 25, 0.5));
    }

    .progress:after {
        content: "";
        border-top: solid var(--progress-arrow-height) var(--progress-arrow-background-color);
        border-bottom: 0;
        border-left: solid calc(var(--progress-arrow-width) / 2) transparent;
        border-right: solid calc(var(--progress-arrow-width) / 2) transparent;
        position: absolute;
        top: calc(100% - 1px);
    }

    .check {
        width: var(--check-width);
        height: var(--check-height);
        display: none;
        position: absolute;
        top: calc(50% - calc(var(--check-width) / 2));
        left: calc(50% - calc(var(--check-height) / 2));
        transform-origin: center bottom;
        transform: rotate(-45deg);
    }

    .check > span {
        background-color: #ffffff;
        display: block;
        position: absolute;
    }

    .check > span:first-child {
        width: var(--check-stroke);
        height: 0;
        top: 0;
        left: 0;
    }

    .check > span:last-child {
        width: 0;
        height: var(--check-stroke);
        bottom: 0;
        left: 0;
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
    let url = window.location.href;
    //get format from url
    let format = url.substring(url.lastIndexOf('=') + 1);
    let download_btn = document.getElementById('btn_upload');

    download_btn.addEventListener('click', function () {
        if (format === 'pdf') {
            generatePDF()
        } else if (format === 'csv') {
            $("#sales").tableHTMLExport({
                // csv, txt, json, pdf
                type: "csv",
                // file name
                filename: "sales_reports.csv"
            });
        } else {
            $("#sales").tableHTMLExport({
                // csv, txt, json, pdf
                type: "json",
                // file name
                filename: "sales_reports.json"
            });
        }
    });

    function generatePDF() {
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
</script>
</body>

</html>