 <?php
    function empleados($nombre = 'Vacio', $array = [])
    {
    ?>
     <div class="card shadow mb-4 col-12 ">
         <div class="card-header py-3 d-flex align-items-center justify-content-between" style="background-color: var(--color-main);">
             <h6 class="m-0 font-weight-bold text-white d-inline">Empleados de: <?php echo $nombre ?></h6>         </div>
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
                                 <button type="button" class="btn" style="background-color: var(--color-blue); color: white;">Editar</button>
                                 <button type="button" class="btn" style="background-color: var(--color-main); color: white;">Eliminar</button>
                             </td>
                         <?php } else { 
                            foreach ($array as $key => $value) {
                            ?>
                             <tr>
                                 <td><?php echo $value['nombre'].' '.$value['apellido']?></td>
                                 <td><?php echo $value['correo'] ?></td>
                                 <td><?php echo $value['tienda'] ?></td>
                                 <td>
                                     <button type="button" class="btn" style="background-color: var(--color-blue); color: white;">Editar</button>
                                     <button type="button" class="btn" style="background-color: var(--color-main); color: white;">Eliminar</button>
                                 </td>
                             </tr>
                         <?php } 
                        } ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

 <?php } ?>