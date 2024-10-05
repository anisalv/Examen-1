<?php
include ("../2/template/cabeceralog.php");

$host = 'localhost';
$db = 'bdbriseyda';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error :c" . $e->getMessage());
}

$query = "
    SELECT 
        p.ci, 
        p.nombre, 
        p.paterno, 
        p.materno,
        MAX(CASE WHEN i.tipo = 1 THEN i.valor ELSE NULL END) AS 'Tipo_1_Impuesto',
        MAX(CASE WHEN i.tipo = 2 THEN i.valor ELSE NULL END) AS 'Tipo_2_Impuesto',
        MAX(CASE WHEN i.tipo = 3 THEN i.valor ELSE NULL END) AS 'Tipo_3_Impuesto'
    FROM persona p
    LEFT JOIN propiedad pr ON p.ci = pr.ci
    LEFT JOIN impuesto i ON pr.idPropiedad = i.idPropiedad
    GROUP BY p.ci, p.nombre, p.paterno, p.materno
";

try {
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<div class='container mt-5'>";
    echo "<h1 class='text-center mb-4'>Lista de Personas por Tipo de Impuesto</h1>";

    if ($result) {
        echo "<table class='table table-bordered table-hover table-striped'>";
        echo "<thead class='table-dark'>
                <tr>
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Tipo 1 Impuesto</th>
                    <th>Tipo 2 Impuesto</th>
                    <th>Tipo 3 Impuesto</th>
                </tr>
              </thead>";
        echo "<tbody>";

        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>{$row['ci']}</td>";
            echo "<td>{$row['nombre']}</td>";
            echo "<td>{$row['paterno']}</td>";
            echo "<td>{$row['materno']}</td>";
            echo "<td>" . ($row['Tipo_1_Impuesto'] ?? 'N/A') . "</td>";
            echo "<td>" . ($row['Tipo_2_Impuesto'] ?? 'N/A') . "</td>";
            echo "<td>" . ($row['Tipo_3_Impuesto'] ?? 'N/A') . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No se encontraron datos.</p>";
    }

    echo "</div>";

} catch (PDOException $e) {
    die("Query error: " . $e->getMessage());
}
?>
