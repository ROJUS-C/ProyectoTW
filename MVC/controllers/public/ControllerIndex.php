<?php
require_once __ROOT__.'/MVC/controllers/controller/SessionController.php';
class ControllerIndex extends SessionController{
    private $dates;
    public function __construct()
    {
        parent::__construct();
    }

    public function render(){
        
        $this->Views('/MVC/views/index.php', ["value"=>"hola"]);
    }
}
