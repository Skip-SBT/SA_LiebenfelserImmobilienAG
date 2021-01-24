var chart1v1 = document.getElementById('chartVal1').value;
var chart1v2 = document.getElementById('chartVal2').value;
var chart2v1 = document.getElementById('chart2Val1').value;
var chart2v2 = document.getElementById('chart2Val2').value;
console.log(chart2v2);
new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
        labels: ["Fremde Mittel", "Eigene Mittel"],
        datasets: [{
            backgroundColor: ["#deb587", "#ad7331"],
            data: [chart1v1, chart1v2],
        }]
    },
    options: {
        legend: {
            labels: {
                // This more specific font property overrides the global property
                fontSize: 100,
                padding: 50
            }
        },
        animation: {
            duration: 0
        }
    }

});

new Chart(document.getElementById("doughnut-chart2"), {
    type: 'doughnut',
    data: {
        labels: ["Freies Einkommen", "Belastung"],
        datasets: [{
            backgroundColor: ["#deb587", "#ad7331"],
            data: [chart2v1, chart2v2],
        }]
    },
    options: {
        legend: {
            labels: {
                // This more specific font property overrides the global property
                fontSize: 100,
                padding: 50
            }
        },
        animation: {
            duration: 0
        }
    }

});