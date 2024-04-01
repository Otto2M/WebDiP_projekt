<?php

require_once('Controllers/CrudControllerAbstract.php');
require_once('Models/Popusti.php');

class PopustiController extends CrudControllerAbstract 
{
    protected $model = null;

    public function __construct($db) {
        $this->model = new Popusti();
        parent::__construct($db);
    }
}