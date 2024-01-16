<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lemon&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>PANTALLAS</title>
    
</head>
<body>

<button id="btnDownload">Descargar PDF</button>


<?php
    //Conexion a base de datos 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "calculo";
    $conn = new mysqli($servername, $username, $password, $dbname);
    //Definicion de variables vacias para poder insertar
    $referenciaSeleccionada = isset($_POST['referencia_seleccionada']) ? $_POST['referencia_seleccionada'] : '';
    $tamanoHorizontal = isset($_POST['tamano_horizontal']) ? $_POST['tamano_horizontal'] : '';
    $tamanoVertical = isset($_POST['tamano_vertical']) ? $_POST['tamano_vertical'] : '';
    $voltajeAcometida = isset($_POST['voltaje_de_acometida']) ? $_POST['voltaje_de_acometida'] : '';
    //
    error_reporting(0);

        $sql = "SELECT DISTINCT marca_referencia FROM plantillas_calculo_pantallas";
        $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<form class='formulario' method='post'><select name='referencia_seleccionada'>";
                while ($row = $result->fetch_assoc()) {
                    $referencia = $row["marca_referencia"];
                    echo "<option value='$referencia'>$referencia</option>";
                }
                echo "</select><br><br><input type='number' name='tamano_horizontal' placeholder='Tamaño horizontal'> <br>";
                echo "<input type='number' name='tamano_vertical' placeholder='Tamaño vertical'> <br>";
                echo "<input type='number' name='voltaje_de_acometida' placeholder='Voltaje de acometida'> <br>";
                echo "<input type='submit' value='Seleccionar'>";
                echo "</form>";
                }else{
                echo "No se encontraron resultados";
            }
      ?>
      <?php

    if(!empty($referenciaSeleccionada) && !empty($tamanoHorizontal) && !empty($tamanoVertical)) {
        $area_total = $tamanoHorizontal * $tamanoVertical;
        $sqlInsert = "INSERT INTO info_pantalla ( tamano_horizontal, tamano_vertical, voltaje_de_acometida, area_total) 
                    VALUES ($tamanoHorizontal, $tamanoVertical, $voltajeAcometida, $area_total)";

        if ($conn->query($sqlInsert) === TRUE) {        
           
        } else {
            echo "Error al guardar datos: " . $conn->error;
        }
    }

    $sqlDimension = "SELECT dimension_horizontal, dimension_vertical FROM plantillas_calculo_pantallas WHERE marca_referencia = '$referenciaSeleccionada'";
    $resultDimension = $conn->query($sqlDimension);

        if ($resultDimension->num_rows > 0) {
            $rowDimension = $resultDimension->fetch_assoc();
            $dimension_horizontal = $rowDimension["dimension_horizontal"];
            $dimension_vertical = $rowDimension["dimension_vertical"];
            $modulo_horizontal = ($tamanoHorizontal * 1000) / $dimension_horizontal;
            $modulo_horizontal = round($modulo_horizontal,0);
            $modulo_vertical = ($tamanoVertical * 1000) / $dimension_vertical;
            $modulo_vertical = round($modulo_vertical,0);
            
         
        } else {
            echo "No se pudo obtener la dimensión horizontal y vertical para el cálculo.";
    }

    $sqlResolucion = "SELECT resolucion_horizontal, resolucion_vertical FROM plantillas_calculo_pantallas WHERE marca_referencia = '$referenciaSeleccionada'";
    $resultResolucion = $conn->query($sqlResolucion);

        if ($resultResolucion->num_rows > 0) {
            $rowResolucion = $resultResolucion->fetch_assoc();
            $resolucion_horizontal = $rowResolucion["resolucion_horizontal"];
            $resolucion_vertical = $rowResolucion["resolucion_vertical"];


            $producto_horizontal = $modulo_horizontal * $resolucion_horizontal;
            $producto_vertical = $modulo_vertical * $resolucion_vertical;

            
    } 

    $sqlConsumo = "SELECT maximo_consumo_m2 FROM plantillas_calculo_pantallas WHERE marca_referencia = '$referenciaSeleccionada'";
    $consumo = $conn->query($sqlConsumo);
        if ($consumo->num_rows > 0) {
            $rowConsumo = $consumo->fetch_assoc();
            $maximo_consumo = $rowConsumo["maximo_consumo_m2"];

            $max_consumo = $maximo_consumo * $area_total;
            
        }
    $corriente = $max_consumo * 1000 / $voltajeAcometida;
   

    $sqlContrifasico = "SELECT consumo_promedio_m2 FROM plantillas_calculo_pantallas WHERE marca_referencia = '$referenciaSeleccionada'";
    $trifasico = $conn->query($sqlContrifasico);

        if ($trifasico->num_rows > 0) {
            $rowtrifasico = $trifasico->fetch_assoc();
            $contrifasico = $rowtrifasico["consumo_promedio_m2"];
            $promedio = $contrifasico * $area_total/1000;
          
        }

    $corrientep = $promedio *1000 / $voltajeAcometida;
   

    $conmaxtrifasico = $area_total * 252 / 1000;
    

    $conmaxfase = $conmaxtrifasico * 1000 / $voltajeAcometida;
    

    $pesoPantalla = "SELECT peso_kg FROM plantillas_calculo_pantallas WHERE marca_referencia = '$referenciaSeleccionada'";
    $peso = $conn->query($pesoPantalla); 

    if ($peso->num_rows > 0) {
        $rowpesoPantalla = $peso->fetch_assoc();
        $pesopan = $rowpesoPantalla["peso_kg"];
        $pesodepantalla = $pesopan * $modulo_horizontal * $modulo_vertical;
        
    }
?>

<div class="container">
<div class="container">
    <div class="tables">
<?php
    $sqlReferencia = "SELECT * FROM plantillas_calculo_pantallas WHERE marca_referencia = '$referenciaSeleccionada'";
    $resultReferencia = $conn->query($sqlReferencia);

    if ($resultReferencia->num_rows > 0) {
        echo "<table class='tabla1' border='2'>";

        while ($row = $resultReferencia->fetch_assoc()) {
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
        }
        echo "</table></div>";

    } else {
        echo "No se encontraron resultados para la referencia seleccionada";
    }
    
  

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
 

    $conn->close();
    
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