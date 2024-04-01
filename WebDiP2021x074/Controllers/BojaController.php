<?php
require_once('Controllers/CrudControllerAbstract.php');
require_once('Models/Boja.php');

class BojaController extends CrudControllerAbstract
{
    protected $model = null;

    public function __construct($db) {
        $this->model = new Boja();
        parent::__construct($db);
    }
}
