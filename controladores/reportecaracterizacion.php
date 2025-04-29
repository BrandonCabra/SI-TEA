<?php
// Incluir el archivo de conexión
include '../freddy/conexion.php';

$conexion =Conexion1::conectar();

try {
    // Conexión a la base de datos
    $conexion = Conexion1::conectar();

    echo "<h1>Reporte de total de caracterizaciones</h1>";

    //funcion para generar el reporte de caracterizacion

     function generarReporte($conexion, $CODIGO_CARACTERIZACION, $VALORACION_PEDAGOGICA, $DIAGNOSTICO, $CORRESPONSABILIDAD, $CONTEXTO_ACADEMICO, $RECOMENDACIONES, $CONTEXTO_FAMILIAR, $CONTEXTO_ESCOLAR, $BARRA_DE_APRENDIZAJE) {
        $sql = "SELECT CODIGO_CARACTERIZACION, VALORACION_PEDAGOGICA, DIAGNOSTICO, CORRESPONSABILIDAD, CONTEXTO_ACADEMICO, RECOMENDACIONES, CONTEXTO_FAMILIAR, CONTEXTO_ESCOLAR, BARRA_DE_APRENDIZAJE FROM caracterizacion";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<h2>Caracterizaciones</h2>";
        if (!empty($resultados)) {
            echo "<table border='1' cellpadding='10'>
                    <tr>
                        <th>Codigo Caracterizacion</th>
                        <th>Valoracion Pedagogica</th>
                        <th>DIAGNOSTICO</th>
                        <th>CORRESPONSABILIDAD</th>
                        <th>Contexto Academico</th>
                        <th>RECOMENDACIONES</th>
                        <th>Contexto Familiar</th>
                        <th>Contexto Escolar</th>
                        <th>Barreras Aprendizaje</th>
                    </tr>";
            foreach ($resultados as $fila) {
                echo "<tr>
                        <td>{$fila['CODIGO_CARACTERIZACION']}</td>
                        <td>{$fila['VALORACION_PEDAGOGICA']}</td>
                        <td>{$fila['DIAGNOSTICO']}</td>
                        <td>{$fila['CORRESPONSABILIDAD']}</td>
                        <td>{$fila['CONTEXTO_ACADEMICO']}</td>
                        <td>{$fila['RECOMENDACIONES']}</td>
                        <td>{$fila['CONTEXTO_FAMILIAR']}</td>
                        <td>{$fila['CONTEXTO_ESCOLAR']}</td>
                        <td>{$fila['BARRA_DE_APRENDIZAJE']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No hay datos de caracterizaciones.";
        }
    }
    // Generar el reporte de caracterizaciones
    generarReporte($conexion, "CODIGO_CARACTERIZACION", "VALORACION_PEDAGOGICA", "DIAGNOSTICO", "CORRESPONSABILIDAD", "CONTEXTO_ACADEMICO", "RECOMENDACIONES", "CONTEXTO_FAMILIAR", "CONTEXTO_ESCOLAR", "BARRA_DE_APRENDIZAJE");
} catch (PDOException $e) {
    // Manejo de errores
    echo "Error al generar el reporte: " . $e->getMessage();
}

$sql = "SELECT DIAGNOSTICO, COUNT(*) AS total FROM caracterizacion GROUP BY DIAGNOSTICO";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h3>Reporte de Diagnósticos de Caracterización</h3>";
echo "<table border='1'>";
echo "<tr><th>Diagnóstico</th><th>Total</th></tr>";
foreach ($resultados as $row) {
    echo "<tr>";
    echo "<td>{$row['DIAGNOSTICO']}</td>";
    echo "<td>{$row['total']}</td>";
    echo "</tr>";
}

echo "</table>";

// Generar datos para el gráfico en formato JSON
$data = [];
$data[] = ['DIAGNOSTICO', 'total']; // Encabezados para el gráfico
foreach ($resultados as $row) {
    $data[] = [$row['DIAGNOSTICO'], (int)$row['total']];
}

echo json_encode($data); // Convertir el array PHP a JSON
?>




?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Caracterizaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <!-- Google chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        

        var data = google.visualization.arrayToDataTable([
          ['DIAGNOSTICO', 'total'],
          ['TDAH', 11],
          ['DISCALCULIA', 2],
          ['DISLEXIA',  2],
          ['DISGRAFIA', 2],
          ['otro', 1]
        ]);

        var options = {
          title: 'Diagnosticos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('grafico'));

        chart.draw(data, options);

        document.getElementById('variable').value=chart.getImageURI()

      }
    </script>


</head>
<body>
    <h1>Reporte de Caracterizaciones</h1>
    <p>Este es un reporte de todas las caracterizaciones registradas en la base de datos.</p>
    <table border="1" cellpadding="10">
        <tr>
            <th>Codigo Caracterizacion</th>
            <th>Valoracion Pedagogica</th>
            <th>DIAGNOSTICO</th>
            <th>CORRESPONSABILIDAD</th>
            <th>Contexto Academico</th>
            <th>RECOMENDACIONES</th>
            <th>Contexto Familiar</th>
            <th>Contexto Escolar</th>
            <th>Barreras Aprendizaje</th>
        </tr>
        <?php
        // Aquí se generaría el contenido de la tabla con los datos obtenidos de la base de datos
        ?>
    </table>

    <h1 class="mt-5 text-center border borde">Reportes graficos</h1>
    <div class="container mt-5">
        <input type="hidden" name="variable" id="variable">
        <div id="grafico" style="width: 100%; height: 500px;"></div>

        <input type="submit" value="Generar PDF" class="btn btn-danger mt-5 mr-5 float-right" onclick="generarReporte()"/>
    
</body>

</html>
