<?php  

class Narudzba
{
    public $primary_key = 'id';
    public $table_name = 'narudzba';
    public $defaultDisplayField = 'id';
    public $defaultFieldSort = 'id';
    public $defaultFieldDir = 'ASC';

    public $fields = [
        'id' => ['label' => 'Id', 'type' => 'integer', 'length' => 0],
        'datum_vrijeme_isporuke' => ['label' => 'Datum i vrijeme isporuke', 'type' => 'datetime-local', 'length' => 0],
        'kolicina' => ['label' => 'Količina', 'type' => 'integer', 'length' => 1],
        'status' => ['label' => 'Status', 'type' => 'enum', 'length' => 1],
        'datum_kreiranja' => ['label' => 'Datum kreiranja', 'type' => 'datetime-local', 'length' => 0],
        'korisnik_id' => ['label' => 'Korisnik', 'type' => 'select', 'model' => 'Korisnik', 'controller' => 'KorisnikController', 'length' => 1],
    ];

    public $status = [
        "dostava u tijeku" => "Dostava u tijeku",
        "u obradi" =>  "U obradi",
        "narucen" => "Naručen",
        "isporucen" => "Isporučen"
    ];
        
    
}
