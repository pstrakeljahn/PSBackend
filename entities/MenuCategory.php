<?php

//  Generates a Table and BasicClasses

return [
    [
        'name' => 'name',
        'type' => 'varchar',
        'length' => 255,
        'required' => true,
        'unique' => true
    ],
    [
        'name' => 'title',
        'type' => 'varchar',
        'length' => 255,
        'required' => true
    ],
    [
        'name' => 'position',
        'type' => 'int',
        'length' => 10,
        'required' => true
    ]
];