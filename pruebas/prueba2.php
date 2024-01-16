<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Document</title>
</head>
<body>
    

<?php
include("prueba.php");

   

   
        echo "<table class='tabla1' border='2'>";

       
            echo "<tr><td>Marca Referencia</td><td>" . $row["marca_referencia"] . "</td></tr>".
                "<tr><td>Dimension Horizontal</td><td>" . $row["dimension_horizontal"] . "</td></tr>".
                "<tr><td>Dimension Vertical</td><td>" . $row["dimension_vertical"]  . "</td></tr>".
                "<tr><td>Resolucion Horizontal</td><td>" . $row["resolucion_horizontal"] . "</td></tr>".
                "<tr><td>Resolucion Vertical</td><td>" . $row["resolucion_vertical"] . "</td></tr>".
                "<tr><td>Peso</td><td>" . $row["peso_kg"] . "</td></tr>".
                "<tr><td>MTO</td><td>" . $row["mto"] . "</td></tr>".
                "<tr><td>Consumo Promedio</td><td>" . $row["consumo_promedio_m2"] . "</td></tr>".
                "<tr><td>Maximo Consumo</td><td>" . $row["maximo_consumo_m2"] . "</td></tr>".
                "<tr><td>Brillo en Nits</td><td>" . $row["brillo_nits"] . "</td></tr>".
                "<tr><td>Contraste</td><td>" . $row["contraste"] . "</td></tr>".
                "<tr><td>Tasa Refresco</td><td>" . $row["tasa_refesh"] . "</td></tr>".
                "<tr><td>Voltaje</td><td>" . $row["voltaje"] . "</td></tr>".
                "<tr><td>Durabilidad</td><td>" . $row["durabilidad"] . "</td></tr>".
                "<tr><td>Pitch</td><td>" . $row["pitch_mm"] . "</td></tr>";
        
        echo "</table></div>";

   
        echo "No se encontraron resultados para la referencia seleccionada";
    
    
  

    echo"<div class='tables'><table class='tabla2' border='2'>";
    
    echo "<tr><td>Area total</td><td>".$area_total."</td></tr><br>",
    "<tr><td>Modulo Horizontal</td><td>".$modulo_horizontal."</td></tr>",
    "<tr><td>Modulo Horizontal</td><td>".$modulo_vertical."</td></tr>",
    "<tr><td>Producto Horizontal</td><td>".$producto_horizontal."</td></tr>",
    "<tr><td>Producto Vertical</td><td>".$producto_vertical."</td></tr>",
    "<tr><td>Consumo Maximo Teorico Trifasico</td><td>".$max_consumo."</td></tr>",
    "<tr><td>Corriente maxima por fase</td><td>".$corriente."</td></tr>",
    "<tr><td>Consumo Promedio Trifasico</td><td>".$promedio."</td></tr>",
    "<tr><td>Corriente Promedio</td><td>".$corrientep."</td></tr>",
    "<tr><td>Consumo Maximo Estimado Trifasico</td><td>".$conmaxtrifasico."</td></tr>",
    "<tr><td>Corriente Maxima por fase</td><td>".$conmaxfase."</td></tr>",
    "<tr><td>Peso Pantalla</td><td>".$pesodepantalla."</td></tr>";
echo "</table></div>";
 


    
?>

</div>
<script>
    document.getElementById('btnDownload').addEventListener('click', function () {
        var element = document.querySelector('.container');

 
        
        html2pdf(element);
    

    });
</script>

</body>

</html>