<?php 
$dato = $_POST['buscar'];
if(!empty($dato)){
    header("Location: http://localhost/proyectTW/pruebas/pages/empleado/empleado-inicio.php?id=" . $dato);

}else{
header("Location: http://localhost/proyectTW/pruebas/pages/empleado/empleado-inicio.php");
}
?>