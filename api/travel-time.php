<?php
header('Content-Type: application/json');

$distanceKm = floatval($_GET['distance_km'] ?? 0);

if ($distanceKm <= 0) {
    echo json_encode(["error" => "Invalid distance"]);
    exit;
}

$vehicles = json_decode(
    file_get_contents('../data/vehicles.json'),
    true
);

$result = [];

foreach ($vehicles as $key => $vehicle) {

    $hours = $distanceKm / $vehicle['speed_kmh'];
    $days  = $hours / 24;
    $years = $days / 365;

    $result[$key] = [
        "label" => $vehicle['label'],
        "hours" => round($hours, 2),
        "days"  => round($days, 2),
        "years" => round($years, 2)
    ];
}

echo json_encode($result);
