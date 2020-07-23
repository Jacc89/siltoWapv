<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'views/head.php'; ?>
</head>
<body>
<?php require 'views/header.php'; ?>

<div class="container text-center"><br><br>
<h1 class="h1">Bienvenido <?php echo $_SESSION['nombre'];?></h1>
<br><br><br><br><br>
<h1 style=" text-transform: uppercase;"><?php echo $_SESSION['cargo'];?></h1>
<p>WAPV trabajando para su servicio.<br></p>
</div>
<br><br><br><br>
<?php require 'views/footer.php'; ?>
</body>
</html>

