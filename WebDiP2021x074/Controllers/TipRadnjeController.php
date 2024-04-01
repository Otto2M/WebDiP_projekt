<?php
require_once('Controllers/CrudControllerAbstract.php');
require_once('Models/TipRadnje.php');

class TipRadnjeController extends CrudControllerAbstract 
{
    protected $model = null;

    public function __construct($db) {
        $this->model = new TipRadnje();
        parent::__construct($db);
    }
}