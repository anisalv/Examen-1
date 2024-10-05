<?php
include "template/cabeceralog.php";
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codCtastral = $_POST['codCtastral'];
    $direccion = $_POST['direccion'];
    $ci = $_POST['ci'];

    $stmt = $conn->prepare("INSERT INTO propiedad (codCtastral, direccion, ci) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $codCtastral, $direccion, $ci);

    if ($stmt->execute()) {
        $success_message = "Propiedad registrada correctamente.";
    } else {
        $error_message = "Error al registrar la propiedad: " . $conn->error;
    }

    $stmt->close();
}
?>  

<div class="container mt-5">
    <h2 class="text-center mb-4">Registro de Propiedad</h2>

    <!-- Mensaje de éxito -->
    <?php if (isset($success_message)): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $success_message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Mensaje de error -->
    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $error_message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Botón de regreso -->
    <div class="text-start mb-3">
        <a href="propiedades.php" class="btn btn-outline-secondary">Atrás</a>
    </div>

    <!-- Formulario de registro -->
    <form method="POST" action="" class="shadow-lg p-5 rounded" style="background-color: #f8f9fa;">
        <div class="mb-3">
            <label for="codCtastral" class="form-label">Código Catastral</label>
            <input type="number" class="form-control" id="codCtastral" name="codCtastral" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>
        <div class="mb-3">
            <label for="ci" class="form-label">CI del Propietario</label>
            <input type="number" class="form-control" id="ci" name="ci" required>
        </div>
        <button type="submit" class="btn btn-secondary w-100">Registrar Propiedad</button>

    </form>
</div>

<?php include "template/pie.php"; ?>
