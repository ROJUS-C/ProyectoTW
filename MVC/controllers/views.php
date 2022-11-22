<?php
class Views{
    private $array;
    public function __construct()
    {
    }

    protected function Views($url, $array = []){
        Views::setArray($array); 
        require (__ROOT__.$url);
    }

    protected function setArray($array){
        $this->array = $array;
    }
}

?>