var hypoC = document.getElementById('ek');
var hypoV = document.getElementById('ek').value;
var output = document.getElementById('price');
hypoC.addEventListener('focusout', autoComplete(hypoV, output));

function autoComplete(hypoV, output) {
    console.log("Out of focuse");
    var result = hypoV / 21 * 100;
    output.value = parseInt(result);
}