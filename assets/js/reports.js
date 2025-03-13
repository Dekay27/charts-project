document.addEventListener('DOMContentLoaded', function() {
    let pieChartInstance, doughnutChartInstance, radarChartInstance;

    fetch('generate_data.php')
        .then(response => response.json())
        .then(data => {
            // Pie Chart
            const pieCtx = document.getElementById('pieChart').getContext('2d');
            pieChartInstance = new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Pie Data',
                        data: data.barData, // Reusing barData for simplicity
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(255, 159, 64, 0.7)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // Doughnut Chart
            const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
            doughnutChartInstance = new Chart(doughnutCtx, {
                type: 'doughnut',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Doughnut Data',
                        data: data.lineData, // Reusing lineData
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(255, 159, 64, 0.7)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // Radar Chart
            const radarCtx = document.getElementById('radarChart').getContext('2d');
            radarChartInstance = new Chart(radarCtx, {
                type: 'radar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Radar Data',
                        data: data.barData, // Reusing barData
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        r: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error:', error));

    // Resizing functionality with corner handle
    document.querySelectorAll('.resize-corner').forEach(handle => {
        const container = handle.parentElement;
        let isResizing = false;
        let startX, startY, startWidth, startHeight;

        handle.addEventListener('mousedown', (e) => {
            isResizing = true;
            startX = e.clientX;
            startY = e.clientY;
            startWidth = container.offsetWidth;
            startHeight = container.offsetHeight;
            e.preventDefault(); // Prevent text selection
        });

        const resizeChart = (e) => {
            if (!isResizing) return;
            const newWidth = startWidth + (e.clientX - startX);
            const newHeight = startHeight + (e.clientY - startY);
            if (newWidth >= 200 && newHeight >= 200) { // Minimum size
                container.style.width = `${newWidth}px`;
                container.style.height = `${newHeight}px`;
                if (container.id === 'pieChartContainer') pieChartInstance.update();
                if (container.id === 'doughnutChartContainer') doughnutChartInstance.update();
                if (container.id === 'radarChartContainer') radarChartInstance.update();
            }
        };

        const stopResizing = () => {
            isResizing = false;
        };

        document.addEventListener('mousemove', resizeChart);
        document.addEventListener('mouseup', stopResizing);
    });


    // Full-screen functionality
    document.querySelectorAll('.fullscreen-btn').forEach(button => {
        button.addEventListener('click', () => {
            const chartContainer = document.getElementById(button.dataset.chart);
            if (!document.fullscreenElement) {
                chartContainer.classList.add('fullscreen-chart');
                chartContainer.requestFullscreen().then(() => {
                    if (chartContainer.id === 'pieChartContainer') pieChartInstance.update();
                    if (chartContainer.id === 'doughnutChartContainer') doughnutChartInstance.update();
                    if (chartContainer.id === 'radarChartContainer') radarChartInstance.update();
                });
            } else {
                document.exitFullscreen().then(() => {
                    chartContainer.classList.remove('fullscreen-chart');
                    if (chartContainer.id === 'pieChartContainer') pieChartInstance.update();
                    if (chartContainer.id === 'doughnutChartContainer') doughnutChartInstance.update();
                    if (chartContainer.id === 'radarChartContainer') radarChartInstance.update();
                });
            }
        });
    });
});