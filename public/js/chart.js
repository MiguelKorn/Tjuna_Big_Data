function pieChartExternalLegend(canvasId, legendId, data) {
    var options = {
        responsive: true,
        scaleBeginAtZero: true,
        legend: {
            display: false
        },
        showTooltip: false,
        tooltips: {
            enabled: false
        },
        pieceLabel: {
            mode: 'percentage',
            precision: 1
        }
    };


    var ctx = $("#"+ canvasId).get(0).getContext("2d");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: options
    });

    $("#"+ legendId).html(myPieChart.generateLegend());
}

function barChart(canvasId, data) {
    var options = {
        scales: {
            xAxes: [{
                display: false
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    max: 1400,
                    stepSize: 350
                }
            }]
        },
        tooltips: {
            enabled: false
        }
    };

    var ctx = $("#"+ canvasId).get(0).getContext("2d");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
}

function barChartNoMax(canvasId, data) {
    var options = {
        scales: {
            xAxes: [{
                display: false
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        tooltips: {
            enabled: true
        }
    };
    var ctx = $("#"+ canvasId).get(0).getContext("2d");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
}
