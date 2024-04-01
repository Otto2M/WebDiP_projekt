<?php
require_once('Controllers/CrudControllerAbstract.php');
require_once('Models/Narudzba.php');

class NarudzbaController extends CrudControllerAbstract 
{
    protected $model = null;

    public function __construct($db) {
        $this->model = new Narudzba();
        parent::__construct($db);
    }
}