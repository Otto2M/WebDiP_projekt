<?php 

class Popusti 
{
    public $primary_key = 'id';
    public $table_name = 'popusti';
    public $defaultDisplayField = 'naziv';
    public $defaultFieldSort = 'id';
    public $defaultFieldDir = 'ASC';

    public $fields = [
        'id' => ['label' => 'Id', 'type' => 'integer', 'length' => 0],
        'naziv' => ['label' => 'Naziv', 'type' => 'text', 'length' => 45],
        'pocetak' => ['label' => 'Početak popusta', 'type' => 'datetime-local', 'length' => 0],
        'zavrsetak' => ['label' => 'Završetak popusta', 'type' => 'datetime-local', 'length' => 0],
        'postotak_snizenja' => ['label' => 'Postotak sniženja', 'type' => 'range', 'length' => '', 'min' => 0, 'max' => 100],
    ];
}