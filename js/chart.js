var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        datasets: [{
                data: [5],
                backgroundColor: '#b82e2e',
                label: "Hello"
            },

            {
                data: [40],
                backgroundColor: '#3366cc'
            }
        ]
    },
    options: {
        responsive: false,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                stacked: true,
                gridLines: {
                    drawBorder: false,
                    display: false
                },
                ticks: {
                    display: false
                }
            }],
            yAxes: [{
                stacked: true,
                gridLines: {
                    drawBorder: false,
                    display: false
                },
                ticks: {
                    display: false
                }
            }]
        }
    }
});