<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'views/head.php'; ?>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
    <br><br><br><br><br><br><br><br><br>

        <h1 class="text-center" style=" text-transform: uppercase;">
        <?php
            echo $this->mensaje;
        ?>
        </h1>
    </div>
    <br><br><br><br><br><br><br><br><br>

    <?php require 'views/footer.php'; ?>
</body>
</html>