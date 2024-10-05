<?php
ob_start();
include "conexion.php";
include "template/cabeceralog.php";

if (isset($_POST['submit'])) {
    $idPropiedad = $_POST['idPropiedad'];
    $codCtastral = $_POST['codCtastral'];
    $direccion = $_POST['direccion'];
    $ci = $_POST['ci'];

    $sql = "UPDATE propiedad SET codCtastral = '$codCtastral', direccion = '$direccion', ci = '$ci' WHERE idPropiedad = $idPropiedad";
    if ($conn->query($sql) === TRUE) {
        echo "Propiedad actualizada correctamente.";
    } else {
        echo "Error al actualizar la propiedad: " . $conn->error;
    }

    $conn->close();
    
    header("Location: propiedades.php");
    ob_end_flush();
    exit();
} else {
    if (isset($_GET['id'])) {
        $idPropiedad = $_GET['id'];
        $sql = "SELECT * FROM propiedad WHERE idPropiedad = $idPropiedad";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
}

?>

<body>
<div class="container">
    <h2 class="mt-5">Editar Propiedad</h2>
    <form method="POST" action="editarpropiedad.php">
        <input type="hidden" name="idPropiedad" value="<?php echo $row['idPropiedad']; ?>">
        <div class="mb-3">
            <label for="codCtastral" class="form-label">Código Catastral</label>
            <input type="text" class="form-control" id="codCtastral" name="codCtastral" value="<?php echo $row['codCtastral']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $row['direccion']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="ci" class="form-label">CI del Propietario</label>
            <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $row['ci']; ?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
