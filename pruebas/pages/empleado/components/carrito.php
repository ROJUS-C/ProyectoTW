<?php
function agregarProducto($id = 'Vacio', $nombre = 'Vacio', $cantidad = 'Vacio', $tienda_id)
{
?>
    <form action="http://localhost/proyectTW/pruebas/modelo/agregarCarrito.php?producto_id=<?php echo $id ?>&&tienda_id=<?php echo $tienda_id ?>" method="POST" class="row  mb-3 d-flex justify-content-center align-items-center">
        <div class="col-auto">
            <label for="staticEmail2" class="visually-hidden">Nombre</label>
            <input type="text" readonly class="form-control-plaintext" id="staticText2" value="<?php echo $nombre ?>">
        </div>
        <div class="col-auto">
            <label for="staticEmail2" class="visually-hidden">Cantidad</label>
            <input type="text" readonly class="form-control-plaintext" id="staticText2" value="<?php echo $cantidad ?>">
        </div>
        <div class="col-auto">
            <label for="inputPassword2" class="visually-hidden">Cantidad</label>
            <input value="1" type="number" name="cantidad" class="form-control" id="inputNumber2" placeholder="Cantidad">
        </div>
        <div class="col-12  mt-5 d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-primary mb-3">Agregar</button>
        </div>
    </form>
<?php
}

function mostrarCarrito($array = [])
{
?>
    <div class="card shadow mb-4 col-12 ">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($array == []) { ?>
                            <td>Vacio</td>
                            <td>Vacio</td>
                            <td>Vacio</td>
                            <td>Vacio</td>
                            <td>
                                <button type="button" class="btn" style="background-color: var(--color-blue); color: white;">Editar</button>
                                <button type="button" class="btn" style="background-color: var(--color-main); color: white;">Eliminar</button>
                            </td>
                            <?php } else {
                            foreach ($array as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $value['nombre'] ?></td>
                                    <td><?php echo $value['codigo'] ?></td>
                                    <td><?php echo $value['cantidad'] ?></td>
                                    <td><?php echo $value['precio'] ?></td>
                                    <td>
                                        <a href="http://localhost/proyectTW/pruebas/modelo/eliminarCarrito.php?venta_id=<?php echo $value['venta_id'] ?>&&producto_id=<?php echo $value['producto_id'] ?>&&tienda_id=<?php echo $value['tienda_id'] ?> " class="btn mx-2" style="background-color: var(--color-main); color: white;">Eliminar</a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
} ?>