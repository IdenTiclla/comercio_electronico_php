<?php

echo "<table>
        <tr>
            <th>Multiplicador1</th>
            <th>Multiplicador2</th>
            <th>Resultado</th>
            </tr>";
            $bandera = true;
            for ($j=1; $j <=10 ; $j++) { 
                $resultado = $factor * $j;   
                if ($bandera){
                    echo "<tr class='class1'>
                            <td>$factor</td>
                            <td>$j</td>
                            <td>$resultado</td>
                        </tr>";
                } 
                else{
                    echo "<tr class='class2'>
                        <td>$factor</td>
                        <td>$j</td>
                        <td>$resultado</td>
                    </tr>";
                }
                $bandera = !$bandera;
              
            }

    
echo "</table>";


?>