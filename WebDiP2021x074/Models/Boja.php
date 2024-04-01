<?php

class Boja
{
    public $primary_key = 'id';
    public $table_name = 'boja';
    public $defaultDisplayField = 'naziv';
    public $defaultFieldSort = 'id';
    public $defaultFieldDir = 'ASC';

    public $fields = [
        'id' => ['label' => 'Id', 'type' => 'integer', 'length' => 0],
        'naziv' => ['label' => 'Naziv', 'type' => 'text', 'length' => 45],
    ];
}
