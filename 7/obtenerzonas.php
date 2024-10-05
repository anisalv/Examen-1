<?php
include "conexion.php";  

$idDistrito = isset($_GET['idDistrito']) ? $_GET['idDistrito'] : '';

if (!empty($idDistrito)) {
    $query = "SELECT idZona, nombre FROM zona WHERE idDistrito = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idDistrito);  
    $stmt->execute();
    $result = $stmt->get_result();

    echo '<option value="">Seleccionar Zona</option>';
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="'.$row['idZona'].'">'.$row['nombre'].'</option>';
        }
    } else {
        echo '<option value="">No se encontraron zonas</option>';
    }

    $stmt->close();
} else {
    echo '<option value="">Seleccionar Zona</option>';
}

$conn->close();
?>
