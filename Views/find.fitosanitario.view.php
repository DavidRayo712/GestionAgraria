<?php
require_once('Controller/fitosanitario.add.controller.php');
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
      foreach ($gridFitosanitario as $fitosanitario) {
        echo '<tr>';
        echo '<td>' . $fitosanitario['date'] . '</td>';
        echo '<td>' . $fitosanitario['proveedor'] . '</td>';
        echo '<td>' . $fitosanitario['producto'] . '</td>';
        echo '<td>' . $fitosanitario['cantidad'] . ' Kg</td>';
        echo '<td>' . $fitosanitario['precio'] . ' €</td>';
        echo '<td class="functions-admin d-none">';
        echo '<form method="post" action="index.php?action=edit.fitosanitario">';
        echo '<input type="hidden" name="id" value="' . $fitosanitario['id'] . '">';
        echo '<input type="hidden" name="date" value="' . $fitosanitario['date'] . '">';
        echo '<input type="hidden" name="idproveedor" value="' . $fitosanitario['idproveedor'] . '">';
        echo '<input type="hidden" name="producto" value="' . $fitosanitario['producto'] . '">';
        echo '<input type="hidden" name="cantidad" value="' . $fitosanitario['cantidad'] . '">';
        echo '<input type="hidden" name="precio" value="' . $fitosanitario['precio'] . '">';
        echo '<input type="hidden" name="iva" value="' . $fitosanitario['iva'] . '">';
        echo '<button type="submit">Editar</button>';
        echo '</form>';
        echo '</td>';
        echo '<td class="functions-admin d-none">';
        echo '<form method="post" action="index.php?action=delete.fitosanitario">';
        echo '<input type="hidden" name="idfitosanitario" value="' . $fitosanitario['id'] . '">';
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