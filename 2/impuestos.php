<?php
include "conexion.php";
include "template/cabeceralog.php";

$codCtastral = $_GET['codCtastral'] ?? '';
$impuestos = [];
$error_message = "";

// Verificar si se recibió el código catastral
if (!empty($codCtastral)) {
    // Consulta para obtener los impuestos asociados a la propiedad
    $sql = "SELECT tipo, idImpuesto FROM impuesto WHERE idPropiedad = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $codCtastral);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontraron impuestos
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $impuestos[] = $row;
        }
    } else {
        $error_message = "No se encontraron impuestos asociados a esta propiedad.";
    }

    $stmt->close();
} else {
    $error_message = "Código catastral no proporcionado.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impuestos de la Propiedad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Impuestos de la Propiedad (Código Catastral: <?php echo htmlspecialchars($codCtastral); ?>)</h2>

    <!-- Mensaje de error -->
    <?php if (!empty($error_message)): ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <!-- Listado de impuestos si se encuentran -->
    <?php if (!empty($impuestos)): ?>
        <ul class="list-group">
            <?php foreach ($impuestos as $impuesto): ?>
                <li class="list-group-item">
                    <strong>Tipo de Impuesto:</strong> <?php echo htmlspecialchars($impuesto['tipo']); ?><br>
                    <strong>ID de Impuesto:</strong> <?php echo htmlspecialchars($impuesto['idImpuesto']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <!-- Botón de regreso -->
    <a href="consultapropiedades.php" class="btn btn-secondary mt-3">Regresar</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
