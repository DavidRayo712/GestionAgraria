<?php
require_once('Controller/electricidad.add.controller.php');
?>
<div class="container text-center">

  <table class="table table-striped table-abono">
    <thead>
      <tr>
        <th scope="col ">
          <div class="column-abono">Fecha</div>
        </th>
        <th scope="col">
          <div class="column-abono">Proveedor</div>
        </th>
        <th scope="col">
          <div class="column-abono">Contador</div>
        </th>
        <th scope="col">
          <div class="column-abono">Precio</div>
        </th>
        <th scope="col" class="functions-admin d-none">
          <div class="column-abono"></div>
        </th>
        <th scope="col" class="functions-admin d-none">
          <div class="column-abono"></div>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($gridElectricidad as $electricidad) {
        echo '<tr>';
        echo '<td>' . $electricidad['date'] . '</td>';
        echo '<td>' . $electricidad['proveedor'] . '</td>';
        echo '<td>' . $electricidad['contadorname'] . '</td>';
        echo '<td>' . $electricidad['precio'] . ' €</td>';
        echo '<td class="functions-admin d-none">';
        echo '<form method="post" action="index.php?action=edit.electricidad">';
        echo '<input type="hidden" name="id" value="' . $electricidad['id'] . '">';
        echo '<input type="hidden" name="date" value="' . $electricidad['date'] . '">';
        echo '<input type="hidden" name="idproveedor" value="' . $electricidad['idproveedor'] . '">';
        echo '<input type="hidden" name="contador" value="' . $electricidad['contador'] . '">';
        echo '<input type="hidden" name="precio" value="' . $electricidad['precio'] . '">';
        echo '<input type="hidden" name="iva" value="' . $electricidad['iva'] . '">';
        echo '<button type="submit">Editar</button>';
        echo '</form>';
        echo '</td>';
        echo '<td class="functions-admin d-none">';
        echo '<form method="post" action="index.php?action=delete.electricidad">';
        echo '<input type="hidden" name="idelectricidad" value="' . $electricidad['id'] . '">';
        echo '<button type="submit">Borrar</button>';
        echo '</form>';
        echo '</td>';

        echo '</tr>';
      }
      echo ("<script> validTypeUser(); </script>" );
      ?>
    </tbody>
  </table>
</div>