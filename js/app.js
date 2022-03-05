let mainContent = document.querySelector(".content");

//add active class to the content on mouse over
function mouseEnter() {
  mainContent.classList.add("active");
}

//remove the active class to the content on mouse out
function mouseOut() {
  mainContent.classList.remove("active");
}

// For make links active

// Get the container element
var linksContainer = document.querySelector(".navbar-nav");

// Get all buttons inside the container
var btns = linksContainer.getElementsByClassName("nav-link");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function () {
    var current = document.getElementsByClassName("active-link");
    current[0].className = current[0].className.replace(" active-link", "");
    this.className += " active-link";
  });
}

//Drop down script
function dropDown() {
  document.getElementById("legend").classList.toggle("show");
  document.getElementById("arrow").classList.toggle("show");
  document.getElementById("form").classList.toggle("show");
}
function dropDown2() {
  document.getElementById("legend1").classList.toggle("show");
  document.getElementById("arrow1").classList.toggle("show");
  document.getElementById("form1").classList.toggle("show");
}
