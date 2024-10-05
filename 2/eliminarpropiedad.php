<?php
include "conexion.php";

if (isset($_GET['id'])) {
    $idPropiedad = $_GET['id'];

    $sql = "DELETE FROM propiedad WHERE idPropiedad = $idPropiedad";
    if ($conn->query($sql) === TRUE) {
        echo "Propiedad eliminada correctamente.";
    } else {
        echo "Error al eliminar la propiedad: " . $conn->error;
    }

    $conn->close();
    
    header("Location: propiedades.php");
    exit();
}
?>
