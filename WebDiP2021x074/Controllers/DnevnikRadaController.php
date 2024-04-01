<?php
require_once('Controllers/CrudControllerAbstract.php');
require_once('Models/DnevnikRada.php');

class DnevnikRadaController extends CrudControllerAbstract 
{
    protected $model = null;

    public function __construct($db) {
        $this->model = new DnevnikRada();
        parent::__construct($db);
    }
}