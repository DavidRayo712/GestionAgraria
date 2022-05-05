<?php
require_once('Controller/abono.add.controller.php');
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
        <th scope="col" class="functions-admin">
          <div class="column-abono"></div>
        </th>
        <th scope="col" class="functions-admin">
          <div class="column-abono"></div>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($gridAbono as $abono) {
        echo '<tr>';
        echo '<td>' . $abono['date'] . '</td>';
        echo '<td>' . $abono['proveedor'] . '</td>';
        echo '<td>' . $abono['producto'] . '</td>';
        echo '<td>' . $abono['cantidad'] . ' Kg</td>';
        echo '<td>' . $abono['precio'] . ' €</td>';
        echo '<td class="functions-admin">';
        echo '<form method="post" action="index.php?action=edit.abono">';
        echo '<input type="hidden" name="id" value="' . $abono['id'] . '">';
        echo '<input type="hidden" name="date" value="' . $abono['date'] . '">';
        echo '<input type="hidden" name="idproveedor" value="' . $abono['idproveedor'] . '">';
        echo '<input type="hidden" name="producto" value="' . $abono['producto'] . '">';
        echo '<input type="hidden" name="cantidad" value="' . $abono['cantidad'] . '">';
        echo '<input type="hidden" name="precio" value="' . $abono['precio'] . '">';
        echo '<input type="hidden" name="iva" value="' . $abono['iva'] . '">';
        echo '<button type="submit">Editar</button>';
        echo '</form>';
        echo '</td>';
        echo '<td class="functions-admin">';
        echo '<form method="post" action="index.php?action=delete.abono">';
        echo '<input type="hidden" name="idabono" value="' . $abono['id'] . '">';
        echo '<button type="submit">Borrar</button>';
        echo '</form>';
        echo '</td>';

        echo '</tr>';
      }
      ?>
    </tbody>
  </table>
</div>