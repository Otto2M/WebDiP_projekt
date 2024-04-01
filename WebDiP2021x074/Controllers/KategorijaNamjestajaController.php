<?php

require_once('Controllers/CrudControllerAbstract.php');
require_once('Models/KategorijaNamjestaja.php');

class KategorijaNamjestajaController extends CrudControllerAbstract
{
    protected $model = null;

    public function __construct ($db)
    {
        $this->model = new KategorijaNamjestaja();
        parent::__construct($db);
    }
}
