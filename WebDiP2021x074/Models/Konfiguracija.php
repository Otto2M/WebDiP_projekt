<?php

class Konfiguracija
{
    public $primary_key = 'id';
    public $table_name = 'konfiguracija';
    public $defaultDisplayField = 'id';
    public $defaultFieldSort = 'id';
    public $defaultFieldDir = 'ASC';

    public $fields = [
        'id' => ['label' => 'Id', 'type' => 'integer', 'length' => 0],
        'odrzavanje' => ['label' => 'Mod održavanja', 'type' => 'checkbox', 'length' => 0, 'default' => 0],
        'trajanje_kolacica' => ['label' => 'Trajanje kolačića', 'type' => 'integer', 'length' => 11],
        'broj_redaka_po_stranici' => ['label' => 'Broj redaka po stranici', 'type' => 'integer', 'length' => 3],
        'trajanje_sesije' => ['label' => 'Trajanje sesije', 'type' => 'integer', 'length' => 11],
        'broj_neuspjesnih_prijava' => ['label' => 'Broj neuspješnih prijava', 'type' => 'integer', 'length' => 11],
    ];
}
