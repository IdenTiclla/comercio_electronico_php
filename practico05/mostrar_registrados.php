<?php
    session_start();
    if (isset($_SESSION['registrados'])) {
        $registrados = $_SESSION['registrados'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php foreach($registrados as $registrado) { ?>
            <li><?= $registrado?></li>
        <?php } ?>
    </ul>
</body>
</html>