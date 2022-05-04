<?php
    require_once('Controller/abono.add.controller.php');
?>
<div class="container text-center">

<table class="table table-striped table-abono">
<thead>
    <tr>
      <th scope="col "><div class="column-abono">Fecha</div></th>
      <th scope="col"><div class="column-abono">Proveedor</div></th>
      <th scope="col"><div class="column-abono">Producto</div></th>
      <th scope="col"><div class="column-abono">Cantidad</div></th>
      <th scope="col"><div class="column-abono">Precio</div></th>
    </tr>
  </thead>
  <tbody>
  <?php
        foreach ($gridAbono as $abono) {
        echo '<tr>';
        echo '<td>'.$abono['date'].'</td>';
        echo '<td>'.$abono['proveedor'].'</td>';
        echo '<td>'.$abono['producto'].'</td>';
        echo '<td>'.$abono['cantidad'].' Kg</td>';
        echo '<td>'.$abono['precio'].' €</td>';
        echo '</tr>';
        }
    ?>
    </tbody>
</table>

</div>
