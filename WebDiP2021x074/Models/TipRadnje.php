<?php 

class TipRadnje 
{
    public $primary_key = 'id';
    public $table_name = 'tip_radnje';
    public $defaultDisplayField = 'naziv';
    public $defaultFieldSort = 'id';
    public $defaultFieldDir = 'ASC';

    public $fields = [
        'id' => ['label' => 'Id', 'type' => 'integer', 'length' => 0],
        'naziv' => ['label' => 'Naziv', 'type' => 'text', 'length' => 20],
    ];
}