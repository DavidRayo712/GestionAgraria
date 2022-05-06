<?php
require_once('Controller/impuestos.controller.php');
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
          <div class="column-abono">Precio</div>
        </th>
        <th scope="col">
          <div class="column-abono">%</div>
        </th>
        <th scope="col">
          <div class="column-abono">IVA</div>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
      $countIvaAll = 0;
      foreach ($gridImpuestos as $impuesto) {
        echo '<tr>';
        echo '<td>' . $impuesto['date'] . '</td>';
        echo '<td>' . $impuesto['proveedor'] . '</td>';
        echo '<td>' . $impuesto['precio'] . '</td>';
        echo '<td>' . $impuesto['percent'] . ' Kg</td>';
        echo '<td>' . $impuesto['iva'] . ' €</td>';
        echo '</tr>';
        $countIvaAll += $impuesto['iva'];
      }
      ?>
    </tbody>
  </table>
  <div>
    <?php
    echo 'Total   ' . $countIvaAll;
    ?>
  </div>
</div>