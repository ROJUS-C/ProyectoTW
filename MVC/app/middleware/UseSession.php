<?php 
class UseSession {
    const SESSION_STARTED = true;
    const SESSION_NO_STARTED = false;
    /*Incia session*/
    public function __construct()
    {
        session_start();
    }
    /*Agrega un usuario en session*/
    public function setSession($value)
    {
        $_SESSION['USER_INVETARY'] = $value;
    }

    /*Ve el estado  de la session*/
    public function statusSession()
    {
        return session_status();
    }
    /*Retorna session*/
    public function retornar()
    {
        return $_SESSION;
    }

    /*Funcion para verificar si existe session*/
    public function getSession()
    {
        if (empty($_SESSION['USER_INVETARY'])) {
            return false;
        } else {
            return true;
        }
    }

    public function closeSession()
    {
        session_destroy();
        session_unset();
        unset($_SESSION['USER_INVETARY']);
    }
}

?>