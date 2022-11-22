<?php
require_once __ROOT__.'/MVC/controllers/views.php';
require_once __ROOT__.'/MVC/app/middleware/UseSession.php';
class SessionController extends Views{
    static  $session;
    protected function __construct()
    {
        parent::__construct();
        self::$session=  new UseSession();
        SessionController::existSession();
    }

    protected function existSession(){
        if(!self::existUser()){
            //no existe, redirigir a login
        }
        self::typePage(); //verifica el tipo de acceso a pagina
        
    }

    /*Funcion para verificar si hay sesion*/
    static function existUser(){
        if(!self::$session->getSession()){
            return false;
        }
        return true;
    }   
    /*Funcion para verificar el tipo de pagina*/
    static function typePage(){
        $url = $_GET['url'];
        $string = file_get_contents(__ROOT__ . '/MVC/utilities/pages.json');
        $json = json_decode($string, true);  
        foreach ($json as $key => $value) {
            if($url === $key && $value['type'] === 'private'){
                //redirigir
                self::redirect();
            }
        }
    }

    static function redirect(){
        header('Location: ' . 'http://localhost/proyectTW/MVC/Login');
    }
}
?>