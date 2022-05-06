<?php
require_once('Controller/mantenimiento.add.controller.php');
?>
<h2>Agregar Mantenimiento</h2>

<div class="container-add-abono">
    <!-- LOGO DE SECCION -->
    <div>
        <a href="../index.php"><img src="./img/mantenimiento.png" alt="logo"></a>
    </div>

    <!-- FORMULARIO -->
    <div>
        <form id="form-abono" method="post" action="index.php?action=register.mantenimiento">

            <!-- FECHA -->
            <div class="text-end">
                <label class="form-label">Fecha</label>
            </div>
            <div class="">
                <?php
                echo '<input type="hidden" id="idmantenimiento" name="idmantenimiento" value="' . $dataForm["id"] . '">';
                echo '<input type="date" class="form-control text-end" id="date" name="date" data-date-inline-picker="true" value="' . $dataForm["date"] . '">';
                ?>
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
                        if ($dataForm['idproveedor'] && $dataForm['idproveedor'] == $proveedor['id']) {
                            echo '<option selected value="' . $proveedor['id'] . '">' . $proveedor['name'] . '</option>';
                        } else {
                            echo '<option value="' . $proveedor['id'] . '">' . $proveedor['name'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class=""></div>

            <!-- COCEPTO -->
            <div class="text-end">
                <label for="concepto" class="form-label">Concepto</label>
            </div>
            <div class="">
                <?php
                echo '<input value="' . $dataForm["concepto"] . '" type="text" class="form-control text-end" id="concepto" name="concepto" placeholder="Introduce el concepto">';
                ?>
            </div>
            <div class=""></div>

            <!-- PRECIO -->
            <div class="text-end">
                <label for="Precio" class="form-label">Precio</label>
            </div>
            <div class="">
                <?php
                echo '<input value="' . $dataForm["precio"] . '" type="number" class="form-control text-end" step="0.01" id="Precio" name="Precio" placeholder="Introduce el precio total">';
                ?>
            </div>
            <div class="text-start">€/kg - €/litro </div>

            <!-- TIPO IVA -->
            <div class="text-end">
                <label for="IVA" class="form-label">IVA</label>
            </div>
            <div>
                <!-- 
        echo '<input type="hidden" name="iva" value="'.$abono['iva'].'">';  -->
                <?php
                foreach ($ivaTypes as $iva) {
                    if ($dataForm['iva'] && $dataForm['iva'] == $iva['id']) {
                        echo ' <input checked type="radio" id="radioiva' . $iva['id'] . '" name="ivatype" value="' . $iva['id'] . '">';
                    } else {
                        echo ' <input type="radio" id="radioiva' . $iva['id'] . '" name="ivatype" value="' . $iva['id'] . '">';
                    }
                    echo ' <label for="">' . $iva['value'] . ' %</label>';
                }
                ?>
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