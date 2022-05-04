<h2>Agregar Combustible</h2>

<div class="container-add-abono">
    <!-- LOGO DE SECCION -->
    <div>
        <a href="../index.php"><img src="./img/combustible.png" alt="logo"></a>
    </div>

    <!-- FORMULARIO -->
    <div>
        <form id="form-abono" method="post" action="../index.php">

            <!-- FECHA -->
            <div class="text-end">
                <label class="form-label">Fecha</label>
            </div>
            <div class="">
                <input type="date" class="form-control text-end" id="date" name="date" data-date-inline-picker="true">
            </div>
            <div class=""></div>

            <!-- PROVEEDOR -->
            <div class="text-end">
                <label for="Proveedor" class="form-label">Proveedor</label>
            </div>
            <div class="select">
                <select class="form-control text-end" id="Proveedor" name="Proveedor">
                    <option>Seleccione un proveedor</option>
                    <?php
                    foreach ($proveedores as $proveedor) {
                        echo '<option value="' . $proveedor['id'] . '">' . $proveedor['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class=""></div>

            <!-- PRODUCTO -->
            <div class="text-end">
                <label for="producto" class="form-label">Producto</label>
            </div>
            <div class="">
                <input class="form-control text-end" id="producto" name="producto" placeholder="Introduce el producto">
            </div>
            <div class=""></div>

            <!-- CANTIDAD -->
            <div class="text-end">
                <label for="Cantidad" class="form-label">Cantidad</label>
            </div>
            <div class="">
                <input type="number" class="form-control text-end" id="Cantidad" name="Cantidad" placeholder="Introduce la cantidad de producto">
            </div>
            <div class="text-start">litros </div>

            <!-- PRECIO -->
            <div class="text-end">
                <label for="Precio" class="form-label">Precio</label>
            </div>
            <div class="">
                <input type="number" class="form-control text-end" step="0.01" id="Precio" name="Precio" placeholder="Introduce el precio total">
            </div>
            <div class="text-start">€ </div>

            <!-- TIPO IVA -->
            <div class="text-end">
                <label for="IVA" class="form-label">IVA</label>
            </div>
            <div>
                <input type="radio" id="iva2" name="age" value="0.1">
                <label for="age2">10 %</label>
                <input type="radio" id="iva3" name="age" value="0.21" checked>
                <label for="age3">21 %</label>
            </div>
            <div></div>


            <!-- BOTON GRABAR-->
            <div class="">
            </div>
            <div class="grabar">
                <button type="submit">Grabar</button>
            </div>
            <div class=""></div>

        </form>
    </div>
</div>
<?php
echo ("<script>" .
    "window.onload = function(){" .
    "init()" .
    "}" .
    "</script>"
);
?>