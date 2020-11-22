var add = document.getElementById('calc');
var ek = document.getElementById('ek').value;
console.log("ek = " + ek);
var price = document.getElementById('price').value;
var ctx1 = document.getElementById('myChart').getContext('2d');
// If ek & price is not set = 0
var chart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        datasets: [{
                data: [100 - 100 / price * ek],
                backgroundColor: '#b82e2e',
                label: "Hypotheke"
            },

            {
                data: [100 / price * ek],
                backgroundColor: '#3aaa35',
                label: "Eigene Mittel"
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
// --- HorizontalChart --------------------------------------------------------------
var barOptions_stacked = {
    tooltips: {
        enabled: false
    },

    scales: {
        xAxes: [{
            ticks: {
                display: false
            },
            scaleLabel: {
                display: false
            },
            gridLines: {
                drawBorder: false,
                display: false
            },
            stacked: true
        }],
        yAxes: [{
            gridLines: {
                display: false,
            },
            ticks: {
                display: false
            },
            stacked: true
        }]
    },
    legend: {
        display: false
    },

    animation: {
        onComplete: function() {
            var chartInstance = this.chart;
            var ctx = chartInstance.ctx;
            ctx.textAlign = "left";
            ctx.font = "9px Open Sans";
            ctx.fillStyle = "#fff";

            Chart.helpers.each(this.data.datasets.forEach(function(dataset, i) {
                var meta = chartInstance.controller.getDatasetMeta(i);
                Chart.helpers.each(meta.data.forEach(function(bar, index) {
                    data = dataset.data[index];
                    if (i == 0) {
                        ctx.fillText(data, 50, bar._model.y + 4);
                    } else {
                        ctx.fillText(data, bar._model.x - 25, bar._model.y + 4);
                    }
                }), this)
            }), this);
        }
    },
    pointLabelFontFamily: "Quadon Extra Bold",
    scaleFontFamily: "Quadon Extra Bold",
};
var tragbarkeit = document.getElementById("tragbarkeit").value;
var ctx = document.getElementById("Chart1");
var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {


        datasets: [{
            data: [100 - tragbarkeit],
            backgroundColor: '#3aaa35',
        }, {
            data: [tragbarkeit],
            backgroundColor: '#b82e2e',
        }]
    },

    options: barOptions_stacked,
});