<?php
require_once('Controllers/CrudControllerAbstract.php');
require_once('Models/Namjestaj.php');

class NamjestajController extends CrudControllerAbstract 
{
    protected $model = null;

    public function __construct($db) {
        $this->model = new Namjestaj();
        parent::__construct($db);
    }
}