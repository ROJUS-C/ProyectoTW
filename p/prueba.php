
<?php 

$fileName = "prueba.txt";
if(file_exists($fileName)){
    $archivo = fopen($fileName , "a");
    fwrite($archivo, "\nhola Juan");
/*
    do{
        echo fgets($archivo);
    }while(!feof($archivo));
*/
    fclose($archivo);
}


?>