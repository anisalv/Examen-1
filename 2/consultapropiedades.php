<?php
include "conexion.php";
include "template/cabeceralog.php";

$ci = "";
$propiedades = [];
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ci = $_POST['ci'];

    if (!empty($ci)) {
        $sql = "SELECT codCtastral, direccion FROM propiedad WHERE ci = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $ci);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $propiedades[] = $row;
            }
        } else {
            $error_message = "No se encontraron propiedades para el CI ingresado.";
        }

        $stmt->close();
    } else {
        $error_message = "Por favor, ingrese un número de CI válido.";
    }
}
?>


<div class="container">
    <div class="card">
        <h2 class="form-title">Buscar Propiedades por CI</h2>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="ci" class="form-label">Ingrese su CI</label>
                <input type="number" class="form-control" id="ci" name="ci" required placeholder="Ej: 12345678" value="<?php echo htmlspecialchars($ci); ?>">
            </div>
            <button type="submit" class="btn btn-secondary w-100">Buscar Propiedades</button>
        </form>

        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger mt-3"><?php echo $error_message; ?></div>
        <?php endif; ?>
    </div>

    <?php if (!empty($propiedades)): ?>
        <h3 class="mt-5 text-center">Propiedades encontradas:</h3>
        <ul class="list-group mt-4">
            <?php foreach ($propiedades as $propiedad): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Código Catastral:</strong> <?php echo htmlspecialchars($propiedad['codCtastral']); ?><br>
                        <strong>Dirección:</strong> <?php echo htmlspecialchars($propiedad['direccion']); ?>
                    </div>
                    <a href="impuestos.php?codCtastral=<?php echo htmlspecialchars($propiedad['codCtastral']); ?>" class="btn btn-info">
                        Ver Impuestos
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
