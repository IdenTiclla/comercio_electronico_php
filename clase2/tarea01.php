<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table, th, td {
        border: 1px solid black;
    }
    .class1{
        background-color:blue;

    }
    .class2{
        background-color:red;
        
    }
</style>
<body>

    

    <?php
        
        function generar_tabla_1_n($n){
            for ($i=1; $i <= $n ; $i++) {
                $factor = $i;
                include "template_tabla.php";
            }
        }
        
        $n = 3;

        generar_tabla_1_n($n);
       
    ?>
    
</body>
</html>