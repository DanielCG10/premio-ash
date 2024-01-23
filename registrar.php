<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "documentacion";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['numeroTrabajador'])) {
    $num_trabajador = $_POST['numeroTrabajador'];
    $nombre = $_POST['nombre'];
    $ap_paterno = $_POST['apellidoPaterno'];
    $ap_materno = $_POST['apellidoMaterno'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];




    $sql = "UPDATE datos_trabajador SET
    nombre = '$nombre',
    ap_paterno = '$ap_paterno',
    ap_materno = '$ap_materno',
    edad = '$edad',
    telefono = '$telefono'
    WHERE num_trabajador = '$num_trabajador'";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-info" role="alert">Datos guardados correctamente.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">El número de trabajador ya está ocupado, digita otro.</div>';
    }

    $directorio = "empleados/$num_trabajador";

    if (!file_exists($directorio)) {
        if (mkdir($directorio, 0777, true)) {
            echo '<div class="alert alert-info" role="alert">Carpeta creada correctamente en: C:\xampp\htdocs\trabajadores\empleados\.</div>';
           
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al crear la carpeta..</div>';
            
        }
    } else {
        
       
    }
}
?>