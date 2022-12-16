<?php
function tiendas($id = '', $nombre = 'Nombre',  $descripcion = 'Descripcion', $fecha = 'Fecha')
{
?>
    <div class="card text-center col-5 m-2">
        <div class="card-header" style="background-color: #5800FF;
        color: white;">
            <?php echo $nombre ?>
        </div>
        <div class=" card-body">
            <p class="card-text"><?php echo $descripcion ?></p>
            <div class="d-flex justify-content-center">
                <a href="http://localhost/proyectTW/pruebas/pages/admin-tiendas.php?ver=<?php echo $id ?>" class="btn btn-primary mx-1">Ver</a>
                <a href="http://localhost/proyectTW/pruebas/pages/admin-tiendas.php?modificar=<?php echo $id ?>" class="btn btn-primary  mx-1">Modificar</a>
                <a href="http://localhost/proyectTW/pruebas/pages/admin-tiendas.php?eliminar=<?php echo $id ?>" class="btn btn-primary  mx-1">Eliminar</a>
            </div>
        </div>
        <div class="card-footer text-muted">
            <?php echo $fecha ?>
        </div>
    </div>

<?php }

function verTienda($tienda_id, $nombre = 'Nombre', $encargado = 'Encargado', $descripcion = 'Descripcion', $fecha = 'Fecha')
{
?>
    <div class="card text-center col-5 m-2">
        <div class="card-header" style="background-color: #5800FF; color: white;">
            <?php echo $nombre ?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><span style="color:black">Empledo:</span> <?php echo $encargado ?></h5>
            <p class="card-text"><span style="color:black">Descripcion:</span> <?php echo $descripcion ?></p>
            <div class="d-flex justify-content-center">
                <a href="http://localhost/proyectTW/pruebas/pages/admin-tiendas.php" class="btn btn-primary mx-1">Volver</a>
                <?php if ($encargado == 'Vacio') { ?>
                    <a href="http://localhost/proyectTW/pruebas/pages/admin-tiendas.php?agregarE=<?php echo $tienda_id ?>" class="btn btn-primary mx-1">Agregar empleado</a>
                <?php } ?>
            </div>
        </div>
        <div class="card-footer text-muted">
            <?php echo $fecha ?>
        </div>
    </div>

<?php }
function modificar($id = '', $nombre = '', $descripcion = ' ')
{
?>
    
    <form action="../../pruebas/modelo/modificarTienda.php?tienda_id=<?php echo $id ?>" method="POST" class="row g-3 my-3">
        <div class="col-12 d-flex justify-content-center">
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="" placeholder="<?php echo $nombre ?>" name="nombre">
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="" placeholder="<?php echo $descripcion ?>" name="descripcion">
            </div>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                <label class="form-check-label" for="invalidCheck2">
                    Aceptar terminos
                </label>
            </div>
        </div>
        <div class="col-12">
            <a href="http://localhost/proyectTW/pruebas/pages/admin-tiendas.php" class="btn btn-primary mx-1">Volver</a>
            <button class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>
<?php } ?>