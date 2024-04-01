<?php

class KategorijaNamjestaja
{
    public $primary_key = 'id';
    public $table_name = 'kategorija_namjestaja';
    public $defaultDisplayField = 'naziv';
    public $defaultFieldSort = 'id';
    public $defaultFieldDir = 'ASC';

    public $fields = [
        'id' => ['label' => 'Id', 'type' => 'integer', 'length' => 0],
        'naziv' => ['label' => 'Naziv', 'type' => 'text', 'length' => 75],
        'moderatori' => ['label' => 'Moderator', 'type' => 'multiselect', 'model' => 'Uloga', 'controller' => 'UlogaController', 
        'relation' => 'korisnik_kategorijaNamjestaja', 'where' => 'kategorijaNamjestaja_id'],
    ];
}

