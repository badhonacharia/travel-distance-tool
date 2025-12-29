<?php
header('Content-Type: application/json');

$from = trim($_GET['from'] ?? '');
$to   = trim($_GET['to'] ?? '');

if (!$from || !$to) {
    echo json_encode(["error" => "Missing city names"]);
    exit;
}

function getCoords($city) {
    $url = "https://nominatim.openstreetmap.org/search?q=" . urlencode($city) . "&format=json&limit=1";
    $opts = [
        "http" => [
            "header" => "User-Agent: TravelDistanceTool/1.0\r\n"
        ]
    ];
    $context = stream_context_create($opts);
    $data = json_decode(file_get_contents($url, false, $context), true);

    if (empty($data)) return null;

    return [
        "lat" => (float)$data[0]['lat'],
        "lon" => (float)$data[0]['lon']
    ];
}

$fromCoords = getCoords($from);
$toCoords   = getCoords($to);

if (!$fromCoords || !$toCoords) {
    echo json_encode(["error" => "City not found"]);
    exit;
}

/* Haversine Formula */
function distanceKm($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371; // km
    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);

    $a = sin($dLat / 2) ** 2 +
         cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
         sin($dLon / 2) ** 2;

    return 2 * $earthRadius * asin(sqrt($a));
}

$distanceKm = distanceKm(
    $fromCoords['lat'],
    $fromCoords['lon'],
    $toCoords['lat'],
    $toCoords['lon']
);

echo json_encode([
    "from" => $from,
    "to" => $to,
    "distance_km" => round($distanceKm, 2),
    "distance_miles" => round($distanceKm * 0.621371, 2)
]);
