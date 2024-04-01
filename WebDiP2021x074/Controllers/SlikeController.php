<?php
require_once('Controllers/CrudControllerAbstract.php');
require_once('Models/Slike.php');

class SlikeController extends CrudControllerAbstract 
{
    protected $model = null;

    public function __construct($db) {
        $this->model = new Slike();
        parent::__construct($db);
    }
}