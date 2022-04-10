let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
let data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]; // the data of each month
//data for circle chart
let categories = ['Mobile', 'Laptops', 'Mouse', 'Keyboard', 'EarPhone'];
let dataCategories = [12, 5, 19, 10, 8];

//For bar chart

const chart = document.getElementById('myChart').getContext('2d');
const circleChart = document.getElementById('myChart-circle').getContext('2d');
const lineChart = document.getElementById('myChart-line').getContext('2d');

const myChart = new Chart(chart, {
    type: 'bar',
    data: {
        labels: months,
        datasets: [{
            label: 'Earnings',
            data: data,
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ]
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Number of sales'
            }
        }
    }
});

// For line chart

const myLineChart = new Chart(lineChart, {
    type: 'line',
    data: {
        labels: months,
        datasets: [{
            label: 'Earnings',
            data: data,
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ]
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Number of sales'
            }
        }
    }
});

//For bar chart

const myCircleChart = new Chart(circleChart, {
    type: 'polarArea',
    data: {
        labels: categories,
        datasets: [{
            label: 'Products',
            data: dataCategories,
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ]
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Product'
            }
        }
    }
});