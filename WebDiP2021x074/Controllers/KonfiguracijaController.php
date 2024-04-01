<?php
require_once('Controllers/CrudControllerAbstract.php');
require_once('Models/Konfiguracija.php');

class KonfiguracijaController extends CrudControllerAbstract
{
    protected $model = null;

    public function __construct($db) {
        $this->model = new Konfiguracija();
        parent::__construct($db);
    }
}
