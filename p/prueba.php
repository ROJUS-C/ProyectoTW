<?php

$fileName = "prueba.txt";
if (file_exists($fileName)) {
    $archivo = fopen($fileName, "a");
    fwrite($archivo, "\nhola Juan");
    /*
    do{
        echo fgets($archivo);
    }while(!feof($archivo));
*/
    fclose($archivo);
}

?>



<?php
if ($tiendas->num_rows == 0) { ?>
    <div class="card-body row">
        <button class="tarjeta">
            <div class="tarjeta__container">
                <div class="tarjeta__icon">
                    <i class="fas fa-2x bi-shop"></i>
                </div>
                <div class="tarjeta__texto">
                    <p class="tarjeta__nombre">Vacio</p>
                </div>
            </div>
        </button>
    </div>
    <?php } else {
    foreach ($tiendas as $key => $value) {
    ?>
        <div class="card-body col-6">
            <button class="tarjeta">
                <div class="tarjeta__container">
                    <div class="tarjeta__icon">
                        <i class="fas fa-2x bi-shop"></i>
                    </div>
                    <div class="tarjeta__texto">
                        <p class="tarjeta__nombre"> <?php $value['nombre'] ?></p>
                    </div>
                </div>
            </button>
        </div>
<?php }
} ?>