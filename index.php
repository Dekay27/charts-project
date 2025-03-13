<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart.js with PHP & Bootstrap</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Set a default height for charts */
        .chart-container {
            position: relative;
            min-height: 400px; /* Increased default height */
        }
        .chart-canvas {
            width: 100%;
            height: 100%;
        }
        /* Style for the draggable handle */
        .resize-handle {
            width: 100%;
            height: 10px;
            background: #ddd;
            cursor: ns-resize;
            text-align: center;
        }
        /* Full-screen styling */
        .fullscreen-chart {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 1050; /* Above Bootstrap modals */
            background: white;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Chart.js Dashboard</h1>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body ">
                    <div class="chart-container" id="barChartContainer">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="chart-container" id="lineChartContainer">
                        <canvas id="lineChart" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js from Composer -->
<script src="vendor/npm-asset/chart.js/dist/chart.umd.js"></script>
<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="assets/js/charts.js"></script>
</body>
</html>