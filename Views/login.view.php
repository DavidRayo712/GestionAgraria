<h2>Iniciar Sesion</h2>

<div class="container-add-abono">
    <!-- LOGO DE SECCION -->
    <div>
        <a href="../index.php"><img src="./img/abono.png" alt="logo"></a>
    </div>

    <!-- FORMULARIO -->
    <div>
        <form id="form-abono" method="post" action="Controller/session.controller.php?action=login">

            <!-- Email -->
            <div class="text-end">
                <label class="form-label">Email</label>
            </div>
            <div class="">
                <input type="text" class="form-control text-end" id="email" name="email">
            </div>
            <div class=""></div>

            <!-- Clave -->
            <div class="text-end">
                <label for="Proveedor" class="form-label">Clave</label>
            </div>
            <div class="">
                <input type="password" class="form-control text-end" id="password" name="password">
            </div>

            <!-- BOTON GRABAR-->
            <div class="">
            </div>
            <div class="grabar">
                <button type="submit">Iniciar sesion</button>
            </div>
            <div class=""></div>

        </form>
    </div>
</div>