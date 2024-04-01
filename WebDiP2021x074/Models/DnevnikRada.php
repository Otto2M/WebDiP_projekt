<?php  

class DnevnikRada
{
    public $primary_key = 'id';
    public $table_name = 'dnevnik_rada';
    public $defaultDisplayField = 'radnja';
    public $defaultFieldSort = 'id';
    public $defaultFieldDir = 'DESC';

    public $fields = [
        'id' => ['label' => 'Id', 'type' => 'integer', 'length' => 0],
        'radnja' => ['label' => 'Naziv radnje', 'type' => 'text', 'length' => 100],
        'upit' => ['label' => 'Upit', 'type' => 'text', 'length' => 50],
        'datum_vrijeme' => ['label' => 'Datum i vrijeme promjene', 'type' => 'datetime-local', 'length' => 0],
        'korisnik_id' => ['label' => 'Korisnik', 'type' => 'select', 'model' => 'Korisnik', 'controller' => 'KorisnikController', 'length' => 0],
        'tip_radnje_id'  => ['label' => 'Tip radnje', 'type' => 'select', 'model' => 'TipRadnje', 'controller' => 'TipRadnjeController', 'length' => 0],
    ];

}
