<?php
require_once('Controller/iva.controller.php');
?>
<h2>Agregar Iva</h2>

<div class="container-add-abono">
    <!-- LOGO DE SECCION -->
    <div>
        <a href="../index.php"><img src="./img/combustible.png" alt="logo"></a>
    </div>

    <!-- FORMULARIO -->
    <div>
        <form id="form-abono" method="post" action="index.php?action=register.iva">

            <!-- VALUE -->
            <div class="text-end">
                <label class="form-label">Valor</label>
            </div>
            <div class="">
                <?php
                echo '<input type="hidden" id="idiva" name="idiva" value="' . $dataForm["id"] . '">';
                echo '<input value="' . $dataForm["value"] . '" type="number" class="form-control text-end" id="value" name="value" placeholder="Introduce el valor">';
                
                ?>
            </div>
            <div class=""></div>

            <!-- NAME -->
            <div class="text-end">
                <label class="form-label">Nombre</label>
            </div>
            <div class="">
                <?php
                echo '<input value="' . $dataForm["name"] . '" type="text" class="form-control text-end" id="name" name="name" placeholder="Introduce el identificador">';
                
                ?>
            </div>
            <div class=""></div>

          

        


            <!-- BOTON GRABAR-->
            <div class="">
            </div>
            <div class="grabar">
                <button type="submit">Guardar</button>
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