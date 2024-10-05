<?php include "../2/template/cabeceralog.php"; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
</head>
<body>
    <div class="container" style="width:50%;">
        <h2 class="form-title">Registro de Persona</h2>
        <div class="text-end mb-3">
        <a href="personas.php" class="btn btn-success">atras</a>
    </div>
        <form action="procesarregistro.php" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="paterno" class="form-label">Apellido Paterno:</label>
                <input type="text" class="form-control" id="paterno" name="paterno" required>
            </div>

            <div class="mb-3">
                <label for="materno" class="form-label">Apellido Materno:</label>
                <input type="text" class="form-control" id="materno" name="materno" required>
            </div>

            <div class="mb-3">
                <label for="distrito" class="form-label">Distrito:</label>
                <select id="distrito" name="distrito" class="form-control" required>
                    <option value="">Seleccionar Distrito</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="zona" class="form-label">Zona:</label>
                <select id="zona" name="zona" class="form-control" required>
                    <option value="">Seleccionar Zona</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Registrar</button>
            
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $.ajax({
                url: 'obtenerdistrito.php',
                method: 'GET',
                success: function(data) {
                    $('#distrito').html(data);  
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("Error al cargar los distritos:", textStatus, errorThrown);
                }
            });

            $('#distrito').change(function(){
                var idDistrito = $(this).val();
                $.ajax({
                    url: 'obtenerzonas.php',
                    method: 'GET',
                    data: { idDistrito: idDistrito },
                    success: function(data) {
                        $('#zona').html(data);  
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Error al cargar las zonas:", textStatus, errorThrown);
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php include "../2/template/pie.php"; ?>
