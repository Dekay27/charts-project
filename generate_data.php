<?php
header('Content-Type: application/json');

function generateDummyData() {
    $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
    $data = [
        'labels' => $months,
        'barData' => [],
        'lineData' => []
    ];

    for ($i = 0; $i < count($months); $i++) {
        $data['barData'][] = rand(100, 1000);
        $data['lineData'][] = rand(200, 800);
    }

    return json_encode($data);
}

echo generateDummyData();