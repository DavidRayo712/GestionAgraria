<?php
require_once('Controller/iva.controller.php');
?>
<div class="container text-center">

  <table class="table table-striped table-abono">
    <thead>
      <tr>
        <th scope="col ">
          <div class="column-abono">Identificador</div>
        </th>
        <th scope="col">
          <div class="column-abono">Valor</div>
        </th>
        <th scope="col" class="functions-admin">
          <div class="column-abono"></div>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($gridIva as $iva) {
        echo '<tr>';
        echo '<td>' . $iva['name'] . '</td>';
        echo '<td>' . $iva['value'] . '</td>';
        echo '<td class="functions-admin">';
        echo '<form method="post" action="index.php?action=edit.iva">';
        echo '<input type="hidden" name="id" value="' . $iva['id'] . '">';
        echo '<input type="hidden" name="value" value="' . $iva['value'] . '">';
        echo '<input type="hidden" name="name" value="' . $iva['name'] . '">';
        echo '<button type="submit">Editar</button>';
        echo '</form>';
        echo '</td>';

        echo '</tr>';
      }
      ?>
    </tbody>
  </table>
  <div>
    <a href="index.php?action=edit.iva">Agregar nuevo</a>
  </div>
</div>