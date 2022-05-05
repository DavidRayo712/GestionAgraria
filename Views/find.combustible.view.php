<?php
require_once('Controller/combustible.add.controller.php');
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
          <div class="column-abono">Producto</div>
        </th>
        <th scope="col">
          <div class="column-abono">Cantidad</div>
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
      foreach ($gridCombustible as $combustible) {
        echo '<tr>';
        echo '<td>' . $combustible['date'] . '</td>';
        echo '<td>' . $combustible['proveedor'] . '</td>';
        echo '<td>' . $combustible['producto'] . '</td>';
        echo '<td>' . $combustible['cantidad'] . ' Kg</td>';
        echo '<td>' . $combustible['precio'] . ' €</td>';
        echo '<td class="functions-admin d-none">';
        echo '<form method="post" action="index.php?action=edit.combustible">';
        echo '<input type="hidden" name="id" value="' . $combustible['id'] . '">';
        echo '<input type="hidden" name="date" value="' . $combustible['date'] . '">';
        echo '<input type="hidden" name="idproveedor" value="' . $combustible['idproveedor'] . '">';
        echo '<input type="hidden" name="producto" value="' . $combustible['producto'] . '">';
        echo '<input type="hidden" name="cantidad" value="' . $combustible['cantidad'] . '">';
        echo '<input type="hidden" name="precio" value="' . $combustible['precio'] . '">';
        echo '<input type="hidden" name="iva" value="' . $combustible['iva'] . '">';
        echo '<button type="submit">Editar</button>';
        echo '</form>';
        echo '</td>';
        echo '<td class="functions-admin d-none">';
        echo '<form method="post" action="index.php?action=delete.combustible">';
        echo '<input type="hidden" name="idcombustible" value="' . $combustible['id'] . '">';
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