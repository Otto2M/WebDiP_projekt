<?php  

class Slike
{
    public $primary_key = 'id';
    public $table_name = 'slike';
    public $defaultDisplayField = 'lokacija';
    public $defaultFieldSort = 'id';
    public $defaultFieldDir = 'ASC';

    public $fields = [
        'id' => ['label' => 'Id', 'type' => 'integer', 'length' => 0],
        'lokacija' => ['label' => 'Lokacija slike', 'type' => 'text', 'length' => 50],
        'opis' => ['label' => 'Opis slike', 'type' => 'text', 'length' => 100],
        'namjestaj_id' => ['label' => 'Namještaj', 'type' => 'select', 'model' => 'Namjestaj', 'controller' => 'NamjestajController', 'length' => 1],
    ];

}
