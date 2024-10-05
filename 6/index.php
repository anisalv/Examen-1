<?php include "template/cabecera.php"; 

?>

<section class="hero-section">
        <div class="content">
            <h3>HAMLP</h3>
            <p>Sistema de Catastro eficiente y moderno para la gestión de terrenos y propiedades.</p>
        </div>
    </section>

    <section id="servicios" class="services container">
        <h2 class="text-center mb-4">Nuestros Servicios</h2>
        <div class="accordion" id="accordionServices">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Servicio 1: Gestión de Propiedades
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionServices">
                    <div class="accordion-body">
                        Proveemos soluciones eficientes para la gestión de propiedades con nuestro sistema avanzado de catastro.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Servicio 2: Registro de Terrenos
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionServices">
                    <div class="accordion-body">
                        Ayudamos a realizar el registro de terrenos de forma rápida y confiable con nuestro sistema de catastro.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Servicio 3: Mantenimiento de Registros
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionServices">
                    <div class="accordion-body">
                        Ofrecemos servicios de mantenimiento de registros catastrales para que siempre estén actualizados.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="quienes-somos" class="section">
        <div class="container">
            <h2>Quiénes Somos</h2>
            <p>HAMLP es una empresa dedicada a la gestión eficiente de catastro, brindando soluciones tecnológicas para la administración de propiedades y terrenos.</p>
        </div>
    </section>

    <section id="contacto" class="section">
        <div class="container">
            <h2>Contactos</h2>
            <p>Puedes contactarnos en: contacto@hamlp.com</p>
        </div>
    </section>

    <?php include "template/pie.php"; ?>