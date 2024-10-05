<?php
// Database connection parameters
$host = 'localhost';
$db = 'bdbriseyda';
$user = 'root';
$pass = '';

// Connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error connecting to the database: " . $e->getMessage());
}

// Query to get the list of people by tax type, pivoting rows into columns
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
    
    // Start HTML structure
    echo "<!DOCTYPE html>";
    echo "<html lang='es'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Lista de Personas por Impuesto</title>";
    echo "<style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            table { width: 100%; border-collapse: collapse; margin-top: 20px; }
            th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
            th { background-color: #f2f2f2; }
            h1 { text-align: center; }
          </style>";
    echo "</head>";
    echo "<body>";

    // Title
    echo "<h1>Lista de Personas por Tipo de Impuesto</h1>";

    // Display results in a table format
    if ($result) {
        echo "<table>";
        echo "<tr>
                <th>CI</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Tipo 1 Impuesto</th>
                <th>Tipo 2 Impuesto</th>
                <th>Tipo 3 Impuesto</th>
              </tr>";

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
        echo "</table>";
    } else {
        echo "<p>No se encontraron datos.</p>";
    }

    // End HTML structure
    echo "</body>";
    echo "</html>";

} catch (PDOException $e) {
    die("Query error: " . $e->getMessage());
}
?>
