<?php
require_once('Controllers/CrudControllerAbstract.php');
require_once('Models/Korisnik.php');

class KorisnikController extends CrudControllerAbstract
{
    protected $model = null;

    public function __construct($db) {
        $this->model = new Korisnik();
        parent::__construct($db);
    }
}
