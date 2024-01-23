<?php
session_start();

if (isset($_SESSION['user'])) {
    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8" />
        <title>Documentación del empleado</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <meta name="keywords" content="Noticias" />
        <meta name="author" content="Daniel Cardoza" />
    </head>
    <?php
    include 'admin_docsSrc.php';
    ?>

    <body style="background-color: #CCCCCC;">
        <div class="container-fluid pt-4 text-center bg-primary">
            <div class="row">
                <div class="col">
                    <h2 class="text-white">Documentación del postulado</h2>
                    <br>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <br>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h4 class="font-weight-bold text-center">Datos del postulado</h4>
                        </div>
                        <div class="card-body">

                            <form method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="numeroTrabajador" class="form-label">Número de control</label>
                                        <input type="text" class="form-control" id="numeroTrabajador"
                                            name="numeroTrabajador" value="<?php echo $numeroTrabajador; ?>" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            value="<?php echo $nombre, " ", $ap_paterno, " ", $ap_materno; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
                                        <select class="form-select" id="tipoDocumento" name="tipoDocumento">
                                            <option value="ine">Carta de propuesta</option>
                                            <option value="curp">Semblanza personal del candidato o candidata</option>
                                            <option value="constancia_fiscal">Datos de contacto tanto de la persona postulada como del postulante</option>
                                            <option value="nss">Primer testimonio de personas beneficiadas por su labor</option>
                                            <option value="acta_nacimiento">Segundo testimonio de personas beneficiadas por su labor</option>
                                            <option value="comprobante_domicilio">Tercer testimonio de personas beneficiadas por su labor</option>
                                            <option value="certificado_medico">Primera carta de recomendación </option>
                                            <option value="solicitud_empleo">Segunda carta de recomendación</option>
                                            <option value="certificado">Tercera carta de recomendación</option>
                                            <option value="carta_no_penales">Imagen 1 </option>
                                            <option value="carta_recomendacion">Imagen 2
                                            </option>
                                            <option value="reconocimiento">Imagen 3</option>
                                            <option value="curso">Video, favor de proporcionar el link del video</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="archivo" class="form-label">Archivo</label>
                                        <input type="file" accept=".pdf" class="form-control" id="archivo" name="archivo"
                                            required>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Guardar documento</button>
                                        <a href="index.html" class="btn btn-secondary" style="float: right;">Regresar</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4 class="font-weight-bold text-center">Contenido multimedia</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">Imagen 1</div>
                                        <div class="card-body">
                                            <?php
                                            if (file_exists($rutanop)) {
                                                echo '<embed src="' . $rutanop . '" type="application/pdf" width="100%" height="300px">';
                                            } else {

                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">Imagen 2</div>
                                        <div class="card-body">
                                            <?php
                                            if (file_exists($rutareco)) {
                                                echo '<embed src="' . $rutareco . '" type="application/pdf" width="100%" height="300px">';
                                            } else {

                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">Imagen 3</div>
                                        <div class="card-body">
                                            <?php
                                            if (file_exists($rutareconocimiento)) {
                                                echo '<embed src="' . $rutareconocimiento . '" type="application/pdf" width="100%" height="300px">';
                                            } else {

                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">Video</div>
                                        <div class="card-body">
                                            <?php
                                            if (file_exists($rutacurso)) {
                                                echo '<embed src="' . $rutacurso . '" type="application/pdf" width="100%" height="300px">';
                                            } else {

                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            <h4 class="font-weight-bold text-center">Documentación (Cada uno de los documentos es totalmente obligatorio)</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="card">
                                    <div class="card-header"><strong>Carta de propuesta</strong></div>
                                        <div class="card-body">
                                            <?php
                                            if (file_exists($rutaine)) {
                                                echo '<embed src="' . $rutaine . '?v=' . time() . '" type="application/pdf" width="100%" height="300px">';

                                            } else {
                                                echo '<div class="alert alert-warning" role="alert">Favor de subir el documento.</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header"><strong>Semblanza personal del candidato o candidata</strong></div>
                                        <div class="card-body">
                                            <?php
                                            if (file_exists($rutacurp)) {
                                                echo '<embed src="' . $rutacurp . '" type="application/pdf" width="100%" height="300px">';
                                            } else {
                                                echo '<div class="alert alert-warning" role="alert">Favor de subir el documento.</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header"><strong>Datos de contacto tanto de la persona postulada como del postulante</strong></div>
                                        <div class="card-body">
                                            <?php
                                            if (file_exists($rutafiscal)) {
                                                echo '<embed src="' . $rutafiscal . '" type="application/pdf" width="100%" height="300px">';
                                            } else {
                                                echo '<div class="alert alert-warning" role="alert">Favor de subir el documento.</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header"><strong>Primer testimonio de personas beneficiadas por su labor</strong></div>
                                        <div class="card-body">
                                            <?php
                                            if (file_exists($rutanss)) {
                                                echo '<embed src="' . $rutanss . '" type="application/pdf" width="100%" height="300px">';
                                            } else {
                                                echo '<div class="alert alert-warning" role="alert">Favor de subir el documento.</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header"><strong>Segundo testimonio de personas beneficiadas por su labor</strong></div>
                                        <div class="card-body">
                                            <?php
                                            if (file_exists($rutaacta)) {
                                                echo '<embed src="' . $rutaacta . '" type="application/pdf" width="100%" height="300px">';
                                            } else {
                                                echo '<div class="alert alert-warning" role="alert">Favor de subir el documento.</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header"><strong>Tercer testimonio de personas beneficiadas por su labor</strong></div>
                                        <div class="card-body">
                                            <?php
                                            if (file_exists($rutadomicilio)) {
                                                echo '<embed src="' . $rutadomicilio . '" type="application/pdf" width="100%" height="300px">';
                                            } else {
                                                echo '<div class="alert alert-warning" role="alert">Favor de subir el documento.</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header"><strong>Primera carta de recomendación</strong></div>
                                        <div class="card-body">
                                            <?php
                                            if (file_exists($rutamedico)) {
                                                echo '<embed src="' . $rutamedico . '" type="application/pdf" width="100%" height="300px">';
                                            } else {
                                                echo '<div class="alert alert-warning" role="alert">Favor de subir el documento.</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header"><strong>Segunda carta de recomendación</strong></div>
                                        <div class="card-body">
                                            <?php
                                            if (file_exists($rutaempleo)) {
                                                echo '<embed src="' . $rutaempleo . '" type="application/pdf" width="100%" height="300px">';
                                            } else {
                                                echo '<div class="alert alert-warning" role="alert">Favor de subir el documento.</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header"><strong>Tercera carta de recomendación</strong></div>
                                        <div class="card-body">
                                            <?php
                                            if (file_exists($rutacert)) {
                                                echo '<embed src="' . $rutacert . '" type="application/pdf" width="100%" height="300px">';
                                            } else {
                                                echo '<div class="alert alert-warning" role="alert">Favor de subir el documento.</div>';

                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                </div>

            </div>
        </div>


    </body>

    </html>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <?php
} else {
    header("location:login.php");
}
?>