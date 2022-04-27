<h2>Fitosanitarios</h2>
<div class="container2">
    <div class="container-agregar">
        <!-- AGREGAR DATOS -->
        <div class="title-action">
            AGREGAR DATOS
        </div>

        <!-- LOGO DE SECCION -->
        <div class="container-card-add">
            <img src="./img/pesticida.png" alt="logo">
        </div>

        <div class="agregar">
            <a href="index.php?action=add.fitosanitario">
                <button type="submit">Agregar</button>
            </a>
        </div>
    </div>

    <div class="find-form">
        <form method="post" action="index.php">
            <div class="title-action">
                BUSCAR
            </div>

            <div class="container-card-find">
                <div class="subtitle-find">
                    Selecciona periodo
                </div>
                <div class="container-producto">
                    <div class="grid-producto">
                        <div class="text-end">
                            <label for="Proveedor" class="form-label">Desde</label>
                        </div>

                        <div>
                            <input type="date" class="form-control" id="from" name="from" data-date-inline-picker="true">
                        </div>

                        <div class="text-end">
                            <label for="Proveedor" class="form-label">Hasta</label>
                        </div>

                        <div>
                            <input type="date" class="form-control" id="to" name="to" data-date-inline-picker="true">
                        </div>
                    </div>
                </div>
            </div>
            <div class="aceptar">
                <button type="submit">Aceptar</button>
            </div>
        </form>

    </div>
</div>