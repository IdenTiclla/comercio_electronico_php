<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="static/js/main.js"></script>
    
</head>
<body>
    

    <?php
        include("formulario.php");

    
        function entre18y40($edad){
            return $edad >= 18 && $edad <=40;
        }

        function menor18($edad){
            return $edad < 18;
        }

        function mayor_40($edad){
            return $edad > 40;
        }
        if (isset($_POST['nombre']) && isset($_POST['edad']) && isset($_POST['genero'])) {
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $genero = $_POST['genero'];
            
            if ($genero == "femenino") {
                if (entre18y40($edad)) {
                    echo "Buen dia seniorita $nombre";
                }
                elseif (menor18($edad)){
                    echo "Buen dia ninia $nombre";
                }
                elseif (mayor_40($edad)){
                    echo "Buen dia Seniora $nombre";
                }
            }
            elseif ($genero == "masculino"){
                if (entre18y40($edad)) {
                    echo "Buen dia joven $nombre";
                }
                elseif (menor18($edad)){
                    echo "Buen dia ninio $edad";
                }
                elseif (mayor_40($edad)){
                    echo "Buen dia Senior $edad";
                }
            }
        }
        
    ?>
    
</body>
</html>