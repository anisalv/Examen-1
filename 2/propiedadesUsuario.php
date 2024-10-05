<?php
session_start();
include('conexion.php');
include('template/cabeceraU.php');

if (!isset($_SESSION['ci'])) {
    header('Location: login.php');
    exit();
}

$ci = $_SESSION['ci'];

$sql = "SELECT idPropiedad, codCtastral, direccion, latitud, longitud
        FROM propiedad
        WHERE ci = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $ci);
$stmt->execute();
$resultado = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propiedades del Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Propiedades de <?php echo $_SESSION['ci']; ?></h2>
        <?php if ($resultado->num_rows > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Propiedad</th>
                        <th>Código Catastral</th>
                        <th>Dirección</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($propiedad = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $propiedad['idPropiedad']; ?></td>
                            <td><?php echo $propiedad['codCtastral']; ?></td>
                            <td><?php echo $propiedad['direccion']; ?></td>
                            <td><?php echo $propiedad['latitud']; ?></td>
                            <td><?php echo $propiedad['longitud']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No se encontraron propiedades para este usuario.</p>
        <?php endif; ?>
        <a href="inicioUsuario.php" class="btn btn-secondary">Volver al Inicio</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
