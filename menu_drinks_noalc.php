<?php

$menu = array(
    'soft' => [
        'title' => 'Softdrinks',
        'items' => [
            [
                'name' => 'Coca Cola',
                'price' => '2,70',
                'size' => '0,2l',
            ],
            [
                'name' => 'Coca Cola',
                'price' => '4,10',
                'size' => '0,4l',
                'discription' => 'Coke, Coke Light, Fanta, Sprite'
            ],
            [
                'name' => 'Christinen Brunnen (medium)',
                'price' => '2,60',
                'size' => '0,2l'
            ],
            [
                'name' => 'Christinen Brunnen (medium)',
                'price' => '5,50',
                'size' => '0,75l'
            ],
            [
                'name' => 'Schweppes',
                'price' => '2,90',
                'size' => '0,2l',
                'discription' => 'Tonic Water, Bitter Lemon'
            ],
        ]
    ],
    'juice' => [
        'title' => 'Säfte & Schorlen',
        'items' => [
            [
                'name' => 'Niehoff Vaihinger Fruchtsaft',
                'price' => '2,90',
                'size' => '0,2l',
            ],
            [
                'name' => 'Niehoff Vaihinger Fruchtsaft',
                'price' => '4,30',
                'size' => '0,4l',
            ],
            [
                'name' => 'Niehoff Vaihinger Schorle',
                'price' => '2,70',
                'size' => '0,2l'
            ],
            [
                'name' => 'Niehoff Vaihinger Schorle',
                'price' => '4,10',
                'size' => '0,4l',
                'discription' => 'Apfel naturtrüb - Orange - Maracuja - Banane - Rhabarber'
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
