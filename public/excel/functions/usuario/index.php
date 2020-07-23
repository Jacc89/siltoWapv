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
           
            <th> identificacion</th>
            <th> nombre</th>
            <th> apellido </th>
            <th> email</th>
            <th> telefono</th>
            <th> whatsapp</th>
            <th> cargo</th>
            <th> estado</th>
            <th> Fecha registro</th>
       
        </tr>
      </thead>
      <tbody>
      <?php 
      $informe = getusuario();
      while($row = $informe->fetch_array(MYSQLI_ASSOC))
      {
        echo '<tr>';
        echo "<td>$row[identificacion]</td>";
        echo "<td>$row[nombre]</td>";
        echo "<td>$row[apellido]</td>";
        echo "<td>$row[email]</td>";
        echo "<td>$row[telefono]</td>";
        echo "<td>$row[whatsapp]</td>";
        echo "<td>$row[cargo]</td>";
        echo "<td>$row[estado]</td>";
        echo "<td>$row[fecha_ingreso]</td>";
        echo '</tr>';
      }
      ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>