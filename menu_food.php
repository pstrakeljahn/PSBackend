<?php

$menu = array(
    'food' => [
        'title' => 'Pfeffersteaks vom Lavagrill',
        'items' => [
            [
                'name' => 'Grüne Gans (Das Original!)',
                'price' => '4,90',
                'discription' => 'mit eingelegten Tomatenpaprikastreifen',
            ],
            [
                'name' => 'Athen',
                'price' => '5,10',
                'discription' => 'mit Krautsalat und hausgemachtem Tzatziki',
            ],
            [
                'name' => 'Texas 🌶️',
                'price' => '5,30',
                'discription' => 'mit Pflücksalat, eingelegter Tomatenpaprika, Cheddar-Käse & BBQ-Sauce',
            ],
            [
                'name' => 'Mexiko',
                'price' => '5,30',
                'discription' => 'mit Pflücksalat, Cheddar-Käse & Jalapeños',
            ]
        ]
    ],
    'food2' => [
        'title' => 'Auch Gans lecker!',
        'items' => [
            [
                'name' => 'Schmetterlingssteak',
                'price' => '6,90',
                'discription' => 'mit Pflücksalat & hausgemachten Tzatziki im Fladenbrot',
            ],
            [
                'name' => 'Chicken Wings 🌶️',
                'price' => '7,20',
                'discription' => 'fünf Wings vom Grill in leicht feuriger Marinade. Dazu Kartoffel-Chips & Sweet-Chili-Dip',
            ],
            [
                'name' => 'Fette Henne',
                'price' => '7,90',
                'discription' => 'gegrillte Hähnchenbrust mit Beilagensalat & warmem Fladenbrot',
            ],
            [
                'name' => 'Steak-Teller',
                'price' => '9,50',
                'discription' => 'zwei Pfeffersteaks vom Grill mit Salatbeilage & warmem Fladenbrot',
            ]
        ]
    ],
    'food3' => [
        'title' => 'Salate',
        'items' => [
            [
                'name' => 'Kleiner',
                'price' => '4,20',
                'discription' => 'kleiner gemischter Salat mit Tomaten, Gurken, roten Zwiebeln & Mais',
            ],
            [
                'name' => 'Gänsehirte',
                'price' => '6,70',
                'discription' => 'großer gemischter Salat mit Tomaten, Gurken, roten Zwiebeln, Mais & Hirtenkäse. Dazu frisches Fladenbrot',
            ],
            [
                'name' => 'Gans Hünter',
                'price' => '7,50',
                'discription' => 'großer gemischter Salat mit Streifen vom gegrillten Schweinerücken. Dazu frisches Fladenbrot',
            ]
        ]
    ]


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
