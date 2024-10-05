<?php
include "conexion.php";

$query = "SELECT idDistrito, nombre FROM distrito";
$result = $conn->query($query);

echo '<option value="">Seleccionar Distrito</option>';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['idDistrito'].'">'.$row['nombre'].'</option>';
    }
} else {
    echo '<option value="">No se encontraron distritos</option>';
}

$conn->close();
?>
