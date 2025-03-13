<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart.js Reports - Pie, Doughnut, Radar</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .chart-container {
            position: relative;
            min-height: 400px;
        }
        .chart-canvas {
            width: 100%;
            height: 100%;
        }
        /* New corner resize handle */
        .resize-corner {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 15px;
            height: 15px;
            background: #666;
            border-radius: 50%;
            cursor: se-resize; /* Diagonal resize cursor */
            z-index: 10; /* Ensure it’s above the canvas */
        }
        .fullscreen-chart {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 1050;
            background: white;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Reports Dashboard</h1>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="chart-container" id="pieChartContainer">
                        <canvas id="pieChart" class="chart-canvas"></canvas>
                    </div>
                 </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="chart-container" id="doughnutChartContainer">
                        <canvas id="doughnutChart" class="chart-canvas"></canvas>
                    </div>
                 </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="chart-container" id="radarChartContainer">
                        <canvas id="radarChart" class="chart-canvas"></canvas>
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
<script src="assets/js/reports.js"></script>
</body>
</html>