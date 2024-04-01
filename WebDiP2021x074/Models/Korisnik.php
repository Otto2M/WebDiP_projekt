<?php

class Korisnik
{
    public $primary_key = 'id';
    public $table_name = 'korisnik';
    public $defaultDisplayField = 'ime_prezime';
    public $defaultFieldSort = 'id';
    public $defaultFieldDir = 'ASC';

    public $fields = [
        'id' => ['label' => 'Id', 'type' => 'integer', 'length' => 0],
        'ime_prezime' => ['label' => 'Ime Prezime', 'type' => 'text', 'length' => 45],
        'korisnicko_ime' => ['label' => 'Korisničko ime', 'type' => 'text', 'length' => 30],
        'lozinka' => ['label' => 'Lozinka', 'type' => 'text', 'length' => 45],
        'lozinka_256' => ['label' => 'Lozinka 256', 'type' => 'text', 'hidden' => true, 'length' => 64],
        'datum_rodenja' => ['label' => 'Datum Rodenja', 'type' => 'date', 'length' => 0],
        'email_adresa' => ['label' => 'Email Adresa', 'type' => 'text', 'length' => 45],
        'broj_neispravnih_prijava' => ['label' => 'Broj neispravnih prijava', 'type' => 'number', 'length' => ''],
        'datum_registracije' => ['label' => 'Datum registracije', 'type' => 'datetime-local', 'length' => 0],
        'blokiran' => ['label' => 'Blokiran', 'type' => 'checkbox', 'length' => '0', 'default' => 0],
        'aktivacijski_kod' => ['label' => 'Aktivacijski kod', 'type' => 'text', 'hidden' => true, 'length' => 20],
        'uloga_id' => ['label' => 'Uloga', 'type' => 'select', 'model' => 'Uloga', 'controller' => 'UlogaController', 'length' => 1],
        'uvjeti_koristenja' => ['label' => 'Uvjeti korištenja', 'type' => 'checkbox', 'length' => 1, 'default' => 0],
    ];
#not use yet
    public $datetimefields = [
        'datum_registracije'
    ];

    public $gridColumns = [
        'id',
        'korisnicko_ime',
        'ime_prezime',
        'email_adresa',
        'blokiran',
    ];
}
