//Eventlistener for collapsible
var coll = document.getElementsByClassName("collapsible");

var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }
    });
}


// Get the modal
var modal = document.getElementById("myModal");

//Mirror 3 hidden input fields in Modal form
var input1 = document.getElementById('ek');
var input2 = document.getElementById('price');
var input3 = document.getElementById('Jek');
var output1 = document.getElementById('Mek');
var output2 = document.getElementById('Mprice');
var output3 = document.getElementById('Mjek');
var button = document.getElementById('calc');
button.addEventListener("click", mirror);
input1.addEventListener("change", mirror);
input2.addEventListener("change", mirror);
input3.addEventListener("change", mirror);

function mirror() {
    output1.value = input1.value;
    output2.value = input2.value;
    output3.value = input3.value;
}
// Get the button that opens the modal
var btn = document.getElementById("popup");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//change nav color on burger menue click
var nav = document.getElementById("nav");
var mySidenav = document.getElementById("mySidenav");
var navBO = document.getElementById("navButtonO");
var navBC = document.getElementById("navButtonC");
navBO.addEventListener("click", styleChange);
navBC.addEventListener("click", styleBack);

function styleChange() {
    nav.style.backgroundColor = "#a3987a";
    mySidenav.style.backgroundColor = "#c7bb9f";
}

function styleBack() {
    nav.style.backgroundColor = "#c7bb9f";
    mySidenav.style.backgroundColor = "#c7bb9f";
}
//nav open close button functions
function openNav() {
    document.getElementById("mySidenav").style.width = "650px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}