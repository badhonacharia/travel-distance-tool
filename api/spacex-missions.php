<?php
header('Content-Type: application/json');

$ch = curl_init("https://api.spacexdata.com/v4/launches");

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 15,
    CURLOPT_SSL_VERIFYPEER => false
]);

$response = curl_exec($ch);

if ($response === false) {
    echo json_encode([]);
    exit;
}

curl_close($ch);

$data = json_decode($response, true);

if (!is_array($data)) {
    echo json_encode([]);
    exit;
}

$missions = [];

foreach ($data as $launch) {
    if (empty($launch['name']) || empty($launch['date_utc'])) {
        continue;
    }

    // Default orbit
    $orbit = "LEO";
    $distanceKm = 400;

    $name = strtolower($launch['name']);

    // PHP 7 compatible string check
    if (strpos($name, 'iss') !== false) {
        $orbit = "ISS";
        $distanceKm = 408;
    }

    $missions[] = [
        "id" => $launch['id'] ?? null,
        "name" => $launch['name'],
        "date" => substr($launch['date_utc'], 0, 10),
        "orbit" => $orbit,
        "distance_km" => $distanceKm
    ];
}

echo json_encode(array_slice($missions, 0, 30));
