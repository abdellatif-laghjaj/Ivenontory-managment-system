let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']; 

let data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]; // the data of each month

let mainContent = document.querySelector(".content");

//add active class to the content on mouse over
function mouseEnter(){
    mainContent.classList.add("active");
}

//remove the active class to the content on mouse out
function mouseOut(){
    mainContent.classList.remove("active");
}

//For bar chart

const chart = document.getElementById('myChart').getContext('2d');
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

//For bar chart

const circleChart = document.getElementById('myChart-circle').getContext('2d');
const myCircleChart = new Chart(circleChart, {
    type: 'polarArea',
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