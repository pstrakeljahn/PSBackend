<?php

//  Generates a Table and BasicClasses

return [
    [
        'name' => 'name',
        'type' => 'varchar',
        'length' => 255,
        'required' => true,
    ],
    [
        'name' => 'mail',
        'type' => 'varchar',
        'length' => 255,
        'required' => true
    ],
    [
        'name' => 'datetime',
        'type' => 'datetime',
        'length' => 255,
        'required' => true
    ],
    [
        'name' => 'phone',
        'type' => 'varchar',
        'length' => 255
    ],
    [
        'name' => 'personCount',
        'type' => 'int',
        'length' => 11
    ],
    [
        'name' => 'status',
        'type' => 'enum',
        'values' => ['new', 'accepted', 'declined'],
        'required' => true
    ]
];
