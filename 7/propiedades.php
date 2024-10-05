<?php
include "template/cabeceralog.php";
include "conexion.php";

$sql = "SELECT idPropiedad, codCtastral, direccion, ci FROM propiedad";
$result = $conn->query($sql);
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Listado de Propiedades</h2>

    <div class="text-end mb-3">
        <a href="registropropiedad.php" class="btn btn-success">Registrar Propiedad</a>
    </div>

    <div class="table-responsive shadow p-3 mb-5 bg-body rounded">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Código Catastral</th>
                    <th>Dirección</th>
                    <th>CI del Propietario</th>
                    <th>Acciones</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["codCtastral"] . "</td>";
                        echo "<td>" . $row["direccion"] . "</td>";
                        echo "<td>" . $row["ci"] . "</td>";
                        echo "<td>";
                        echo "<a href='editarpropiedad.php?id=" . $row["idPropiedad"] . "' class='btn btn-primary btn-sm me-2'>Editar</a>";
                        echo "<a href='eliminarpropiedad.php?id=" . $row["idPropiedad"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de que deseas eliminar esta propiedad?\")'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No hay propiedades registradas.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$conn->close();
include "template/pie.php";
?>
