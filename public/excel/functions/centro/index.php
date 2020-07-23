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
           
            <th> id_centro</th>
            <th> nombrecentro</th>
            <th> email </th>
            <th> telefono </th>
            <th> whatsapp </th>
            <th> departamento </th>
            <th> ciudad </th>
            <th> nombreusuario </th>
            <th> lugar </th>

       
        </tr>
      </thead>
      <tbody>
      <?php 
      $informe = getproducto();
      while($row = $informe->fetch_array(MYSQLI_ASSOC))
      {
        echo '<tr>';
        echo "<td>$row[id_centro]</td>";
        echo "<td>$row[nombrecentro]</td>";
        echo "<td>$row[email]</td>";
        echo "<td>$row[telefono]</td>";
        echo "<td>$row[whatsapp]</td>";
        echo "<td>$row[departamento]</td>";
        echo "<td>$row[ciudad]</td>";
        echo "<td>$row[nombreusuario]</td>";
        echo "<td>$row[lugar]</td>";
        echo '</tr>';
      }
      ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>