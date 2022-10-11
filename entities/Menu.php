<?php

//  Generates a Table and BasicClasses

return [
    [
        'name' => 'name',
        'type' => 'varchar',
        'length' => 255,
        'required' => true
    ],
    [
        'name' => 'price',
        'type' => 'decimal',
        'required' => true,
        'range' => '5,2'
    ],
    [
        'name' => 'description',
        'type' => 'varchar',
        'length' => 255,
        'notnull' => false
    ],
    [
        'name' => 'size',
        'type' => 'varchar',
        'length' => 255,
        'notnull' => false
    ],
    [
        'name' => 'MenuCategoryID',
        'type' => 'int',
        'length' => 11,
        'reference' => 'MenuCategory',
        'ref_column' => 'ID',
        'ref_delete' => 'CASCADE',
        'ref_update' => 'CASCADE',
        'required' => true
    ],
    [
        'name' => 'position',
        'type' => 'int',
        'length' => 10,
        'required' => true
    ],
    [
        'name' => 'hidden',
        'type' => 'bool',
        'default' => false
    ]
];