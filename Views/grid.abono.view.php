<div class="container text-center">
    <div class="find-form g-3 mt-5">
        <div class="">
            <span class="title-find p-2 text-white rounded">
                Periodo
            </span>
        </div>
        <div class="mt-4 mb-4">
            <span class="label-from-to">
                Desde <span class="subtitle-find font-weight-bold">
                <?php
                    echo  $_POST['from'] ;
                ?>
                </span> hasta <span class="subtitle-find font-weight-bold">
                <?php
                    echo  $_POST['to'] ;
                ?>
                </span>
            </span>
        </div>
    </div>

<table class="table table-striped table-abono">
<thead>
    <tr>
      <th scope="col "><div class="column-abono">Fecha</div></th>
      <th scope="col"><div class="column-abono">Proveedor</div></th>
      <th scope="col"><div class="column-abono">Producto</div></th>
      <th scope="col"><div class="column-abono">Cantidad</div></th>
      <th scope="col"><div class="column-abono">Precio</div></th>
      <th scope="col"><div class="column-abono">Importe</div></th>
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
        echo '<td>'.$abono['precio'].' € / kg</td>';
        echo '<td>'.$abono['importe'].' €</td>';
        echo '</tr>';
        }
    ?>
    </tbody>
</table>

</div>