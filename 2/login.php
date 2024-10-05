<?php
session_start();
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ci = $_POST['ci'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT id, ci, contrasena, rol
            FROM usuario
            WHERE ci = '$ci'";

    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        if ($contrasena === $usuario['contrasena']) {
            $_SESSION['ci'] = $usuario['ci'];
            $_SESSION['id'] = $usuario['id'];
            
            if ($contrasena === $usuario['contrasena']) {
                $_SESSION['ci'] = $usuario['ci'];
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['rol'] = $usuario['rol'];  // Asignamos el rol a la sesión
                
                // Redirigir según el rol
                switch ($_SESSION['rol']) {
                    case 1:
                        header('Location: inicio.php');
                        exit();
                    case 2:
                        header('Location: propiedadesUsuario.php');
                        exit();
                    default:
                        header('Location: login.php');
                        exit();
                }
            }
            

            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #333 0%, #777 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            border-radius: 12px;
            background-color: #f5f5f5;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .login-title {
            margin-bottom: 1.5rem;
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            color: #333;
        }
        .form-label {
            font-weight: bold;
            color: #333;
        }
        .form-control {
            border-radius: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            color: #333;
        }
        .form-control:focus {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            border-color: #999;
        }
        .btn-primary {
            background-color: #333;
            border-color: #333;
            border-radius: 10px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            color: #fff;
        }
        .btn-primary:hover {
            background-color: #555;
            border-color: #555;
        }
        .alert {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h3 class="login-title">Iniciar Sesión</h3>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="ci" class="form-label">CI</label>
                <input type="text" class="form-control" id="ci" name="ci" required placeholder="Ingrese su CI">
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required placeholder="Ingrese su contraseña">
            </div>
            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
