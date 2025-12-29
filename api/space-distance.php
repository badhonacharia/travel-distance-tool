<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('../data/planets.json'), true);

$from = strtolower($_GET['from'] ?? '');
$to   = strtolower($_GET['to'] ?? '');

if (!isset($data[$from]) || !isset($data[$to])) {
    echo json_encode(["error" => "Invalid planet selection"]);
    exit;
}

$AU_IN_KM = 149597870;
$LIGHT_YEAR_KM = 9.461e12;

/* Special case: Earth <-> Moon */
if (
    ($from === "earth" && $to === "moon") ||
    ($from === "moon" && $to === "earth")
) {
    $km = $data['moon']['km_from_earth'];

    echo json_encode([
        "distance_km" => $km,
        "distance_au" => round($km / $AU_IN_KM, 6),
        "light_years" => round($km / $LIGHT_YEAR_KM, 10),
        "note" => "Average Earth–Moon distance"
    ]);
    exit;
}

/* AU-based distance */
$fromAU = $data[$from]['au'];
$toAU   = $data[$to]['au'];

$distanceAU = abs($fromAU - $toAU);
$distanceKM = $distanceAU * $AU_IN_KM;

echo json_encode([
    "distance_km" => round($distanceKM),
    "distance_au" => round($distanceAU, 4),
    "light_years" => round($distanceKM / $LIGHT_YEAR_KM, 10)
]);
