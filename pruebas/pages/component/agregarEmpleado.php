<?php
function agregarEmpleado($tienda_id)
{
?>
    <form class="mx-1 mt-4" action="../../pruebas/modelo/agregarEmpleado.php?tienda_id=<?php echo $tienda_id?>" method="POST">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" placeholder="Nombre" name="nombre">
        </div>
        <div class="form-group">
            <label>Apellido</label>
            <input type="text" class="form-control" placeholder="Apellido" name="apellido">
        </div>
        <div class="form-group">
            <label>Correo</label>
            <input type="email" class="form-control" placeholder="Correo" name="correo">
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" class="form-control" placeholder="Contraseña" name="pass">
        </div>
        <div class="d-flex justify-content-center justify-content-sm-start" id="action">
            <button type="submit" name="" class="btn mr-1 my-3" style="background-color: var(--color-main); color: white;">Agregar</button>
            <a class="btn my-3" style="background-color: var(--color-blue); color: white;" href="http://localhost/proyectTW/pruebas/pages/admin-tiendas.php">Volver</a>
        </div>
    </form>
<?php
}
?>