<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAMLP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .header {
            background-color: #000;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .header .navbar-brand img {
            max-height: 50px;
        }
        .header .navbar-nav .nav-link {
            color: #fff;
            font-weight: 500;
            padding: 0.75rem 1rem;
            transition: color 0.3s ease;
        }
        .header .navbar-nav .nav-link:hover {
            color: #b1b1b1;
        }
        .header .btn-outline-dark {
            color: #fff;
            border-color: #fff;
        }
        .header .btn-outline-dark:hover {
            background-color: #fff;
            color: #000;
        }
    
        .hero-section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            background-image: url('img/mapa-20.jpg'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat;  
            color: white;  
            position: relative;
            text-align: center;  
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .hero-section .content {
            position: relative;
            z-index: 2; 
        }

        .hero-section h3 {
            font-size: 4rem;
            font-weight: bold;
        }

        .hero-section p {
            font-size: 1.5rem;
            margin-top: 1rem;
        }
        .services {
            padding: 4rem 0;
            background-color: #f8f9fa;
        }
        .services h2 {
            font-weight: bold;
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: #000;
        }
        .accordion-button {
            background-color: #000;
            color: #fff;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .accordion-button:hover {
            background-color: #333;
        }
        .accordion-button:not(.collapsed) {
            background-color: #f0f0f0;
        }
        .accordion-body {
            background-color: #f0f0f0;
            color: #333;
        }
        .btn-primary-custom {
            background-color: #333;
            border-color: #333;
            color: #fff;
        }
        .btn-primary-custom:hover {
            background-color: #fff;
            color: #333;
            border-color: #333;
        }
        .section {
            padding: 4rem 0;
        }
        #quienes-somos {
            background-color: #e9ecef;
        }
        #quienes-somos h2, #contacto h2 {
            color: #000;
            font-weight: bold;
        }
        #contacto {
            background-color: #f0f0f0;
        }
        footer {
            background-color: #000;
            color: #fff;
            padding: 2rem 0;
            text-align: center;
        }
        .form-title {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            background-color: #ffffff;
        }
        .btn-primary {
            background-color: #4b79a1;
            border-color: #4b79a1;
            border-radius: 10px;
        }
        .btn-primary:hover {
            background-color: #5a8bb5;
        }
        .list-group-item {
            border: none;
            border-bottom: 1px solid #ddd;
        }
        .list-group-item:last-child {
            border-bottom: none;
        }
        .list-group-item:hover {
            background-color: #f1f1f1;
        }
        .btn-info {
            background-color: #283e51;
            border-color: #283e51;
            color: #fff;
            border-radius: 10px;
        }
        .btn-info:hover {
            background-color: #4b79a1;
        }
        .alert {
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="../2/img/logo.png" alt="Logo HAMLP">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#servicios">Servicios</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sobre Nosotros
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#contacto">Contactos</a></li>
                                <li><a class="dropdown-item" href="#quienes-somos">Quiénes Somos</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a class="btn btn-outline-dark ms-auto" href="../2/login.php">Iniciar Sesión</a>
                </div>
            </div>
        </nav>
    </header>