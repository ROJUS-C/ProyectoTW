<form class="row g-3 my-3">
    <div class="col-md-4">
        <label for="validationDefault01" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="validationDefault01" placeholder="Ingrese el nombre" required>
    </div>
    <div class="col-md-4">
        <label for="validationDefault02" class="form-label">Ubicacion</label>
        <input type="text" class="form-control" id="validationDefault02" placeholder="Ubicacion" required>
    </div>
    <div class="col-md-4">
        <label for="validationDefaultUsername" class="form-label">Correo</label>
        <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend2">@</span>
            <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
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
        <button class="btn btn-primary" >Crear tienda</button>
    </div>
</form>