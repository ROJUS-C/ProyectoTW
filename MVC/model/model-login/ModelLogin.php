<?php 
require_once 'db/sql.php';
class ModeloLogin extends MSQL{
    protected function __construct()
    {
        parent::__construct();
    }

    protected function useExistUser($user, $pass)
    {
        $sql = `select * from from usuarios where pass = $pass and correo = $user`;
        try {
            $res = $this->connect->query($sql);   
        } catch (\Throwable $th) {
            return $th;
        }
    }
}

?>