<?php include('includes/header.php'); ?>
<main>
    <div class="row">
        <!--Doughnut chart-->
        <div class="col m4 s12">
            <div class="card">
                <div class="card-content blue-grey darken-1">
                    <span class="card-title white-text">Card Title</span>
                </div>
                <div class="card-content">
                    <div class="chart">
                        <canvas id="doughnutChart" width="400" height="400"></canvas>
                    </div>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>

        <!--Radar chart-->
        <div class="col m4 s12">
            <div class="card">
                <div class="card-content blue-grey darken-1">
                    <span class="card-title white-text">Card Title</span>
                </div>
                <div class="card-content">
                    <div class="chart">
                        <canvas id="radarChart" width="400" height="400"></canvas>
                    </div>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>

        <!--Polar chart-->
        <div class="col m4 s12">
            <div class="card">
                <div class="card-content blue-grey darken-1">
                    <span class="card-title white-text">Card Title</span>
                </div>
                <div class="card-content">
                    <div class="chart">
                        <canvas id="polarChart" width="400" height="400"></canvas>
                    </div>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>

        <!--Bar chart-->
        <div class="col m4 s12">
            <div class="card">
                <div class="card-content blue-grey darken-1">
                    <span class="card-title white-text">Card Title</span>
                </div>
                <div class="card-content">
                    <div class="chart">
                        <canvas id="barChart" width="400" height="400"></canvas>
                    </div>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>

        <!--Pie chart-->
        <div class="col m4 s12">
            <div class="card">
                <div class="card-content blue-grey darken-1">
                    <span class="card-title white-text">Card Title</span>
                </div>
                <div class="card-content">
                    <div class="chart">
                        <canvas id="pieChart" width="400" height="400"></canvas>
                    </div>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>

        <!--Line chart-->
        <div class="col m4 s12">
            <div class="card">
                <div class="card-content blue-grey darken-1">
                    <span class="card-title white-text">Card Title</span>
                </div>
                <div class="card-content">
                    <div class="chart">
                        <canvas id="lineChart" width="400" height="400"></canvas>
                    </div>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('includes/scripts.php'); ?>
<script src="assets/bower_components/chart.js/Chart.min.js"></script>
<script>
$(document).ready(function(){
    $(".button-collapse").sideNav();
    $( ".collapsible-header" ).click(function() {
        if ($(this).find(".material-icons.right").css( "transform" ) == 'none' ){
            $(this).find(".material-icons.right").css("transform","rotate(90deg)");
        } else {
            $(this).find(".material-icons.right").css("transform","" );
        }
    });
})
</script>

<!--Chart.js-->
<script>
// Get the context of the canvas element we want to select
Chart.defaults.global.responsive = true;

// Datasets
var dataDoughnut = [
    {
        value: 300,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Red"
    },
    {
        value: 50,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Green"
    },
    {
        value: 100,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Yellow"
    }
]

var dataBar = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,0.8)",
            highlightFill: "rgba(151,187,205,0.75)",
            highlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86, 27, 90]
        }
    ]
};

var dataRadar = {
    labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
    datasets: dataBar.datasets
};

var dataPolar = [
    {
        value: 300,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Red"
    },
    {
        value: 50,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Green"
    },
    {
        value: 100,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Yellow"
    },
    {
        value: 40,
        color: "#949FB1",
        highlight: "#A8B3C5",
        label: "Grey"
    },
    {
        value: 120,
        color: "#4D5360",
        highlight: "#616774",
        label: "Dark Grey"
    }
];

// Initialize the chart into HTML page
var ctxDough = document.getElementById("doughnutChart").getContext("2d");
var myNewChart = new Chart(ctxDough).Doughnut(dataDoughnut, {
    animateScale: true
});

var ctxPie = document.getElementById("pieChart").getContext("2d");
var myPieChart = new Chart(ctxPie).Pie(dataDoughnut, {
    animateScale: true
});

var ctxBar = document.getElementById("barChart").getContext("2d");
var myBarChart = new Chart(ctxBar).Bar(dataBar, {
    animateScale: true
});

var ctxLine = document.getElementById("lineChart").getContext("2d");
var myBarChart = new Chart(ctxLine).Line(dataBar, {
    animateScale: true
});

var ctxRadar = document.getElementById("radarChart").getContext("2d");
var myBarChart = new Chart(ctxRadar).Radar(dataRadar, {
    animateScale: true
});

var ctxPolar = document.getElementById("polarChart").getContext("2d");
var myBarChart = new Chart(ctxPolar).PolarArea(dataPolar, {
    animateScale: true
});
</script>
</body>

</html>
