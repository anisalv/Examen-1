<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $direccion = $_POST['direccion'];
    $distrito = $_POST['distrito'];
    $zona = $_POST['zona'];
    
    if (!empty($nombre) && !empty($paterno) && !empty($materno) && !empty($direccion) && !empty($distrito) && !empty($zona)) {
        
        $sql = "INSERT INTO persona (nombre, paterno, materno, direccion, distrito_id, zona_id) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssii", $nombre, $paterno, $materno, $direccion, $distrito, $zona);
            
            if ($stmt->execute()) {
                echo "<div class='alert alert-success' role='alert' >
                        Persona registrada exitosamente.
                      </div>";
                      header("Location: personas.php");
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                        Error al registrar la persona: " . $stmt->error . "
                      </div>";
            }

            $stmt->close();
        } else {
            echo "<div class='alert alert-danger' role='alert'>
                    Error al preparar la consulta: " . $conn->error . "
                  </div>";
        }
    } else {
        echo "<div class='alert alert-warning' role='alert'>
                Por favor complete todos los campos del formulario.
              </div>";
    }
}

$conn->close();
?>
