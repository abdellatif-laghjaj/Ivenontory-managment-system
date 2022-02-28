let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']; 

let data = []; // the data of each month

var target = document.getElementsByClassName(".nav-link");
var mainContent = document.querySelector("main");

target.addEventListener("mouseover", mOver, false);
target.addEventListener("mouseout", mOut, false);

function mOver() {
   mainContent.classList.add(".active");
}

function mOut() {  
   mainContent.classList.remove(".active");
}