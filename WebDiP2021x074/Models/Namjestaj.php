<?php

class Namjestaj 
{
    public $primary_key = 'id';
    public $table_name = 'namjestaj';
    public $defaultDisplayField = 'naziv';
    public $defaultFieldSort = 'id';
    public $defaultFieldDir = 'ASC';

    public $fields = [
        'id' => ['label' => 'Id', 'type' => 'integer', 'length' => 0],
        'kategorija_namjestaja_id' => ['label' => 'Kategorija', 'type' => 'select', 'model' => 'KategorijaNamjestaja', 'controller' => 'KategorijaNamjestajaController', 'length' => 1],
        'naziv' => ['label' => 'Naziv', 'type' => 'text', 'length' => 45],
        'cijena' => ['label' => 'Cijena', 'type' => 'number', 'length' => '', 'prefix' => '', 'postfix' => ' kn'],
        'status_dostupnosti' => ['label' => 'Status namještaja', 'type' => 'enum', 'length' => 20],
        'sirina' => ['label' => 'Širina', 'type' => 'integer', 'length' => 5],
        'duzina' => ['label' => 'Dužina', 'type' => 'integer', 'length' => 5],
        'visina' => ['label' => 'Visina', 'type' => 'integer', 'length' => 5],
        'vrsta_materijala_id' => ['label' => 'Vrsta materijala', 'type' => 'select', 'model' => 'VrstaMaterijala', 'controller' => 'VrstaMaterijalaController', 'length' => 1],
        'boja_id' => ['label' => 'Boja', 'type' => 'select', 'model' => 'Boja', 'controller' => 'BojaController', 'length' => 1],
        'popust_id' => ['label' => 'Popust', 'type' => 'select', 'model' => 'Popusti', 'controller' => 'PopustiController', 'length' => 1],
        'korisnik_id' => ['label' => 'Korisnik', 'type' => 'select', 'model' => 'Korisnik', 'controller' => 'KorisnikController', 'length' => 1],
    ];

    public $gridColumns = [
        'id',
        'naziv',
        'cijena',
        'status_dostupnosti',
    ];

    public $status = [
        "dostupan" => "Dostupan",
        "kupljen" => "Kupljen"
    ];
}
