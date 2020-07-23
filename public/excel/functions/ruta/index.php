<?php 
require '../conexion.php';
require '../modulos.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Exportar informe Excel</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <div class="page-header text-left">
    <img src="../../../img/SILTO.png" alt="logo">
  </div>
  <a href="createExcel.php" target="_blank">Descargar informe en excel</a>
  <div class="row">
    <table class="table table-bordered">
      <thead>
      <tr>
           
            <th> id_ruta</th>
            <th> fecha_ruta</th>
            <th> hora_salida </th>
            <th> hora_llegada </th>
            <th> tipo_ruta </th>
            <th> precinto </th>
            <th> identificacion </th>
            <th> placa </th>
            <th> id_centro </th>
            <th> variedad_productos </th>
            <th> id_solicitud </th>
            <th> observaciones </th>

       
        </tr>
      </thead>
      <tbody>
      <?php 
      $informe = getruta();
      while($row = $informe->fetch_array(MYSQLI_ASSOC))
      {
        echo '<tr>';
        echo "<td>$row[id_ruta]</td>";
        echo "<td>$row[fecha_ruta]</td>";
        echo "<td>$row[hora_salida]</td>";
        echo "<td>$row[hora_llegada]</td>";
        echo "<td>$row[tipo_ruta]</td>";
        echo "<td>$row[precinto]</td>";
        echo "<td>$row[nombreConductor]</td>";
        echo "<td>$row[placa]</td>";
        echo "<td>$row[nombreCentro]</td>";
        echo "<td>$row[variedad_productos]</td>";
        echo "<td>$row[id_solicitud]</td>";
        echo "<td>$row[observaciones]</td>";
        echo '</tr>';
      }
      ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>