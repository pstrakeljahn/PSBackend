<?php

$menu = array(
    'hot' => [
        'title' => 'Heißgetränke',
        'items' => [
            [
                'name' => 'Pott Kaffee',
                'price' => '2,00',
                'size' => '0,2l',
            ],
            [
                'name' => 'Cappuccino',
                'price' => '2,20',
                'size' => '0,2l',
            ],
            [
                'name' => 'Heiße Schokolade',
                'price' => '2,20',
                'size' => '0,2l'
            ],
            [
                'name' => 'Glas Tee',
                'price' => '2,00',
                'size' => '0,2l',
                'discription' => 'Pfefferminze, Früchte, Darjeeling oder Kamille'
            ],
        ]
    ],
    'wine' => [
        'title' => 'Wein & Prosecco',
        'items' => [
            [
                'name' => 'Grauburgunder (Ellermann-Spiegel, Pfalz)',
                'price' => '4,50',
                'size' => '0,2l',
            ],
            [
                'name' => 'Grauburgunder (Ellermann-Spiegel, Pfalz)',
                'price' => '21,90',
                'size' => '0,7l',
                'discription' => 'mild - weich - mit feinen Birnennoten'
            ],
            [
                'name' => 'Riesling (Weingut Boch, Mosel)',
                'price' => '4,70',
                'size' => '0,2l',
            ],
            [
                'name' => 'Riesling (Weingut Boch, Mosel)',
                'price' => '22,50',
                'size' => '1,0l',
                'discription' => 'frisch - spritzig - zarte Mineralität'
            ],
            [
                'name' => 'Weißweinschorle',
                'price' => '2,20',
                'size' => '0,2l'
            ],
            [
                'name' => 'Rosé (Stefan Breuer, Rheinhessen)',
                'price' => '4,90',
                'size' => '0,2l',
            ],
            [
                'name' => 'Rosé (Stefan Breuer, Rheinhessen)',
                'price' => '23,90',
                'size' => '1,0l',
                'discription' => 'vollmundig - erfrischend - besonders fruchtbetont'
            ],
            [
                'name' => 'Merlot (Vignobles Foncalieu, Frankreich)',
                'price' => '4,90',
                'size' => '0,2l',
            ],
            [
                'name' => 'Merlot (Vignobles Foncalieu, Frankreich)',
                'price' => '19,50',
                'size' => '1,0l',
                'discription' => 'fein - zart - Noten von roten & schwarzen Früchten'
            ],
            [
                'name' => 'Cuvée Simsalabim (Ellermann-Spiegel, Pfalz)',
                'price' => '5,30',
                'size' => '0,2l',
            ],
            [
                'name' => 'Cuvée Simsalabim (Ellermann-Spiegel, Pfalz)',
                'price' => '25,50',
                'size' => '1,0l',
                'discription' => 'rund - vollmundig - Noten von Beeren & Röstaromen'
            ],
            [
                'name' => 'Cuvée 1404 (Casa Defra, Italien)',
                'price' => '6,90',
                'size' => 'Piccolo 0,2l',
                'discription' => 'vollmundig - saftig - feinperlig'
            ],
        ]
    ],


);

// Reorder menu array

// $returnOrder = array('beer', 'sides', 'coffee', 'wine');
// $returnArray = array();

// foreach($returnOrder as $item) {
//     $returnArray[$item] = $menu[$item];
// }

// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
    // you want to allow, and if so:
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        // may also be using PUT, PATCH, HEAD etc
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

header('Content-type: application/json');
echo json_encode($menu, JSON_PRETTY_PRINT);
