<?php
require_once('Controllers/CrudControllerAbstract.php');
require_once('Models/Uloga.php');

class UlogaController extends CrudControllerAbstract
{
    protected $model = null;

    public function __construct($db) {
        $this->model = new Uloga();
        parent::__construct($db);
    }
}
