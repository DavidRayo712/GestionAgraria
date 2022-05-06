<?php
require_once('Controller/mantenimiento.add.controller.php');
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
          <div class="column-abono">Concepto</div>
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
      foreach ($gridMantenimiento as $mantenimiento) {
        echo '<tr>';
        echo '<td>' . $mantenimiento['date'] . '</td>';
        echo '<td>' . $mantenimiento['proveedor'] . '</td>';
        echo '<td>' . $mantenimiento['concepto'] . '</td>';
        echo '<td>' . $mantenimiento['precio'] . ' €</td>';
        echo '<td class="functions-admin d-none">';
        echo '<form method="post" action="index.php?action=edit.mantenimiento">';
        echo '<input type="hidden" name="id" value="' . $mantenimiento['id'] . '">';
        echo '<input type="hidden" name="date" value="' . $mantenimiento['date'] . '">';
        echo '<input type="hidden" name="idproveedor" value="' . $mantenimiento['idproveedor'] . '">';
        echo '<input type="hidden" name="contador" value="' . $mantenimiento['concepto'] . '">';
        echo '<input type="hidden" name="precio" value="' . $mantenimiento['precio'] . '">';
        echo '<input type="hidden" name="iva" value="' . $mantenimiento['iva'] . '">';
        echo '<button type="submit">Editar</button>';
        echo '</form>';
        echo '</td>';
        echo '<td class="functions-admin d-none">';
        echo '<form method="post" action="index.php?action=delete.mantenimiento">';
        echo '<input type="hidden" name="idmantenimiento" value="' . $mantenimiento['id'] . '">';
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