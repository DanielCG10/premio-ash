<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "documentacion";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    if (isset($_GET['u'])) {
        $numeroTrabajador = $_GET['u'];

        $sql = "SELECT num_trabajador, nombre, ap_paterno, ap_materno, ine, curp, constancia_fiscal, nss, acta_nacimiento, comprobante_domicilio,
     certificado_medico, solicitud_empleo, certificado, carta_no_penales, carta_recomendacion, reconocimiento, curso FROM datos_trabajador WHERE num_trabajador = '$numeroTrabajador'"; // Reemplaza "tabla_datos" con el nombre de tu tabla

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $numeroTrabajador = $row["num_trabajador"];
                $nombre = $row["nombre"];
                $ap_paterno = $row["ap_paterno"];
                $ap_materno = $row["ap_materno"];
                $ine = $row["ine"];
                $curp = $row["curp"];
                $fiscal = $row["constancia_fiscal"];
                $nss = $row["nss"];
                $acta = $row["acta_nacimiento"];
                $domicilio = $row["comprobante_domicilio"];
                $medico = $row["certificado_medico"];
                $empleo = $row["solicitud_empleo"];
                $certificado = $row["certificado"];
                $no_penales = $row["carta_no_penales"];
                $recomendacion = $row["carta_recomendacion"];
                $reconocimiento = $row["reconocimiento"];
                $curso = $row["curso"];



            }
        } else {
            echo "Error en la consulta: " . $conn->error;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $documento = $_POST['tipoDocumento'];
        $archivo = $_FILES['archivo']['name'];

        $extension = pathinfo($archivo, PATHINFO_EXTENSION);

        $nombreArchivo = $documento . "." . $extension;

        $directorio = "empleados/$numeroTrabajador/";

        if (!is_dir($directorio)) {
            mkdir($directorio, 0777, true);
        }
        $ruta = $directorio . $nombreArchivo;

        if (file_exists($ruta)) {
            unlink($ruta);
        }

        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta)) {
            $sql = "UPDATE datos_trabajador SET `$documento` = '$ruta' WHERE num_trabajador = '$numeroTrabajador'";

            if ($conn->query($sql) === true) {
                echo '<div class="alert alert-info" role="alert">Documento guardado correctamente.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al actualizar el documento.</div>';
    
            }
        } else {
            echo "Error al subir el archivo";
        }
    }

    $rutaine = "empleados/$numeroTrabajador/ine.pdf";
    $rutacurp = "empleados/$numeroTrabajador/curp.pdf";
    $rutafiscal = "empleados/$numeroTrabajador/constancia_fiscal.pdf";
    $rutanss = "empleados/$numeroTrabajador/nss.pdf";
    $rutaacta = "empleados/$numeroTrabajador/acta_nacimiento.pdf";
    $rutadomicilio = "empleados/$numeroTrabajador/comprobante_domicilio.pdf";
    $rutamedico = "empleados/$numeroTrabajador/certificado_medico.pdf";
    $rutaempleo = "empleados/$numeroTrabajador/solicitud_empleo.pdf";
    $rutacert = "empleados/$numeroTrabajador/certificado.pdf";
    $rutanop = "empleados/$numeroTrabajador/carta_no_penales.pdf";
    $rutareco = "empleados/$numeroTrabajador/carta_recomendacion.pdf";
    $rutareconocimiento = "empleados/$numeroTrabajador/reconocimiento.pdf";
    $rutacurso = "empleados/$numeroTrabajador/curso.pdf";


    $conn->close();
    ?>