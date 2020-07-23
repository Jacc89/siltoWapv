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
    <img src="../../img/SILTO.png" alt="logo">
  </div>
  <a href="createExcel.php" target="_blank">Descargar informe en excel</a>
  <div class="row">
    <table class="table table-bordered">
      <thead>
      <tr>
           
            <th> Placa vehículo</th>
            <th> Capacidad</th>
            <th> Seguro </th>
            <th> Tecnomecánica</th>
            <th> Tipo vehiculo</th>
            <th> GPS</th>
            <th> Estado</th>
            <th> Conductor</th>
            <th> Fecha registro</th>
       
        </tr>
      </thead>
      <tbody>
      <?php 
      $informe = getvehiculos();
      while($row = $informe->fetch_array(MYSQLI_ASSOC))
      {
        echo '<tr>';
        echo "<td>$row[placa]</td>";
        echo "<td>$row[capacidad]</td>";
        echo "<td>$row[seguro]</td>";
        echo "<td>$row[tecnomecanica]</td>";
        echo "<td>$row[tipo_vehiculo]</td>";
        echo "<td>$row[gps]</td>";
        echo "<td>$row[estado]</td>";
        echo "<td>$row[nombreconductor]</td>";
        echo "<td>$row[fecha_registro]</td>";
        echo '</tr>';
      }
      ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>