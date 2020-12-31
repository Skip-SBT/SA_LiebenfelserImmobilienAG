new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
        labels: ["Fremde Mittel", "Eigene Mittel"],
        datasets: [{
            backgroundColor: ["#deb587", "#ad7331"],
            data: [2478, 5267],
        }]
    },
    options: {
        legend: {
            labels: {
                // This more specific font property overrides the global property
                fontSize: 70
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
            data: [2478, 5267],
        }]
    },
    options: {
        legend: {
            labels: {
                // This more specific font property overrides the global property
                fontSize: 70
            }
        },
        animation: {
            duration: 0
        }
    }

});