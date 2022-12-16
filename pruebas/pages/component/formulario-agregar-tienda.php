<form action="../../pruebas/modelo/agregarTienda.php" method="POST"  class="row g-3 my-3">
    <div class="col-md-4">
        <label for="validationDefault01" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="validationDefault01" placeholder="Nombre" name="nombre" required>
    </div>
    <div class="col-md-4">
        <label for="validationDefault02" class="form-label">Descripcion</label>
        <input type="text" class="form-control" id="validationDefault02" placeholder="Descripcion" name="descripcion" required>
    </div>
    <div class="col-md-4">
        <label for="validationDefaultUsername" class="form-label">Fecha</label>
        <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend2">D</span>
            <input type="date" class="form-control" id="validationDefault02" name="fecha" required>
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
        <button class="btn btn-primary">Crear tienda</button>
    </div>
</form>