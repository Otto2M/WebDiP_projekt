<?php 

require_once('Controllers/CrudControllerAbstract.php');
require_once('Models/VrstaMaterijala.php');

class VrstaMaterijalaController extends CrudControllerAbstract 
{
    protected $model = null;

    public function __construct($db) {
        $this->model = new VrstaMaterijala();
        parent::__construct($db);
    }
}