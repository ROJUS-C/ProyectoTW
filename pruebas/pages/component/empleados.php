 <?php
    function empleados($nombre = 'Vacio', $array = [])
    {
    ?>
     <div class="card shadow mb-4 col-12 p-0">
         <div class="card-header py-3 d-flex align-items-center justify-content-between" style="background-color: var(--color-main);">
             <h6 class="m-0 font-weight-bold text-white d-inline">Empleados de: <?php echo $nombre ?></h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>Nombre completo</th>
                             <th>Correo</th>
                             <th>Tienda</th>
                             <th>Opciones</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php if ($array == []) { ?>
                             <td>Vacio</td>
                             <td>Vacio</td>
                             <td>Vacio</td>
                             <td>
                                 <button type="button" class="btn mx-1 my-1" style="background-color: var(--color-blue); color: white;">Editar</button>
                                 <button type="button" class="btn mx-1 my-1" style="background-color: var(--color-main); color: white;">Eliminar</button>
                             </td>
                             <?php } else {
                                foreach ($array as $key => $value) {
                                ?>
                                 <tr>
                                     <td><?php echo $value['nombre'] . ' ' . $value['apellido'] ?></td>
                                     <td><?php echo $value['correo'] ?></td>
                                     <td><?php echo $value['tienda'] ?></td>
                                     <td>
                                        <a href="http://localhost/proyectTW/pruebas/pages/admin-empleados.php?editar=<?php echo $value['usuario_id'] ?> " class="btn" style="background-color: var(--color-blue); color: white;">Editar</button>
                                        <a href="http://localhost/proyectTW/pruebas/modelo/eliminarEmpleado.php?eliminar=<?php echo $value['usuario_id'] ?>" class="btn" style="background-color: var(--color-main); color: white;">Eliminar</button>
                                     </td>
                                 </tr>
                         <?php }
                            } ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

 <?php }
    function modificarEmpleado($id, $nombre, $apellido, $correo)
    {
    ?>
     <form action="../../pruebas/modelo/modificarEmpleado.php?usuario_id=<?php echo $id ?>" method="POST" class="row g-3 my-3">
         <div class="col-12 d-flex flex-wrap justify-content-center">
             <div class="col-md-4 col-12">
                 <label for="validationDefault01" class="form-label">Nombre</label>
                 <input type="text" class="form-control" id="" placeholder="<?php echo $nombre ?>" name="nombre">
             </div>
             <div class="col-md-4 col-12 mt-4 mt-md-0">
                 <label for="validationDefault01" class="form-label">Apellido</label>
                 <input type="text" class="form-control" id="" placeholder="<?php echo $apellido ?>" name="apellido">
             </div>
             <div class="col-md-4 col-12 mt-4 mt-md-0">
                 <label for="validationDefault02" class="form-label">Correo</label>
                 <input type="text" class="form-control" id="" placeholder="<?php echo $correo ?>" name="correo">
             </div>
         </div>
         <div class="col-12 mt-1">
             <div class="form-check">
                 <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                 <label class="form-check-label" for="invalidCheck2">
                     Aceptar terminos
                 </label>
             </div>
         </div>
         <div class="col-12">
             <a href="http://localhost/proyectTW/pruebas/pages/admin-empleados.php" class="btn btn-primary mx-1">Volver</a>
             <button type="submit" class="btn btn-primary">Guardar Cambios</button>
         </div>
     </form>
 <?php } ?>